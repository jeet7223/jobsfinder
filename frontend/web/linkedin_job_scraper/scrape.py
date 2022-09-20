#!/usr/bin/env python3

import pickle

import sys
import time

from selenium import webdriver
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.support import expected_conditions
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.common.by import By
from selenium.webdriver.common.action_chains import ActionChains
import warnings
import mysql.connector
import configuration

warnings.filterwarnings("ignore")
headless_mode = True
job_url_set = []


# TO customize Browser Capablities The bellow codes "options"
options = webdriver.ChromeOptions()
options.add_argument("start-maximized")
options.add_argument("window-size=1920,1080")
options.add_argument("disable-infobars")
options.add_argument("--disable-extensions")
options.add_argument("--disable-blink-features=AutomationControlled")
options.add_argument('ignore-certificate-errors')
if headless_mode:
    options.add_argument('--headless')

options.add_argument('--no-sandbox')
options.add_argument('--disable-dev-shm-usage')
options.add_experimental_option("useAutomationExtension", False)
options.add_experimental_option("excludeSwitches", ["enable-automation"])
options.add_experimental_option("excludeSwitches", ["enable-logging"])

mydb = mysql.connector.connect(
    host=configuration.host,
    user=configuration.user,
    password=configuration.password,
    database=configuration.database,
    charset=configuration.charset,
    auth_plugin=configuration.auth_plugin
)
cursor = mydb.cursor()

id = int(sys.argv[1])
jobs_array = []
sql_all_jobs_query = "select * from jobs_data"
cursor.execute(sql_all_jobs_query)
all_scraped_jobs = cursor.fetchall()
for _jobs in all_scraped_jobs:
    linkedin_job_url = _jobs[10]
    jobs_array.append(linkedin_job_url)

sql_select_query = "select * from scrape_jobs where id= {}".format(id)
cursor.execute(sql_select_query)

records = cursor.fetchone()

get_location = records[2]
scrape_keyword = records[1]
scrape_limit = records[6]
mycursor = mydb.cursor()


def setRequestStatus(request_status, request_id):
    req_sql = "UPDATE scrape_jobs SET status = %s WHERE id = %s"
    req_val = (request_status, request_id)
    mycursor.execute(req_sql, req_val)
    mydb.commit()


def saveJobs(mydb, job_url, job_title, person_name, company_name, job_location, job_details, about_the_company, apply_link, status, category, source):
    mycursor = mydb.cursor()
    sql = "INSERT INTO jobs_data(job_title,job_description,job_location,company_name,person_name,category,apply_link,about_the_company,job_url,status,source) VALUES (%s, %s, %s, %s, %s, %s,%s, %s, %s, %s, %s)"
    val = (job_title, job_details, job_location, company_name, person_name, category, apply_link, about_the_company, job_url, status, source)
    mycursor.execute(sql, val)
    mydb.commit()


driver = webdriver.Chrome(executable_path=configuration.root_path+"chromedriver", options=options)
setRequestStatus(1, id)
driver.get("https://www.linkedin.com/login")
time.sleep(2)
cookies = pickle.load(open(configuration.root_path+"cookie.pkl", "rb"))
for cookie in cookies:
    driver.add_cookie(cookie)
counter = 0
start_page = 0
p_counter = 1

for i in range(0, 5000):
    key_url = "https://www.linkedin.com/jobs/search/?refresh=true&start={}".format(start_page)
    driver.get(key_url)
    time.sleep(1)

    try:
        p = WebDriverWait(driver, 20).until(
            expected_conditions.presence_of_element_located((By.CLASS_NAME, "scaffold-layout__list-container")))
    except TimeoutException:
        setRequestStatus(4, id)
    time.sleep(5)

    try:
        driver.find_element(By.CLASS_NAME, 'jobs-search-box__keyboard-text-input').send_keys(scrape_keyword)
    except:
        pass
    time.sleep(3)

    try:
        driver.find_element(By.ID, 'jobs-search-box-location-id-ember26').clear()
        driver.find_element(By.ID, 'jobs-search-box-location-id-ember26').send_keys(get_location)
    except:
        pass
    time.sleep(3)
    try:
        driver.find_element(By.CLASS_NAME, 'jobs-search-box__submit-button').click()
    except:
        pass
    try:
        p = WebDriverWait(driver, 20).until(
            expected_conditions.presence_of_element_located((By.CLASS_NAME, "scaffold-layout__list-container")))
    except TimeoutException:
        pass
    time.sleep(3)

    try:
        jobs = driver.find_element(By.CLASS_NAME, 'scaffold-layout__list-container').find_elements(By.CLASS_NAME, 'jobs-search-results__list-item')
    except:
        setRequestStatus(4, id)
        break
    job_urls_array = []

    for job in jobs:
        try:
            actions = ActionChains(driver)
            actions.move_to_element(job).perform()
            time.sleep(1)
            job_url = job.find_element(By.CLASS_NAME, 'job-card-list__title').get_attribute('href')
            if job_url in jobs_array:
                print("Already Exist !!")
            else:
                job_urls_array.append(job_url)
                jobs_array.append(job_url)
        except:
            pass
    print("Total Product Found  in Page {} -: {}".format(start_page, len(job_urls_array)))
    for job_link in job_urls_array:
        try:
            driver.get(job_link)
        except:
            continue
        time.sleep(2)
        try:
            p = WebDriverWait(driver, 20).until(
                expected_conditions.presence_of_element_located((By.CLASS_NAME, "jobs-details")))
        except TimeoutException:
            continue
        time.sleep(1)
        try:
            job_title = driver.find_element(By.CLASS_NAME, 'jobs-unified-top-card__job-title').text
        except:
            job_title = None

        try:
            person_name = driver.find_element(By.CLASS_NAME, 'jobs-poster__name').text
        except:
            person_name = None

        try:
            company_name = driver.find_element(By.CLASS_NAME, 'jobs-unified-top-card__company-name').text
        except:
            company_name = None

        try:
            job_location = driver.find_element(By.CLASS_NAME, 'jobs-unified-top-card__bullet').text
        except:
            job_location = None

        try:
            job_details = driver.find_element(By.ID, 'job-details').get_attribute('innerHTML')
        except:
            job_details = None

        try:
            about_the_company = driver.find_element(By.CLASS_NAME, 'jobs-company__box').find_element(By.CLASS_NAME, 'inline-show-more-text').text.replace('show more', '').replace("…", '')
        except:
            about_the_company = None
        apply_link = job_link
        print("Job -: {}/1000".format(p_counter))
        print("============================================")
        category = "General"
        status = 1
        source = "linkedin"
        saveJobs(mydb, job_link, job_title, person_name, company_name, job_location, job_details, about_the_company, apply_link, status, category, source)

        p_counter = p_counter + 1
        counter = counter + 1
        if counter >= scrape_limit:
            print("Process Completed !!")
            setRequestStatus(2, id)
            driver.quit()
            sys.exit()

    start_page = start_page + 25
    print("Next Page........................")
    if start_page == 1000:
        break
setRequestStatus(2, id)
driver.quit()

import pickle
import re
import sys
import time
import csv

import pandas as pd
from selenium import webdriver
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support import expected_conditions
from selenium.webdriver.support.wait import WebDriverWait
from webdriver_manager.chrome import ChromeDriverManager
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

mycursor = mydb.cursor()


def saveJobs(mydb,job_url, job_title, person_name, company_name, job_location, job_details, about_the_company, apply_link, status, category, source):
    mycursor = mydb.cursor()
    sql = "INSERT INTO jobs_data(job_title,job_description,job_location,company_name,person_name,category,apply_link,about_the_company,job_url,status,source) VALUES (%s, %s, %s, %s, %s, %s,%s, %s, %s, %s, %s)"
    val = (job_title,job_details,job_location,company_name,person_name,category,apply_link,about_the_company,job_url,status,source)
    mycursor.execute(sql, val)
    mydb.commit()


driver = webdriver.Chrome(ChromeDriverManager().install(), options=options)

driver.get("https://www.linkedin.com/login")
time.sleep(2)
cookies = pickle.load(open("cookie.pkl", "rb"))
for cookie in cookies:
    driver.add_cookie(cookie)
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
        continue
    time.sleep(5)
    try:
        jobs = driver.find_element(By.CLASS_NAME,'scaffold-layout__list-container').find_elements(By.CLASS_NAME,'jobs-search-results__list-item')

    except:
        break
    job_urls_array = []

    for job in jobs:
        try:
            actions = ActionChains(driver)
            actions.move_to_element(job).perform()
            time.sleep(1)
            job_url = job.find_element(By.CLASS_NAME,'job-card-list__title').get_attribute('href')
            if job_url in job_url_set:
                print("Already Exist !!")
            else:
                job_urls_array.append(job_url)
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
            job_title = driver.find_element(By.CLASS_NAME,'jobs-unified-top-card__job-title').text
        except:
            job_title = None

        try:
            person_name = driver.find_element(By.CLASS_NAME,'jobs-poster__name').text
        except:
            person_name = None


        try:
            company_name = driver.find_element(By.CLASS_NAME,'jobs-unified-top-card__company-name').text
        except:
            company_name = None

        try:
            job_location = driver.find_element(By.CLASS_NAME,'jobs-unified-top-card__bullet').text
        except:
            job_location = None

        try:
            job_details = driver.find_element(By.ID,'job-details').get_attribute('innerHTML')
        except:
            job_details = None

        try:
            about_the_company = driver.find_element(By.CLASS_NAME,'jobs-company__box').find_element(By.CLASS_NAME,'inline-show-more-text').text.replace('show more','').replace("…",'')
        except:
            about_the_company = None
        apply_link = job_link
        print("Job -: {}/1000".format(p_counter))
        print("Job Title -: {}".format(job_title))
        print("============================================")
        category = "General"
        status = 1
        source = "naukri"
        saveJobs(mydb, job_link, job_title, person_name, company_name, job_location, job_details, about_the_company,
                 apply_link, status, category, source)

        p_counter = p_counter + 1

    start_page = start_page + 25
    print("Next Page........................")
    if start_page == 1000:
        break

print("Process Completed !!")
driver.quit()

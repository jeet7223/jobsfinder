#!/usr/bin/env python3
import time
import pickle
from selenium import webdriver
from selenium.webdriver.common.by import By
from webdriver_manager.chrome import ChromeDriverManager

import warnings

warnings.filterwarnings("ignore")

# TO customize Browser Capablities The bellow codes "options"
options = webdriver.ChromeOptions()
options.add_argument("start-maximized")
options.add_argument("window-size=1920,1080")
options.add_argument("disable-infobars")
options.add_argument("--disable-extensions")
options.add_argument("--disable-blink-features=AutomationControlled")
options.add_argument('ignore-certificate-errors')


options.add_argument('--no-sandbox')
options.add_argument('--disable-dev-shm-usage')
options.add_experimental_option("useAutomationExtension", False)
options.add_experimental_option("excludeSwitches", ["enable-automation"])
options.add_experimental_option("excludeSwitches", ["enable-logging"])
driver = webdriver.Chrome(ChromeDriverManager().install(), options=options)

driver.implicitly_wait(2)

driver.get("https://www.linkedin.com/login")
time.sleep(3)
driver.find_element(by=By.NAME, value='session_key').send_keys("misterprogrammer9131@gmail.com")
time.sleep(2)
driver.find_element(by=By.NAME, value='session_password').send_keys("jeet7223893969")
time.sleep(2)
driver.find_element(by=By.CLASS_NAME, value='btn__primary--large').click()
time.sleep(30)
pickle.dump(driver.get_cookies(), open("cookie.pkl", "wb"))

driver.quit()
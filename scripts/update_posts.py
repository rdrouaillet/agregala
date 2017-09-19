# pip install splinter
import sys
import time
from urllib.parse import urljoin

import splinter

# REMEMBER TO CHANGE LOGIN, USER AND PASS
LOGIN_URL = 'http://wordpress.com/wp-admin'
USERNAME = 'aidemim'
PASSWORD = 'password'

if len(sys.argv) == 1:
    print('ERROR: must pass URLs')
    exit(1)

urls = sys.argv[1:]
browser = splinter.Browser()

# Log in
print('Logging in')
browser.visit(LOGIN_URL)
browser.fill('log', USERNAME)
browser.fill('pwd', PASSWORD)
browser.find_by_id('wp-submit').click()
while browser.url.endswith('wp-login.php'):
    time.sleep(0.1)
if not browser.url.endswith('wp-admin/'):
    print('ERROR: was not able to log in correctly.')
    browser.quit()
    exit(2)

for url in urls:
    # Visit refresh URL
    url = urljoin(url, '?fb2wp_type=all')
    print('Visiting {}...'.format(url))
    browser.visit(url)
    print('  Waiting for the posts the be loaded...')
    # Wait for the posts to be loaded
    while browser.find_by_xpath('//div[@class="blockUI blockOverlay"]'):
        time.sleep(1)
    print('  Done.')

print('Closing browser')
browser.quit()

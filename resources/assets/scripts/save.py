import os
from os.path import basename
import requests, json, sys
from lxml import html

session_requests = requests.session()

login_url = "https://live.dentrixascend.com/login/authenticate"
result = session_requests.get(login_url)
payload = {
	"organization": "MHDDS128",
	"username": "lucy",
	"password": "new29me16$",
	'send': 'Log in'
}
result = session_requests.post(
	login_url, 
	data = payload, 
	headers = { 
		'Referer': login_url, 
		'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.98 Safari/537.36' 
	}
)

url = 'https://live.dentrixascend.com/pm#patient/edit/2000002314706'
result = session_requests.get(url)

tree = html.fromstring(result.text)
authenticity_token = tree.xpath('//meta[@name="csrf-token"]/@content')[0]

path = '../patients'

for filename in os.listdir(path):
	url_put = 'https://live.dentrixascend.com/patient/' + str(os.path.splitext(filename)[0])

	payload2 = open("../patients/" + str(filename)).read()

	print payload2
	result = session_requests.put(
		url_put, 
		data=payload2,
		headers = { 
			'Referer': 'https://live.dentrixascend.com/pm',
			'X-CSRF-Token': authenticity_token,
			'Content-Type': 'application/json',
		}
	)

	print result.content







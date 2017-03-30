import os
from os.path import basename
import requests, json, sys
from lxml import html


# ===== URL Variables ==================================================

URL_login       = "https://live.dentrixascend.com/login/authenticate"
URL_edit_base   = "https://live.dentrixascend.com/pm#patient/edit/2000002314706"
URL_put_base    = "https://live.dentrixascend.com/patient/"

print "Initializing Program...";


# ===== Start Session ==================================================
session_requests = requests.session()


# ===== Step 1: Login ==================================================

login_fields = {
	"organization": "MHDDS128",
	"username": "lucy",
	"password": "new29me16$",
	'send': 'Log in'
}

print "Logging in..."

login = session_requests.post(
	URL_login, 
	data = login_fields, 
	headers = { 
		'Referer': URL_login, 
		'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36' 
	}
)

print "SUCCESS: Logged in"

# ===== Step 2: Get CSRF Token ==================================================

get_token = session_requests.get(URL_edit_base)


tree = html.fromstring(get_token.text)

csrf_token = tree.xpath('//meta[@name="csrf-token"]/@content')[0]

print "CSRF-Token: " + csrf_token

# ===== Step 3: Collect all cookies ==================================================


path = '../patients'

json_files = [pos_json for pos_json in os.listdir(path) if pos_json.endswith('.json')]

for js in json_files:
    with open(os.path.join(path, js)) as json_file:
        # do something with your json

        filename = str(os.path.splitext(js)[0])

        save_url = URL_put_base + filename
        
        print "Processing patient id: " + str(os.path.splitext(js)[0])

        data = json.load(json_file)

        # cookies = {
        #     'JSESSIONID': 'bc756772-e597-4345-b4b0-d432fd837892',
        # }

        headers = {
            'Pragma': 'no-cache',
            'Origin': 'https://live.dentrixascend.com',
            'Accept-Encoding': 'gzip, deflate, sdch, br',
            'X-CSRF-Token': csrf_token,
            'Accept-Language': 'en-US,en;q=0.8',
            'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36',
            'Content-Type': 'application/json',
            'Accept': 'application/json, text/javascript, */*; q=0.01',
            'Cache-Control': 'no-cache',
            'X-Requested-With': 'XMLHttpRequest',
            'Connection': 'keep-alive',
            'Referer': 'https://live.dentrixascend.com/pm',
        }

        # data = '{"id":2000002314706,"chartNumber":"MM2897O","firstName":"Matthew","lastName":"Szewczyk","preferredName":"DUPA","firstVisitDate":1481133600000,"lastVisitDate":1481133600000,"middleName":"S","gender":"M","dateOfBirth":-631152000000,"status":"ACTIVE","note":"-- Notes -- \\n\\n[Add Existing Notes Here]\\n\\n\\n1\\n\\nnotes","created":1481128038840,"contactMethod":"TEXT_ME","languageType":"ENGLISH","patientAddress":{"id":2000002317081,"address1":"72-24 58th Road","city":"Maspeth","state":"NY","postalCode":"11378"},"guarantoredPatients":[],"emails":[{"id":2000000502738}],"primaryEmail":{"id":2000000502738,"address":"dnaielszeqcztkrr@nyit.edu","organization":{},"patient":{}},"relatedPatients":[{"id":"200000231470620000023147061","patient":{"id":2000002314706},"relatedPatient":{"id":2000002314706},"relationship":"PRIMARY_CONTACT"},{"id":"200000231470620000023147063","patient":{"id":2000002314706},"relatedPatient":{"id":2000002314706},"relationship":"PRIMARY_GUARANTOR"}],"preferredDays":{"MONDAY":false,"TUESDAY":false,"WEDNESDAY":false,"THURSDAY":false,"FRIDAY":false,"SATURDAY":false,"SUNDAY":false},"preferredTimes":{"EARLYMORNING":false,"LATEMORNING":false,"EARLYAFTERNOON":false,"LATEAFTERNOON":false},"referredPatients":[],"discountPlan":{"id":2000000007006},"procedures":[],"thirdPartyExternalIds":[],"phones":[{"id":2000003812033,"type":"MOBILE","number":"7189026562","sequence":1,"smsAuthorizationStatus":"OPT_IN"},{"id":2000003812034,"type":"HOME","number":"1112223333","sequence":2},{"id":2000003812031,"type":"MOBILE","number":"7189026563","sequence":3,"smsAuthorizationStatus":"OPT_IN"}],"relationships":{"primaryContact":{"id":2000002314706},"primaryGuarantor":{"id":2000002314706}},"organization":{"id":2376},"primaryProvider":{"id":2000000005368},"preferredLocation":{"id":2000000000437},"toothCodes":[{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{}],"patientMedicalAlerts":[{"id":2000001300644,"severity":"SEVERITY_HIGH","effectiveDate":1488651762633,"inactiveDate":1489786705000,"permanentCondition":false,"medicalAlert":{"severity":"SEVERITY_LOW","permanentCondition":false,"description":"Hay fever/ Seasonal","active":true,"id":2000000176060,"category":{"organization":{"id":2376},"isCustom":false,"description":"Allergies","active":true,"id":2000000003394}},"active":true},{"id":2000001266838,"severity":"SEVERITY_LOW","effectiveDate":1488190225667,"permanentCondition":false,"medicalAlert":{"severity":"SEVERITY_LOW","permanentCondition":false,"description":"Aspirin","active":true,"id":2000000176062,"category":{"organization":{"id":2376},"isCustom":false,"description":"Allergies","active":true,"id":2000000003394}},"active":true}],"patientConnectionNotes":[],"patientInsurancePlans":[],"patientPaymentPlans":[],"isDuplicated":false}'

        result = session_requests.put('https://live.dentrixascend.com/patient/2000002314706', headers=headers, json=data)

        print result.content

# for filename in os.listdir(path):
# 	url_put = 'https://live.dentrixascend.com/patient/' + str(os.path.splitext(filename)[0])

# 	payload2 = open("../patients/" + str(filename)).read()

# 	print payload2
# 	result = session_requests.put(
# 		url_put, 
# 		data=payload2,
# 		headers = { 
# 			'Referer': 'https://live.dentrixascend.com/pm',
# 			'X-CSRF-Token': authenticity_token,
# 			'Content-Type': 'application/json',
# 		}
# 	)

# 	# print result.content







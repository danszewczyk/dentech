import requests, json, sys
from lxml import html
import xlwt
from pprint import pprint

import time
import datetime

from operator import itemgetter

patientId = sys.argv[1:]
debug = sys.argv[2:]



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

#print result.content
tree = html.fromstring(result.text)
authenticity_token = tree.xpath('//meta[@name="csrf-token"]/@content')[0]

time_in_epoch = datetime.date.today().strftime('%s')
															
url = 'https://live.dentrixascend.com/appointmentREST/?date='+ time_in_epoch +'000&isWeekView=true'
result = session_requests.get(
	url, 
	headers = { 
		'Referer': 'https://live.dentrixascend.com/pm',
		'X-CSRF-Token': authenticity_token,
		'Content-Type': 'application/json',
	}
)

appointment_data = json.loads(result.content)

print len(appointment_data)
pprint(appointment_data)

todays_patients = set()
todays_appointments = []

for appointment in appointment_data:
	
	url = 'https://live.dentrixascend.com/patient/' + str(appointment['patient']['id'])
	result = session_requests.get(
		url, 
		headers = { 
			'Referer': 'https://live.dentrixascend.com/pm',
			'X-CSRF-Token': authenticity_token,
			'Content-Type': 'application/json',
		}
	)

	patient_data = json.loads(result.content)


	## add if the date is today
	if time.strftime('%Y-%m-%d', time.localtime(appointment['startDateTime']/1000)) == time.strftime('%Y-%m-%d'):
		todays_patients.add(patient_data['id'])

		#pprint(appointment)

		try: 
			patient_data['primaryEmail']['address']
		except:
			patient_email = None
		else:
			patient_email = patient_data['primaryEmail']['address']


		ts_epoch = appointment['startDateTime'] / 1000;
		ts = datetime.datetime.fromtimestamp(ts_epoch).strftime('%Y-%m-%d %H:%M:%S')

		
		appointment_patient_info = {
			"appointment_time" : ts,
			"id"	:	patient_data['id'],

			"patient_info" : {
				"first_name"	:	patient_data['firstName'],
				"last_name"	:	patient_data['lastName'],
				"full_name"		: patient_data['displayFullName'],
				"preferredName"	:	patient_data['preferredName'],
				"middleName"	:	patient_data['middleName'],
				"gender"	:	patient_data['gender'],
				"phones":	patient_data['phones'],
				"email":	patient_email,
				"mailing_address" :	patient_data['patientAddress'],
				"note"	:	patient_data['note']
			}

			
		}

		todays_appointments.append(appointment_patient_info)

		url = 'https://live.dentrixascend.com/patient/' + str(patient_data['id'])
		result = session_requests.get(
			url, 
			headers = { 
				'Referer': 'https://live.dentrixascend.com/pm',
				'X-CSRF-Token': authenticity_token,
				'Content-Type': 'application/json',
			}
		)

		data = result.content

		print("--" *40)
		data = json.loads(result.content)
		del data['nameSuffix']
		del data['lastMissedAppointmentDate']
		del data['totalMissedAppointments']
		del data['emergencyContact']
		del data['hasAlerts']
		del data['isGuarantor']
		del data['created']
		del data['age']
		del data['displayFullName']
		del data['displayNameByLast']
		del data['hasPendingChanges']
		del data['externalID']

		f = open('../patients/' + str(patient_data['id']) + ".json", 'w')

		f.write(json.dumps(data))
		f.close()

		print("[PROCESSED] " + patient_data['displayFullName']);

	
json_data = []

ordered_todays_appointments_data = sorted(todays_appointments, key=itemgetter('appointment_time')) 

for appointment in ordered_todays_appointments_data:



	if int(appointment["id"]) in todays_patients:

		todays_patients.remove(appointment["id"]) 

		json_data.append(appointment)
		print appointment['id'] 
		print appointment['appointment_time']





ordered_json_data = sorted(json_data, key=itemgetter('appointment_time')) 

print ordered_json_data

f = open('todays_patients_appointments.json', 'w')
json.dump(ordered_json_data, f)
f.close()

print "file saved!"




#list(set(tree.xpath("//input[@name='csrfmiddlewaretoken']/@value")))[0]



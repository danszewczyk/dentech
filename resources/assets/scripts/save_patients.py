#!/usr/bin/env python
import requests, json, sys
from lxml import html

#patientId = sys.argv[1:]


# f = open('/home/vagrant/sites/dental_office/public/test.txt', 'r')


# json_data = json.loads(f.read())

# json_data.pop("_token")

# keys = json_data.keys()

# notes = ""

# options = {
# 	'allergy_01' : "Local Anesthetics",
# 	'allergy_02' : "Aspirin",
# 	'allergy_03' : "Penicillin or other antibiotics",
# 	'allergy_04' : "Barbiturates, sedatives, or sleeping pills",
# 	'allergy_05' : "Sulfa drugs",
# 	'allergy_06' : "Codeine or other narcotics",

# 	'allergy_07' : "Metals",
# 	'allergy_08' : "Latex (rubber)",
# 	'allergy_09' : "Iodine",
# 	'allergy_10' : "Hay fever/seasonal",
# 	'allergy_11' : "Animals",
# 	'allergy_12' : "Food",
# 	'allergy_13' : "Other",

# 	'radio-choice-page-2-1' : "Do your gums bleed when you brush or floss?", 
# 	'radio-choice-page-2-2' : "Are your teeth sensitive to cold, hot, sweets, or pressure?",
# 	'radio-choice-page-2-7' : "Does food or floss catch between your teeth?",
# 	'radio-choice-page-2-3' : "Is your mouth dry?",
# 	'radio-choice-page-2-4' : "Have you had any periodontal (gum) treatments?",
# 	'radio-choice-page-2-5' : "Have you ever had any problems associated with previous dental treatment?",
# 	'radio-choice-page-2-6' : "Do you drink bottled or filtered water?",
# 	'radio-choice-page-2-8' : "Are you currently experiencing dental pain or discomfort?",

# 	'radio-choice-1' : "Do you use contolled substances (drugs)?",
# 	'radio-choice-2' : "Do you use tobacco (smoking, snuff, chew, bids)",
# 	'radio-choice-7' : "Do you wear contact lenses?",
# 	'radio-choice-3' : "Do you drink alcoholic beverages?",
# 	'radio-choice-4' : "Have you had an orthepedic total joint (hip, knee, elbow, finger) replacement?",
# 	'radio-choice-5' : "Are you taking or scheduled to begin taking either of the medications alendronate (Fosamax) or risedronate (Actonel) for osteoporosis or Paget's disease?",
# 	'radio-choice-6' : "Since 2001, were you treated or are your presently scheduled to begin treatment with the intravenous bisphosphonates (Aredia<sup>&reg;</sup> or Zometa<sup>&reg;</sup>) for bone pain, hypercalcemia or skeletal complications resulting from Paget's disease, multiple myeloma or metastatic cancer?",
	
# 	'radio-choice-page-4-1' : "Do you have earaches or neck pains?",
# 	'radio-choice-page-4-2' : "Do you have any clicking, popping, or discomfort in the jaw?",
# 	'radio-choice-page-4-7' : "Do you brux or grind your teeth?",
# 	'radio-choice-page-4-3' : "Do you have sores or ulcers in your mouth?",
# 	'radio-choice-page-4-4' : "Do you wear dentures or partials?",
# 	'radio-choice-page-4-5' : "Do you participate in active recreational activities?",
# 	'radio-choice-page-4-6' : "Have you ever had a serious injury to your head or mouth?",
	
# 	'radio-choice-page-3-1' : "Artificial (prosthetic) heart valvue",
# 	'radio-choice-page-3-2' : "Previous infective endocarditis",
# 	'radio-choice-page-3-7' : "Damaged valves in transplanted heart",
# 	'radio-choice-page-3-3' : "Congenital heart disease (CHD)",
# 	'radio-choice-page-3-4' : "Unrepaired, cyanotic CHD",
# 	'radio-choice-page-3-5' : "Repaired (completely in last 6 months)",
# 	'radio-choice-page-3-6' : "Repaired CHD with residual defects",
# 	'radio-choice-page-3-12' : "Active Tuberculosis",
# 	'radio-choice-page-3-11' : "Persistant cough greater than a 3 week duration",
# 	'radio-choice-page-3-9' : "Cough that produces blood",
# 	'radio-choice-page-3-10' : "Been exposed to anyone with tuberculosis",

# 	'radio-choice-page-5-1' : "Cardiovascular disease",
# 	'radio-choice-page-5-2' : "Angina",
# 	'radio-choice-page-5-3' : "Arteriosclerosis",
# 	'radio-choice-page-5-4' : "Congestive heart failure",
# 	'radio-choice-page-5-5' : "Damaged heart valves",
# 	'radio-choice-page-5-6' : "Heart attack",
# 	'radio-choice-page-5-7' : "Heart murmur",
# 	'radio-choice-page-5-8' : "Low blood pressure",
# 	'radio-choice-page-5-9' : "High blood pressure",
# 	'radio-choice-page-5-10' : "Other congenital heart defects",
# 	'radio-choice-page-5-11' : "Mitral valve prolapse",
# 	'radio-choice-page-5-12' : "Pacemaker",

# 	'radio-choice-page-6-1' : "Rheumatic fever",
# 	'radio-choice-page-6-2' : "Rheumatic heart disease",
# 	'radio-choice-page-6-3' : "Abnormal bleeding",
# 	'radio-choice-page-6-4' : "Anemia",
# 	'radio-choice-page-6-5' : "Blood transfusion",
# 	'radio-choice-page-6-6' : "Hemophilia",
# 	'radio-choice-page-6-7' : "AIDS or HIV infection",
# 	'radio-choice-page-6-8' : "Arthritis",
# 	'radio-choice-page-6-9' : "Autoimmune disease",
# 	'radio-choice-page-6-10' : "Rheumatoid arthritis",
# 	'radio-choice-page-6-11' : "Systemic lupus erythematosus",

# 	'radio-choice-page-7-1' : "Asthma",
# 	'radio-choice-page-7-2' : "Bronchitis",
# 	'radio-choice-page-7-3' : "Emphysema",
# 	'radio-choice-page-7-4' : "Sinus trouble",
# 	'radio-choice-page-7-5' : "Tuberculosis",
# 	'radio-choice-page-7-6' : "Cancer/Chemotherapy/Radiation Treatment",
# 	'radio-choice-page-7-7' : "Chest pain upon exertion",
# 	'radio-choice-page-7-8' : "Chronic pain",
# 	'radio-choice-page-7-9' : "Diabetes Type I or II",
# 	'radio-choice-page-7-10' : "Eating disorder",
# 	'radio-choice-page-7-11' : "Malnutrition",
# 	'radio-choice-page-7-12' : "Gastrointestinal disease",

# 	'radio-choice-page-8-1' : "G.E. Reflux/persistent heartburn",
# 	'radio-choice-page-8-2' : "Ulcers",
# 	'radio-choice-page-8-3' : "Thyroid problems",
# 	'radio-choice-page-8-3' : "Stroke",
# 	'radio-choice-page-8-5' : "Glaucoma",
# 	'radio-choice-page-8-6' : "Hepatitis, jaundice, or liver disease",
# 	'radio-choice-page-8-7' : "Epilepsy",
# 	'radio-choice-page-8-8' : "Fainting spells or seizures",
# 	'radio-choice-page-8-9' : "Neurological disorders",
# 	'radio-choice-page-8-10' : "Sleep disorder",
# 	'adio-choice-page-8-11' : "Mental health disorders",

	











# }

# allergies = ""

# for key in keys:

# 	if  key.startswith( 'allergy_' ):
# 		if not allergies:
# 			allergies += "-- Allergies -- \n"

# 		allergies += options.get(key, None) + "\n"
# 	else:

# 		if json_data[key] == "yes":
# 			if not notes:
# 				notes += "-- Medical Information -- \n"
# 			notes += options.get(key, 'not found option') + " " +  json_data[key].upper() + "\n"





session_requests = requests.session()



login_url = "https://live.dentrixascend.com/login/j_spring_security_check"
result = session_requests.get(login_url)


payload = {
	"j_organization": "MHDDS128",
	"j_username": "lucy",
	"j_password": "new29me16$",
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


import glob
path = '../patients'

for filename in os.listdir(path):


url_put = 'https://live.dentrixascend.com/patient/2000002314706'

payload2 = open("update.json").read()

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







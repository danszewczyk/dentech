<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;

use App\Patient as Patient;
use App\Person as Person;
use App\State as State;
use App\Country as Country;
use App\Address as Address;
use App\Phone as Phone;
use App\PhoneType as PhoneType;

use Carbon\Carbon as Carbon;

class ImportController extends Controller
{
    public function todaysPatients() {

    	try {
    		$files = \File::allFiles('../resources/assets/patients/');
    	} catch (Illuminate\Filesystem\FileNotFoundException $exception) {
    	    die("The files do not exist");
    	}

    	foreach ($files as $file) {

            print $file; p
            print "<br/>";

    		$json = \File::get($file);
    		$data = json_decode($json);
    		
    		$patient = Patient::where('external_id', $data->id)->first();

    		if (!$patient) {
    			
    			// NEW PATIENT


    			// Create a new Person

    			$person = new Person;
    			$person->first_name                 =   $data->firstName;
    			$person->preferred_name             =   $data->preferredName;
    			$person->middle_name                =   $data->middleName;
    			$person->last_name                  =   $data->lastName;
    			$person->gender                     =   $data->gender;
    			if (isset($data->primaryEmail->address)) {
    				$person->email                  =   $data->primaryEmail->address;
    			}
    			

    			if (isset($data->dateOfBirth)) {
    				$person->date_of_birth = Carbon::createFromTimeStamp($data->dateOfBirth/1000)->toDateString();
    			}


    			// Create a new Patient

    			$patient = new Patient;
    			$patient->external_id               =   $data->id;

    			if (isset($data->firstVisitDate)) {
    				$patient->first_visited_at = Carbon::createFromTimeStamp($data->firstVisitDate/1000)->toDateString();
    			}

    			$patient->note   					=   $data->note;


    			// Get IDS for state and country

    			$state_id = State::where('code', $data->patientAddress->state)->first()->id;
    			
                $country_id = Country::where('code', 'US')->first()->id;

 
    			// Create an Address

    			$address = new Address;
    			$address->line_1                    =   $data->patientAddress->address1;
    			$address->line_2                    =   $data->patientAddress->address2;
    			$address->city                      =   $data->patientAddress->city;
    			$address->state_id                  =   $state_id;
    			$address->zip_code                  =   substr($data->patientAddress->postalCode, 0, 4);
    			$address->country_id                =   $country_id;


				$patient->save();
				$patient->person()->save($person);
				$patient->person->address()->save($address);


				// Create new Phones


				$phones = $data->phones;

    			foreach($phones as $new_phone) {
    				print $new_phone->number;
 					print $new_phone->type;
 					print $new_phone->extension;
 					print $new_phone->sequence;
    				print "<br/>";

    				$phone_type = PhoneType::where('name', $new_phone->type)->first();
    				
    				$phone = new Phone;

    				$phone->number          =   $new_phone->number;
    				$phone->extension       =   $new_phone->extension;
    				$phone->type_id         =   $phone_type->id;
    				$phone->order           =   $new_phone->sequence; 
    				
    				if ($phone_type->name == "mobile") {
    					$phone->sms_subscribed  =   1;
    				}
    				

    				$patient->person->phones()->save($phone);


    			}


    			// create the emergency contact

    			$emergency_contact = new Person;
    			$emergency_contact->first_name  =   '-';
    			$emergency_contact->last_name   =   '-';
    			$emergency_contact->gender      =   '0';


    			// create a phone number

    			$phone = new Phone;
    			$phone->number          =   '1';
    			$phone->type_id         =   '1';
    			$phone->order           =   '1'; 

    			

    			// save the new emergency contact

    			$emergency_contact->save();
    			$emergency_contact->phones()->save($phone);


    			// attach it to the patient

    			$patient->person->emergency_contacts()->attach($emergency_contact, ['is_emergency_contact' => 1, 'type_id' => 1]);

    			

				



    		} else {
    			print "patient exists already";
    		}
    
    	}

    	

    	

    }
}

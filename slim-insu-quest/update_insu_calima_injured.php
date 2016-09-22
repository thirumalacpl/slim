<?php

header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');


	
$collectionArray = array();


	$claimant_deta_user_id_injured = $_REQUEST['claimant_deta_user_id_injured'];
	//$insured_per_detaiil_groupid = $_REQUEST['insured_per_detaiil_groupid'];
	$inju_name = $_REQUEST['inju_name']; //1
	$inju_address = $_REQUEST['inju_address'];//2
	$inju_conatct = $_REQUEST['inju_conatct'];//3
	$inju_gender = $_REQUEST['inju_gender'];//4
	$inju_marital_status = $_REQUEST['inju_marital_status'];//5
	$inju_is_insured = $_REQUEST['inju_is_insured'];//6
	$inju_relation_claimant = $_REQUEST['inju_relation_claimant'];//7
	$inju_insury_sufferd = $_REQUEST['inju_insury_sufferd'];//8
	$inju_permanent_disability = $_REQUEST['inju_permanent_disability'];//9
	$inju_occupation = $_REQUEST['inju_occupation'];//10
	$inju_income = $_REQUEST['inju_income'];//10

		$inju_accident_benefit = $_REQUEST['inju_accident_benefit']; //11
	$inju_asset_owned = $_REQUEST['inju_asset_owned'];//12
	$inju_employer_name = $_REQUEST['inju_employer_name'];//13
	$inju_employer_address = $_REQUEST['inju_employer_address'];//14
	$inju_employer_contact = $_REQUEST['inju_employer_contact'];//15
	$inju_employer_statement = $_REQUEST['inju_employer_statement'];//16

		$inju_insured_condition = $_REQUEST['inju_insured_condition']; //17
	$inju_doa = $_REQUEST['inju_doa'];//18
	$inju_hospital_name = $_REQUEST['inju_hospital_name'];//19
	$inju_distance = $_REQUEST['inju_distance'];//20
	$inju_hospital_address = $_REQUEST['inju_hospital_address'];//21
	$inju_doc_name = $_REQUEST['inju_doc_name'];//22
	$inju_treatment = $_REQUEST['inju_treatment'];//23
	$inju_dod = $_REQUEST['inju_dod'];//24
	$inju_medical_expense = $_REQUEST['inju_medical_expense'];//25
	$inju_discharge_condition = $_REQUEST['inju_discharge_condition'];//26
	$inju_wounded_certificate = $_REQUEST['inju_wounded_certificate'];//27

		$inju_ar_copy = $_REQUEST['inju_ar_copy']; //28
	$inju_hosp_time = $_REQUEST['inju_hosp_time'];//29




$ssql = "UPDATE `details_injured` SET `name`= '$inju_name' , `address`= '$inju_address', `contact`= '$inju_conatct', `gender`= '$inju_gender' , `marital_status`= '$inju_marital_status', `is_insured`= '$inju_is_insured', `relation_claimant`= '$inju_relation_claimant', `insury_sufferd`= '$inju_insury_sufferd' , `permanent_disability`= '$inju_permanent_disability' , `occupation`= '$inju_occupation' , `income`= '$inju_income', `accident_benefit`= '$inju_accident_benefit', `asset_owned`= '$inju_asset_owned', `employer_name`= '$inju_employer_name', `employer_address`= '$inju_employer_address' , `employer_contact`= '$inju_employer_contact' , `employer_statement`= '$inju_employer_statement' , `insured_condition`= '$inju_insured_condition' , `doa`= '$inju_doa' , `hospital_name`= '$inju_hospital_name', `distance`= '$inju_distance', `hospital_address`= '$inju_hospital_address', `doctor_name`= '$inju_doc_name', `treatment`= '$inju_treatment' , `dod`= '$inju_dod' , `medical_expense`= '$inju_medical_expense' , `discharge_condition`= '$inju_discharge_condition', `wounded_certificate`= '$inju_wounded_certificate', `ar_copy`= '$inju_ar_copy', `hosp_time`= '$inju_hosp_time' where `user_id`= '$claimant_deta_user_id_injured'";

$lssql=mysql_query($ssql);




$log = mysql_query("SELECT * FROM `details_injured` where `user_id`= '$claimant_deta_user_id_injured'"); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

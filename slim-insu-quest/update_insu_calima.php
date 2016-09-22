<?php

header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');


	
$collectionArray = array();


	$claimant_deta_user_id = $_REQUEST['claimant_deta_user_id'];
	//$insured_per_detaiil_groupid = $_REQUEST['insured_per_detaiil_groupid'];
	$clai_name = $_REQUEST['clai_name']; //1
	$clai_claim_made = $_REQUEST['clai_claim_made'];//2
	$clai_address = $_REQUEST['clai_address'];//3
	$claim_contact_no = $_REQUEST['claim_contact_no'];//4
	$clai_gender = $_REQUEST['clai_gender'];//5
	$clai_dob = $_REQUEST['clai_dob'];//6
	$clai_occupation = $_REQUEST['clai_occupation'];//7
	$clai_yearly_income = $_REQUEST['clai_yearly_income'];//8
	$clai_no_of_members = $_REQUEST['clai_no_of_members'];//9
	$cali_advocate_details = $_REQUEST['cali_advocate_details'];//10
	$clai_casesum = $_REQUEST['clai_casesum'];//10




$ssql = "UPDATE `claimant_details` SET `name`= '$clai_name' , `claim_made`= '$clai_claim_made', `address`= '$clai_address', `contact_no`= '$claim_contact_no' , `gender`= '$clai_gender', `dob`= '$clai_dob', `occupation`= '$clai_occupation', `yearly_income`= '$clai_yearly_income' , `no_of_members`= '$clai_no_of_members' , `advocate_details`= '$cali_advocate_details' , `casesum`= '$clai_casesum' where `user_id`= '$claimant_deta_user_id'";

$lssql=mysql_query($ssql);




$log = mysql_query("select * ,ct.city_name,st.state from claimant_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state where `user_id`= '$claimant_deta_user_id'"); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

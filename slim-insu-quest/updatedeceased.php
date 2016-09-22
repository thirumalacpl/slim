<?php

header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');


	
$collectionArray = array();


	$claimant_deta_user_id_injured_dece = $_REQUEST['claimant_deta_user_id_injured_dece'];
	//$insured_per_detaiil_groupid = $_REQUEST['insured_per_detaiil_groupid'];
	$dece_name = $_REQUEST['dece_name']; //1
	$dece_address = $_REQUEST['dece_address'];//2
	$dece_contact = $_REQUEST['dece_contact'];//3
	$dece_age = $_REQUEST['dece_age'];//4
	$dece_gender = $_REQUEST['dece_gender'];//5
	$dece_marital_status = $_REQUEST['dece_marital_status'];//6
	$dece_isdeceased = $_REQUEST['dece_isdeceased'];//7
	$dece_relationship = $_REQUEST['dece_relationship'];//8
	$dece_injured_details = $_REQUEST['dece_injured_details'];//9
		$dece_occupation = $_REQUEST['dece_occupation'];//9 ////////////////////////////////////9
	$dece_annual_income = $_REQUEST['dece_annual_income'];//10
	$dece_accident_benefit = $_REQUEST['dece_accident_benefit'];//10

		$dece_asset_owned = $_REQUEST['dece_asset_owned']; //11
	$dece_emp_name = $_REQUEST['dece_emp_name'];//12
	$dece_emp_address = $_REQUEST['dece_emp_address'];//13
	$dece_emp_contact = $_REQUEST['dece_emp_contact'];//14
	$dece_emp_statement = $_REQUEST['dece_emp_statement'];//15
	$dece_dofd = $_REQUEST['dece_dofd'];//16

		$dece_dofpm = $_REQUEST['dece_dofpm']; //17
	$dece_dofpnama = $_REQUEST['dece_dofpnama'];//18
	$dece_pmcopy = $_REQUEST['dece_pmcopy'];//19
	$dece_cause_pmr = $_REQUEST['dece_cause_pmr'];//20
	$dece_police_details = $_REQUEST['dece_police_details'];//21
	




$ssql = "UPDATE `details_deceased` SET `name`= '$dece_name' , `address`= '$dece_address', `contact`= '$dece_contact', `age`= '$dece_age', `gender`= '$dece_gender' , `marital_status`= '$dece_marital_status', `isdeceased`= '$dece_isdeceased', `relationship`= '$dece_relationship', `injured_details`= '$dece_injured_details' , `occupation`= '$dece_occupation' , `annual_income`= '$dece_annual_income', `accident_benefit`= '$dece_accident_benefit', `asset_owned`= '$dece_asset_owned', `emp_name`= '$dece_emp_name', `emp_address`= '$dece_emp_address' , `emp_contact`= '$dece_emp_contact' , `emp_statement`= '$dece_emp_statement' , `dofd`= '$dece_dofd' , `dofpm`= '$dece_dofpm' , `dofpnama`= '$dece_dofpnama', `pmcopy`= '$dece_pmcopy', `cause_pmr`= '$dece_cause_pmr', `police_details`= '$dece_police_details' where `user_id`= '$claimant_deta_user_id_injured_dece'";

$lssql=mysql_query($ssql);




$log = mysql_query("SELECT * FROM `details_deceased` where `user_id`= '$claimant_deta_user_id_injured_dece'"); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

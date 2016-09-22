<?php

header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');


	
$collectionArray = array();


$insu_user_id = $_REQUEST['insu_user_id'];
	
	//$insured_per_detaiil_groupid = $_REQUEST['insured_per_detaiil_groupid'];
	$insu_name = $_REQUEST['insu_name'];
	$insu_address = $_REQUEST['insu_address'];
	$insu_con_no = $_REQUEST['insu_con_no'];
	$insu_gender = $_REQUEST['insu_gender'];
	$insu_dob = $_REQUEST['insu_dob'];
	$insu_yr_income = $_REQUEST['insu_yr_income'];
	$insu_pn_adh_dtls = $_REQUEST['insu_pn_adh_dtls'];
	$insu_doi_exp = $_REQUEST['insu_doi_exp'];
	$insu_isu_proof = $_REQUEST['insu_isu_proof'];
	$insu_no_fmly = $_REQUEST['insu_no_fmly'];
	$insu_ab_age = $_REQUEST['insu_ab_age'];
	$insu_vec_no = $_REQUEST['insu_vec_no'];
	$insu_usg_vec = $_REQUEST['insu_usg_vec'];
	




$ssql = "UPDATE `insured_per_details` SET `name`= '$insu_name' , `address`= '$insu_address', `con_no`= '$insu_con_no', `gender`= '$insu_gender', `dob`= '$insu_dob', `yr_income`= '$insu_yr_income', `pn_adh_dtls`= '$insu_pn_adh_dtls', `doi_exp`= '$insu_doi_exp', `isu_prof`= '$insu_isu_proof'  , `no_fmly`= '$insu_no_fmly' , `ab_age`= '$insu_ab_age' , `vec_no`= '$insu_vec_no' , `usg_vec`= '$insu_usg_vec' WHERE `user_id`= '$insu_user_id' ";
$lssql=mysql_query($ssql);






//$log = mysql_query("SELECT * FROM `insured_per_details` where `user_id`= '$insu_user_id'"); 
$log = mysql_query("select * ,ct.city_name,st.state from insured_per_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state where `user_id`= '$insu_user_id'"); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

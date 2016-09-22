<?php

header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');


	
$collectionArray = array();


	$insu_user_id_outside_driver = $_REQUEST['insu_user_id_outside_driver'];
	//$insured_per_detaiil_groupid = $_REQUEST['insured_per_detaiil_groupid'];
	$out_name = $_REQUEST['out_name'];//1
	$address = $_REQUEST['address'];//2
	$con_no = $_REQUEST['con_no'];//3
	$gender = $_REQUEST['gender'];//4
	$is_driver = $_REQUEST['is_driver'];//5
	$dl_type = $_REQUEST['dl_type'];//6
	$dob = $_REQUEST['dob'];//7
	$dr_lic_no = $_REQUEST['dr_lic_no'];//8
	$issu_autho = $_REQUEST['issu_autho'];//9
	$updated_date = $_REQUEST['updated_date'];//10
	$doi_exp = $_REQUEST['doi_exp'];//11
	$vec_autho = $_REQUEST['vec_autho'];//12
	$bg_no = $_REQUEST['bg_no'];//13
	$date_app = $_REQUEST['date_app'];//14
	$op_dr_dtls = $_REQUEST['op_dr_dtls'];//15
	$driver_drugs = $_REQUEST['driver_drugs'];//16
	$dr_involved = $_REQUEST['dr_involved'];//17
	$natr_relation = $_REQUEST['natr_relation'];//18
	$cur_emp_pr = $_REQUEST['cur_emp_pr'];//19
	$info = $_REQUEST['info'];//20
	$age = $_REQUEST['age'];//21
	$dl_place_of_issue = $_REQUEST['dl_place_of_issue'];//22
	$driver_education = $_REQUEST['driver_education'];//23
	$driver_experience = $_REQUEST['driver_experience'];//24
	$dl_valid_for = $_REQUEST['dl_valid_for'];//25
	$class_of_dl = $_REQUEST['class_of_dl'];//26
	$driver_petition_same_fir = $_REQUEST['driver_petition_same_fir'];//27
	$criminal_case_status = $_REQUEST['criminal_case_status'];//28




$ssql = "UPDATE `driver_details_d` SET `name`= '$out_name' , `address`= '$address', `con_no`= '$con_no', `gender`= '$gender', `is_driver`= '$is_driver', `dl_type`= '$dl_type', `dob`= '$dob', `dr_lic_no`= '$dr_lic_no', `issu_autho`= '$issu_autho'  , `updated_date`= '$updated_date' , `doi_exp`= '$doi_exp' , `vec_autho`= '$vec_autho' , `bg_no`= '$bg_no',`date_app`= '$date_app', `op_dr_dtls`= '$op_dr_dtls' ,`driver_drugs`= '$driver_drugs', `dr_involved`= '$dr_involved',`natr_relation`= '$natr_relation', `cur_emp_pr`= '$cur_emp_pr' ,`info`= '$info', `age`= '$age', `dl_place_of_issue`= '$dl_place_of_issue' ,`driver_education`= '$driver_education', `driver_experience`= '$driver_experience' ,`dl_valid_for`= '$dl_valid_for', `class_of_dl`= '$class_of_dl', `driver_petition_same_fir`= '$driver_petition_same_fir' ,`criminal_case_status`= '$criminal_case_status' WHERE `user_id`= '$insu_user_id_outside_driver'";
$lssql=mysql_query($ssql);




//$log = mysql_query("SELECT * FROM `driver_details_d` where `user_id`= '$insu_user_id_outside_driver'"); 
$log = mysql_query("select * ,ct.city_name,st.state from driver_details_d wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state where `user_id`= '$insu_user_id_outside_driver'"); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

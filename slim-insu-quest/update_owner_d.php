<?php

header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');


	
$collectionArray = array();


	$insu_user_id_owner_o = $_REQUEST['insu_user_id_owner_o'];
	//$insured_per_detaiil_groupid = $_REQUEST['insured_per_detaiil_groupid'];
	$owner_name = $_REQUEST['owner_name']; //1
	$owner_adress = $_REQUEST['owner_adress'];//2
	$owner_con_no = $_REQUEST['owner_con_no'];//3
	$owner_gender = $_REQUEST['owner_gender'];//4
	$owner_dl_type = $_REQUEST['owner_dl_type'];//5
	$owner_dob = $_REQUEST['owner_dob'];//6
	$owner_dl_no = $_REQUEST['owner_dl_no'];//7
	$owner_issue_autho = $_REQUEST['owner_issue_autho'];//8
	$owner_doi_exp = $_REQUEST['owner_doi_exp'];//9
	$owner_vec_auth = $_REQUEST['owner_vec_auth'];//10
	$owner_bdg_no = $_REQUEST['owner_bdg_no'];//11
	$owner_date_app = $_REQUEST['owner_date_app'];//12
	$owner_opp_dr_dtls = $_REQUEST['owner_opp_dr_dtls'];//13
	$owner_age = $_REQUEST['owner_age'];//14
	$o_dl_place_issue = $_REQUEST['o_dl_place_issue'];//15
	$o_driver_education = $_REQUEST['o_driver_education'];//16
	$o_driver_exp = $_REQUEST['o_driver_exp'];//17
	$o_dl_valid_for = $_REQUEST['o_dl_valid_for'];//18
	$o_class_of_dl = $_REQUEST['o_class_of_dl'];//19
	$o_driver_same_locality = $_REQUEST['o_driver_same_locality'];//20
	$o_driver_petition_same_fir = $_REQUEST['o_driver_petition_same_fir'];//21
	$ocriminal_case_status = $_REQUEST['ocriminal_case_status'];//22
	$o_do_issue = $_REQUEST['o_do_issue'];//23
	$o_dr_invloved = $_REQUEST['o_dr_invloved'];//24
	$o_dr_influ = $_REQUEST['o_dr_influ'];//25
	$o_othr_info = $_REQUEST['o_othr_info'];//26



$ssql = "UPDATE `driver_details_o` SET `name`= '$owner_name' , `address`= '$owner_adress', `con_no`= '$owner_con_no', `gender`= '$owner_gender' , `dl_type`= '$owner_dl_type', `dob`= '$owner_dob', `dl_no`= '$owner_dl_no', `issue_autho`= '$owner_issue_autho' , `doi_exp`= '$owner_doi_exp' , `vec_auth`= '$owner_vec_auth' , `bdg_no`= '$owner_bdg_no', `date_app`= '$owner_date_app', `opp_dr_dtls`= '$owner_opp_dr_dtls' , `age`= '$owner_age', `dl_place_issue`= '$o_dl_place_issue' ,`driver_education`= '$o_driver_education',  `driver_exp`= '$o_driver_exp' ,`dl_valid_for`= '$o_dl_valid_for', `class_of_dl`= '$o_class_of_dl', `driver_same_locality`= '$o_driver_same_locality' ,`driver_petition_same_fir`= '$o_driver_petition_same_fir' , `criminal_case_status`= '$ocriminal_case_status' ,`do_issue`= '$o_do_issue', `dr_invloved`= '$o_dr_invloved' ,`dr_influ`= '$o_dr_influ', `othr_info`= '$o_othr_info' WHERE `user_id`= '$insu_user_id_owner_o'";


$lssql=mysql_query($ssql);




//$log = mysql_query("SELECT * FROM `driver_details_o` where `user_id`= '$insu_user_id_owner_o'"); 
$log = mysql_query("select * ,ct.city_name,st.state from driver_details_o wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state where `user_id`= '$insu_user_id_owner_o'"); 

	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

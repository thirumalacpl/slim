<?php

header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');


	
$collectionArray = array();


$img_master_id = $_REQUEST['img_master_id'];
	
	$img_first_name = mysql_real_escape_string($_REQUEST['img_first_name']);
	




$ssql = "UPDATE `verification_master` SET `First_Name`= '$img_first_name' WHERE `Verification_Master_Id`= '$img_master_id'";
$lssql=mysql_query($ssql);






$log = mysql_query("SELECT activity_log_id,ref_no,verification_id,type,activity_log,document,supervisor_id,log_date,status,ct.First_Name FROM supervisor_activity_log wv Inner join user ct on wv.supervisor_id=ct.User_Id"); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

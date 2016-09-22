<?php

header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');


	
$collectionArray = array();


	
/*	$gcm_regid = $_REQUEST['gcm_regid'];
	$E_Mail =$_REQUEST['E_Mail'];
	$username = $_REQUEST['username'];
	$region = $_REQUEST['region'];
	$user_id =$_REQUEST['user_id'];*/

	$gcm_regid = mysql_real_escape_string($_REQUEST['gcm_regid']);
	$E_Mail =mysql_real_escape_string( $_REQUEST['E_Mail']);
	$username = mysql_real_escape_string($_REQUEST['username']);
	$region = mysql_real_escape_string($_REQUEST['region']);
	$user_id =mysql_real_escape_string( $_REQUEST['user_id']);
	
	$sql= "UPDATE user SET gm_user='$gcm_regid' where User_Id='$user_id'";
	$lsql=mysql_query($sql);


/*$rsql = "INSERT INTO `gcm_users`(`username`,`user_id`,`region`,`gcm_regid`,`email`,`datea`)values('$username','$user_id','$region','$gcm_regid','$E_Mail',now())";
$rlsql = mysql_query($rsql);*/


	

$log = mysql_query("SELECT * FROM `supervisor_activity_log` "); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

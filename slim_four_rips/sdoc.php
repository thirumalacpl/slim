<?php

header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');


	
$collectionArray = array();


	
	$res = mysql_real_escape_string($_REQUEST['res']);
	
$ver_master = mysql_real_escape_string($_REQUEST['verification_user_id']);

	$coordinator_id = mysql_real_escape_string($_REQUEST['coordinator_id']);

	$qualification_id =mysql_real_escape_string( $_REQUEST['qualification_id']);

		$user_id =mysql_real_escape_string( $_REQUEST['user_id']);

	


$rrsql = "INSERT INTO `supervisor_activity_log`(`verification_id`,`type`,`activity_log`,`document`,`supervisor_id`,`log_date`,`status`)values('$ver_master','$qualification_id','','$res','$user_id',now(),'doc')";
$rlsql = mysql_query($rrsql);


	

$log = mysql_query("SELECT * FROM `supervisor_activity_log` "); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

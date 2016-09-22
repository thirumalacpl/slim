<?php

header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');


	
$collectionArray = array();


	
	$userobject_lastid = mysql_real_escape_string($_REQUEST['userobject_lastid']);
	
$res_document_name = mysql_real_escape_string($_REQUEST['res_document_name']);


	


$rrsql = "INSERT INTO `documents`(`document_name`,`patient_obs_id`)values('$res_document_name','$userobject_lastid')";
$rlsql = mysql_query($rrsql);


	

$log = mysql_query("SELECT * from documents"); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

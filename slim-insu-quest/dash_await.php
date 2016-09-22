<?php
header('Content-Type:text/html; charset=UTF-8');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');


$supervisor_final_command_array = array();
$collectionArray=array();





$activity_log_details = mysql_query("select * from supervisor_final_command"); 
if(mysql_num_rows($activity_log_details)== 0){
 	$supervisor_final_command_array['activity_log_details'][] =  0;
	}
	else{
	
	 while($r3 = mysql_fetch_array($activity_log_details)) {


	array_push($supervisor_final_command_array,$r3);


}
}





array_push($collectionArray,$supervisor_final_command_array);

print json_encode($collectionArray, JSON_NUMERIC_CHECK);
	
?>

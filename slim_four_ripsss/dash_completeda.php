<?php
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');


$coordinator_final_comment_array = array();
$collectionArray=array();





$activity_log_details = mysql_query("select * from coordinator_final_comment"); 
if(mysql_num_rows($activity_log_details)== 0){
 	$coordinator_final_comment_array['activity_log_details'][] =  0;
	}
	else{
	
	 while($r3 = mysql_fetch_array($activity_log_details)) {


	array_push($coordinator_final_comment_array,$r3);


}
}





array_push($collectionArray,$coordinator_final_comment_array);

print json_encode($collectionArray, JSON_NUMERIC_CHECK);
	
?>

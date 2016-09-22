<?php
header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');


	
$collectionArray = array();


	
	$user_ida = mysql_real_escape_string($_REQUEST['user_ida']);

	$subco_statuss = mysql_real_escape_string($_REQUEST['subco_statuss']);

	$qualification_id =mysql_real_escape_string( $_REQUEST['qualification_id']);




    $sql= "UPDATE insert_assigned_users SET  tvoseen='Seen' where verification_user_id='$user_ida' and type='$qualification_id' and sstatus!='rework'";
	$lsql=mysql_query($sql);

/*$rsqlqa = "UPDATE `tet`(`user_ida`,`qualification_id`,`subco_statuss`)values('$user_ida','$qualification_id','subco_statuss')";
$rlsqlq = mysql_query($rsqlqa);*/



	

$log = mysql_query("SELECT * FROM `supervisor_activity_log` "); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

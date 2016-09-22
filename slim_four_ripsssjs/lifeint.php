<?php

header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');


	
$collectionArray = array();


	
	$ver_master =mysql_real_escape_string( $_REQUEST['verification_user_id']);

	$coordinator_id =mysql_real_escape_string( $_REQUEST['coordinator_id']);

	$qualification_id = mysql_real_escape_string($_REQUEST['qualification_id']);



	$inte = mysql_real_escape_string($_REQUEST['inte']);
	$inte_rat = mysql_real_escape_string($_REQUEST['inte_rat']);
		$beh = mysql_real_escape_string($_REQUEST['beh']);
	$beh_rat = mysql_real_escape_string($_REQUEST['beh_rat']);
		$hab =mysql_real_escape_string( $_REQUEST['hab']);
	$hab_rat = mysql_real_escape_string($_REQUEST['hab_rat']);
	

if($inte != '' || $inte_rat !=''){

$rsqlqa = "INSERT INTO `integrity_life_tvo`(`ref`,`rate`,`intg_type`,`user_id`,`type`,`status`)values('$inte','$inte_rat','1','$ver_master','$qualification_id','')";
$rlsqlq = mysql_query($rsqlqa);
}

if($beh != '' || $beh_rat !=''){

$rsqlqo = "INSERT INTO `integrity_life_tvo`(`ref`,`rate`,`intg_type`,`user_id`,`type`,`status`)values('$beh','$beh_rat','2','$ver_master','$qualification_id','')";
$rsql = mysql_query($rsqlqo);
}

if($hab != '' || $hab_rat !=''){

$rsqlqi = "INSERT INTO `integrity_life_tvo`(`ref`,`rate`,`intg_type`,`user_id`,`type`,`status`)values('$hab','$hab_rat','3','$ver_master','$qualification_id','')";
$rlsqlqii = mysql_query($rsqlqi);
}



	

$log = mysql_query("SELECT * FROM `supervisor_activity_log` "); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

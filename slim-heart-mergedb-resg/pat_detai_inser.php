<?php

header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');


	
$collectionArray = array();




  $pname = $_REQUEST['pat_name'];

	$page = $_REQUEST['age_nn'];

	$age_cm_h = $_REQUEST['age_cm_h'];

	$age_kg_w = $_REQUEST['age_kg_w'];

	$gender_d =$_REQUEST['gender_d'];

	$mob_no=$_REQUEST['mob_no'];

$condition_emer=$_REQUEST['condition_emer'];




//$date = date('Y-m-d H:i:s');

//$insert="INSERT INTO patient_condition (condition_id,arr_date,arr_time) VALUES ('$condition','$date',now())";

$insertdet = "INSERT INTO patient (patient_name,age,patient_height,patient_weight,gender,mobile_no,patient_condition) VALUES ('$pname','$page','$age_cm_h','$age_kg_w','$gender_d','$mob_no','$condition_emer')";

$run=mysql_query($insertdet);





$log = mysql_query("SELECT * FROM  `patient`"); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}



print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

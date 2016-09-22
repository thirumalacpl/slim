<?php

header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');


	
$collectionArray = array();
$patient_detaias_array = array();
$question_emergency_array = array();



  $pname = $_REQUEST['pat_name'];

	$page = $_REQUEST['age_nn'];

	$gender_d =$_REQUEST['gender_d'];

	$mob_no=$_REQUEST['mob_no'];



//$date = date('Y-m-d H:i:s');

//$insert="INSERT INTO patient_condition (condition_id,arr_date,arr_time) VALUES ('$condition','$date',now())";

$insertdet = "INSERT INTO patient (patient_name,age,gender,mobile_no) VALUES ('$pname','$page','$gender_d','$mob_no')";

$run=mysql_query($insertdet);



$patient_detaias = mysql_query("SELECT * FROM  `patient`"); 
if(mysql_num_rows($patient_detaias)== 0){
 	$patient_detaias_array['data new veri'][] =  0;
	}
	else{
	 while($r723 = mysql_fetch_array($patient_detaias)) {
	array_push($patient_detaias_array,$r723);
}
}


$question_emergency = mysql_query("SELECT * FROM  `question_emergency`"); 
if(mysql_num_rows($question_emergency)== 0){
 	$question_emergency_array['data new veri'][] =  0;
	}
	else{
	 while($r7234 = mysql_fetch_array($question_emergency)) {
	array_push($question_emergency_array,$r7234);
}
}


array_push($collectionArray,$patient_detaias_array); //1
array_push($collectionArray,$question_emergency_array); //1

	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

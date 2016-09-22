<?php

header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');

include('db_insu_inc.php');

$claimant_details_array=array();
$details_injured_array=array();

$details_deceased_array=array();
$driver_details_d_array=array();

$driver_details_o_array=array();
$fir_details_array=array();
$accident_details_array=array();
$vehicle_details_array=array();
$insured_per_details_array=array();
$verification_master_arra=array();

$claimant_details = mysql_query("SELECT * FROM `claimant_details`"); 
if(mysql_num_rows($claimant_details)== 0){
 	$claimant_details_array['data new veri'][] =  0;
	}
	else{
	 while($r7212 = mysql_fetch_array($claimant_details)) {
	array_push($claimant_details_array,$r7212);
}
}


$details_injured = mysql_query("SELECT * FROM `details_injured`"); 
if(mysql_num_rows($details_injured)== 0){
 	$details_injured_array['data new veri'][] =  0;
	}
	else{
	 while($r722 = mysql_fetch_array($details_injured)) {
	array_push($details_injured_array,$r722);
}
}

$details_deceased = mysql_query("SELECT * FROM `details_deceased`"); 
if(mysql_num_rows($details_deceased)== 0){
 	$details_deceased_array['data new veri'][] =  0;
	}
	else{
	 while($r723 = mysql_fetch_array($details_deceased)) {
	array_push($details_deceased_array,$r723);
}
}


$driver_details_d = mysql_query("SELECT * FROM `driver_details_d`"); 
if(mysql_num_rows($driver_details_d)== 0){
 	$driver_details_d_array['data new veri'][] =  0;
	}
	else{
	 while($r7256 = mysql_fetch_array($driver_details_d)) {
	array_push($driver_details_d_array,$r7256);
}
}


$driver_details_o = mysql_query("SELECT * FROM `driver_details_o`"); 
if(mysql_num_rows($driver_details_o)== 0){
 	$driver_details_o_array['data new veri'][] =  0;
	}
	else{
	 while($r7289 = mysql_fetch_array($driver_details_o)) {
	array_push($driver_details_o_array,$r7289);
}
}

$fir_details = mysql_query("SELECT * FROM `fir_details`"); 
if(mysql_num_rows($fir_details)== 0){
 	$fir_details_array['data new veri'][] =  0;
	}
	else{
	 while($r7200 = mysql_fetch_array($fir_details)) {
	array_push($fir_details_array,$r7200);
}
}


$accident_details = mysql_query("SELECT * FROM `accident_details`"); 
if(mysql_num_rows($accident_details)== 0){
 	$accident_details_array['data new veri'][] =  0;
	}
	else{
	 while($r7209 = mysql_fetch_array($accident_details)) {
	array_push($accident_details_array,$r7209);
}
}

$vehicle_details = mysql_query("SELECT * FROM `vehicle_details`"); 
if(mysql_num_rows($vehicle_details)== 0){
 	$vehicle_details_array['data new veri'][] =  0;
	}
	else{
	 while($r72009 = mysql_fetch_array($vehicle_details)) {
	array_push($vehicle_details_array,$r72009);
}
}

$insured_per_details = mysql_query("SELECT * FROM `insured_per_details`"); 
if(mysql_num_rows($insured_per_details)== 0){
 	$insured_per_details_array['data new veri'][] =  0;
	}
	else{
	 while($r72009 = mysql_fetch_array($insured_per_details)) {
	array_push($insured_per_details_array,$r72009);
}
}
$verification_master = mysql_query("SELECT * FROM `verification_master`"); 
if(mysql_num_rows($verification_master)== 0){
 	$verification_master_arra['data new veri'][] =  0;
	}
	else{
	 while($r72009123 = mysql_fetch_array($verification_master)) {
	array_push($verification_master_arra,$r72009123);
}
}


array_push($collectionArray,$claimant_details_array); //15    // db error  //45  //0
array_push($collectionArray,$details_injured_array); //42                  //46  //1 
array_push($collectionArray,$details_deceased_array); //43          //47		 //2
array_push($collectionArray,$driver_details_d_array); //15    // db error  //48  //3
array_push($collectionArray,$driver_details_o_array); //42                  //49 //4
array_push($collectionArray,$fir_details_array); //43          //50     		 //5
array_push($collectionArray,$accident_details_array); //43          //51		 //6
array_push($collectionArray,$vehicle_details_array); //43          //52			 //7
array_push($collectionArray,$insured_per_details_array); //43          //53		 //8
array_push($collectionArray,$verification_master_arra); //43          //54		 //9

print json_encode($collectionArray, JSON_NUMERIC_CHECK);
?>
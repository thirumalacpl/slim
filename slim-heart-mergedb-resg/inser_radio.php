<?php

header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');


	
$collectionArray = array();




  $chstpain = $_REQUEST['chstpain'];

	$painstrttt = $_REQUEST['painstrttt'];

	$painstrtt3 =$_REQUEST['painstrtt3'];

$painstrtt4 = $_REQUEST['painstrtt4'];
$painstrtt5 = $_REQUEST['painstrtt5'];
$painstrtt6 = $_REQUEST['painstrtt6'];
$painstrtt7 = $_REQUEST['painstrtt7'];
$painstrtt8 = $_REQUEST['painstrtt8'];
$painstrtt9 = $_REQUEST['painstrtt9'];
$painstrtt10 = $_REQUEST['painstrtt10'];

$patient_id = $_REQUEST['pat_id_lasts'];
/*$painstrttt11 = $_REQUEST['painstrttt11'];
$painstrttt12 = $_REQUEST['painstrttt12'];
*/

$far = $_REQUEST['far'];
$far1 = $_REQUEST['far1'];
$far2 = $_REQUEST['far2'];
$far3 = $_REQUEST['far3'];
$far4 = $_REQUEST['far4'];

$fara = $_REQUEST['fara'];
$far1a = $_REQUEST['far1a'];
$far2a = $_REQUEST['far2a'];
$far3a = $_REQUEST['far3a'];
$far4a = $_REQUEST['far4a'];
$far5a = $_REQUEST['far5a'];

$painstrtt13 = $_REQUEST['painstrtt13'];

$painstrtt10111 = $_REQUEST['painstrtt10111'];

$painstrtt1011 = $_REQUEST['painstrtt1011'];

$painstrtt1012 = $_REQUEST['painstrtt1012'];

$insertchest = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$chstpain','14',now())");


$inspainstart = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrttt','2',now())");

$inssituation = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrtt3','15',now())");

$insspray = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrtt4','16',now())");

$insbreathing = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrtt5','1',now())");

$inschestpain = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrtt6','18',now())");

$inspalpit = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrtt7','19',now())");

$insvomit = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrtt8','5',now())");

$inssweating = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrtt9','20',now())");

$insfear = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrtt10','7',now())");

$inssweating11 = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrtt10111','8',now())");

$inssweating11 = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrtt1011','21',now())");

$insfear12 = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrtt1012','10',now())");


if($far != 'undefined' ){
$insfearas = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$far','11',now())");
}
if($far1 != 'undefined' ){
$insfearbs= mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$far1','11',now())");
}
if($far2 != 'undefined' ){
$insfeardf = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$far2','11',now())");
}
if($far3 != 'undefined' ){
$insfeargh = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$far3','11',now())");
}
if($far4 != 'undefined' ){
$insfearghrt = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$far4','11',now())");
}


if($fara != 'undefined' ){
$insfearasq = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$fara','12',now())");
}
if($far1a != 'undefined' ){
$insfearbsq= mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$far1a','12',now())");
}
if($far2a != 'undefined' ){
$insfeardfq = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$far2a','12',now())");
}
if($far3a != 'undefined' ){
$insfearghq = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$far3a','12',now())");
}
if($far4a != 'undefined' ){
$insfearghrtq = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$far4a','12',now())");
}
if($far5a != 'undefined' ){
$insfearghrtq = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$far5a','12',now())");
}
/*$inssweatinga = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrttt11','11',now())");

$insfeara = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrttt12','12',now())");
*/
$insfeartyu = mysql_query("INSERT into patient_obser_details (`patient_obs_id`,`observation_id`,`category_id`,`created_date`) values ('$patient_id','$painstrtt13','13',now())");


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

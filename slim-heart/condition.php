
<?php
header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');

include('dbConnect.inc.php');




$collectionArray = array();
$condition_details_array = array();
$categories_details_array = array();
$activities_details_array = array();
$activities_details_arrayaa = array();

$condition_details = mysql_query("SELECT * FROM  `condition`"); 
if(mysql_num_rows($condition_details)== 0){
 	$condition_details_array['data new veri'][] =  0;
	}
	else{
	 while($r72 = mysql_fetch_array($condition_details)) {
	array_push($condition_details_array,$r72);
}
}

$categories_details = mysql_query("SELECT * FROM `categories` "); 
if(mysql_num_rows($categories_details)== 0){
 	$categories_details_array['data new veri'][] =  0;
	}
	else{
	 while($r7266 = mysql_fetch_array($categories_details)) {
	array_push($categories_details_array,$r7266);
}
}

$activities_details = mysql_query("SELECT * FROM `activities` "); 
if(mysql_num_rows($activities_details)== 0){
 	$activities_details_array['data new veri'][] =  0;
	}
	else{
	 while($r42 = mysql_fetch_array($activities_details)) {
	
	array_push($activities_details_array,$r42);
	array_push($activities_details_arrayaa,$activities_details_array);
}

}


array_push($collectionArray,$condition_details_array); //1
array_push($collectionArray,$categories_details_array); //1
array_push($collectionArray,$activities_details_arrayaa); //1



print json_encode($collectionArray, JSON_NUMERIC_CHECK);

//print json_encode($co_alldata, JSON_NUMERIC_CHECK);



/*mysql_close($con);
*/
?>
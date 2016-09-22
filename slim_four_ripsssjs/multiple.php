
<?php
/*$selectpartid=mysql_query("SELECT region,created_date as crt_date, activity_id,evaluation_status as eval, COUNT( * ) AS consolidated FROM user_activities  where region='asia' and created_date BETWEEN '2015-06-01' AND '2015-06-25'  GROUP BY region , activity_id, evaluation_Status");
*/

header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');


$collectionArray = array();


$multiple_documents_array = array();
//$supervisor_view_new_veri_array = array();
//$employment_upload_array = array();
//$addressid_records_array = array();
//$educational_records_array =array();
/*$noArray = array();
$naArray = array();*/

$reg=mysql_query("select * from multiple_documents");
	
	 

	 while($r3 = mysql_fetch_array($reg)) {

	// 	$view_assigned_user_download_array['data3'][] = $r3;
	array_push($multiple_documents_array,$r3);



	 }


/*while($r2 = mysql_fetch_array($supervisor_view)) {
$employment_upload =mysql_query("select * from multiple_documents where verification_master_id='$qualification_id'");
	
	 

	 while($r3 = mysql_fetch_array($employment_upload)) {

	// 	$view_assigned_user_download_array['data3'][] = $r3;
	array_push($employment_upload_array,$r3);



	 }

	}*/

array_push($collectionArray,$multiple_documents_array);

//array_push($collectionArray,$employment_upload_array);


	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);

/*mysql_close($con);
*/
?>
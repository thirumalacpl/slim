<?php
header('Content-Type:text/html; charset=UTF-8');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');



$collectionArray =array();
$sh_new_veri_list_countq=array();


$Password = mysql_real_escape_string($_REQUEST['PPassword']);
$uusername = mysql_real_escape_string($_REQUEST['uusername']);

/*$current_address = $_REQUEST['current_address'];
$location = $_REQUEST['location'];   
$state = $_REQUEST['state'];
$qualification_name = $_REQUEST['qualification_name'];
$task_name = $_REQUEST['task_name'];
$type = $_REQUEST['type'];*/




  $sql = "UPDATE user set Password='$Password' where Username='$uusername'";  
   $lsql=mysql_query($sql);


/*    $ladd = "UPDATE addressid_records set sh_assigned='progress' where user_id='$verification_user_id' and proof_type_id='$type'";
    $lupadd = mysql_query($ladd);*/


$user_coo=mysql_query("select count(*) as user from user");
  
   

   while($r26 = mysql_fetch_array($user_coo)) {

  //  $view_assigned_user_download_array['data3'][] = $r3;
  array_push($sh_new_veri_list_countq,$r26);



   }



array_push($collectionArray,$sh_new_veri_list_countq);
/*array_push($collectionArray,$sh_inprogress_list_countq);

array_push($collectionArray,$sh_waiting_countq);
array_push($collectionArray,$to_approved_shq);
array_push($collectionArray,$completed_sh_countq);
array_push($collectionArray,$sh_reject_list_countq);
array_push($collectionArray,$sh_verified_false_countq);
*/
print json_encode($collectionArray, JSON_NUMERIC_CHECK);









?>

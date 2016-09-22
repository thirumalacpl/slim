<?php

header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');


	
$collectionArray = array();


$policy_user_id = $_REQUEST['policy_user_id'];
	
	//$policy_address_groupid = $_REQUEST['policy_address_groupid'];
	$pol_avl = $_REQUEST['pol_avl'];
	$policy_address = $_REQUEST['policy_address'];
	$policy_dtl_pol = $_REQUEST['policy_dtl_pol'];
	$policy_pol_no = $_REQUEST['policy_pol_no'];
	$policy_pol_srt_dt = $_REQUEST['policy_pol_srt_dt'];
	$policy_pol_end_dt = $_REQUEST['policy_pol_end_dt'];
	$policy_crv_nte_no = $_REQUEST['policy_crv_nte_no'];
	$policy_crv_nte_srt_dt = $_REQUEST['policy_crv_nte_srt_dt'];
	$policy_crv_nte_end_dt = $_REQUEST['policy_crv_nte_end_dt'];
	$policy_wheth_cls_pro = $_REQUEST['policy_wheth_cls_pro'];
	$policy_dt_inmit = $_REQUEST['policy_dt_inmit'];
	$policy_tax_com = $_REQUEST['policy_tax_com'];
	$policy_cls_vec = $_REQUEST['policy_cls_vec'];
	




$ssql = "UPDATE `policy_details` SET `pol_avl`= '$pol_avl' , `dtl_pol`= '$policy_dtl_pol', `address`= '$policy_address', `pol_no`= '$policy_pol_no', `pol_srt_dt`= '$policy_pol_srt_dt', `pol_end_dt`= '$policy_pol_end_dt', `crv_nte_no`= '$policy_crv_nte_no', `crv_nte_srt_dt`= '$policy_crv_nte_srt_dt', `crv_nte_end_dt`= '$policy_crv_nte_end_dt'  , `wheth_cls_pro`= '$policy_wheth_cls_pro' , `dt_inmit`= '$policy_dt_inmit' , `tax_com`= '$policy_tax_com' , `cls_vec`= '$policy_cls_vec' WHERE `user_id`= '$policy_user_id' ";
$lssql=mysql_query($ssql);






$log = mysql_query("SELECT * FROM `policy_details` where `user_id`= '$policy_user_id'"); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

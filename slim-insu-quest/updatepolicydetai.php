<?php

header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include('dbConnect.inc.php');


	
$collectionArray = array();


	$claimant_deta_user_id_policy_detaiil = $_REQUEST['claimant_deta_user_id_policy_detaiil'];
	//$insured_per_detaiil_groupid = $_REQUEST['insured_per_detaiil_groupid'];
	$pol_pol_avl = $_REQUEST['pol_pol_avl']; //1
	$pol_address = $_REQUEST['pol_address'];//2
	$pol_dtl_pol = $_REQUEST['pol_dtl_pol'];//3
	$pol_pol_no = $_REQUEST['pol_pol_no'];//4
	$pol_pol_srt_dt = $_REQUEST['pol_pol_srt_dt'];//5
	$pol_pol_end_dt = $_REQUEST['pol_pol_end_dt'];//6
	$pol_crv_nte_no = $_REQUEST['pol_crv_nte_no'];//7
	$pol_crv_nte_srt_dt = $_REQUEST['pol_crv_nte_srt_dt'];//8
	$pol_crv_nte_end_dt = $_REQUEST['pol_crv_nte_end_dt'];//9
	$pol_wheth_cls_pro = $_REQUEST['pol_wheth_cls_pro'];//10 ////////////////////////////////////9
	$pol_dt_inmit = $_REQUEST['pol_dt_inmit'];//11
	$pol_tax_com = $_REQUEST['pol_tax_com'];//12
	$pol_cls_vec = $_REQUEST['pol_cls_vec']; //13
	
	




$ssql = "UPDATE `policy_details` SET `pol_avl`= '$pol_pol_avl' , `address`= '$pol_address', `dtl_pol`= '$pol_dtl_pol', `pol_no`= '$pol_pol_no', `pol_srt_dt`= '$pol_pol_srt_dt' , `pol_end_dt`= '$pol_pol_end_dt', `crv_nte_no`= '$pol_crv_nte_no', `crv_nte_srt_dt`= '$pol_crv_nte_srt_dt', `crv_nte_end_dt`= '$pol_crv_nte_end_dt' , `wheth_cls_pro`= '$pol_wheth_cls_pro' , `dt_inmit`= '$pol_dt_inmit', `tax_com`= '$pol_tax_com', `cls_vec`= '$pol_cls_vec' where `user_id`= '$claimant_deta_user_id_policy_detaiil'";

$lssql=mysql_query($ssql);




//$log = mysql_query("SELECT * FROM `policy_details` where `user_id`= '$claimant_deta_user_id_policy_detaiil'"); 
$log = mysql_query("select * ,ct.city_name,st.state from policy_details wv Inner join cities ct on wv.city=ct.city_id Inner join states st on st.id=wv.state where `user_id`= '$claimant_deta_user_id_policy_detaiil'"); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}





	




	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

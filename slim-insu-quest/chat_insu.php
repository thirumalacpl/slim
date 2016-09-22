<?php

header('Content-Type: application/json; charset=utf-8');
header('Content-Type:text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
include('dbConnect.inc.php');


	
$collectionArray = array();




$ver_master = $_REQUEST['verification_user_id'];

	$coordinator_id = $_REQUEST['coordinator_id'];

	$qualification_id =$_REQUEST['qualification_id'];

	$loginistant_insu=$_REQUEST['loginistant_insu'];

	/*$sdocument = $_REQUEST['sdocument'];*/
	$sstatus = $_REQUEST['status_val_inpro'];
	$rremarkg = $_REQUEST['remarkg'];


	$username = $_REQUEST['username'];
	$typofver = $_REQUEST['typofver'];
	$pertobever = $_REQUEST['pertobever'];
	$pertobeverlast = $_REQUEST['pertobeverlast'];
	$task = $_REQUEST['task'];
	$eeemail = $_REQUEST['eeemail'];

$user_id = $_REQUEST['user_id'];


if($loginistant_insu != '' &&  $loginistant_insu !== 'sadkjgfnsfrjitf' ){
$rsql = "INSERT INTO `supervisor_activity_log`(`verification_id`,`type`,`activity_log`,`document`,`supervisor_id`,`log_date`,`status`)values('$ver_master','$qualification_id','$loginistant_insu','','$user_id',now(),'supervisor')";
$rlsql = mysql_query($rsql);
}

/*if($sdocument != '' &&  $sdocument !== 'asdfdasfsdafdsew' ){
$rrsql = "INSERT INTO `supervisor_activity_log`(`verification_id`,`type`,`activity_log`,`document`,`supervisor_id`,`log_date`,`status`)values('$ver_master','$qualification_id','','$sdocument','$coordinator_id',now(),'doc')";
$rlsql = mysql_query($rrsql);
}*/
if($rremarkg != ''){
$ssql = "INSERT INTO `supervisor_final_command`(`final_command`,`supervisor_id`,`coordinator_id`,`type`,`verification_id`,`command_date`)Values('$rremarkg','','','$qualification_id','$ver_master',now())";
$lssql=mysql_query($ssql);
}

if($sstatus == 'Verified'){
	$sql= "UPDATE insert_assigned_users SET  sstatus='$sstatus',verified_on = now() where verification_user_id='$ver_master' and type='$qualification_id' and sstatus!='rework' ";
	$lsql=mysql_query($sql);

	require_once 'phpmailer/PHPMailerAutoload.php';
 
$results_messages = array();
 
$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';
 
//class phpmailerAppException extends phpmailerException {}
 
try {
$to = $eeemail;
if(!PHPMailer::validateAddress($to)) {
  throw new phpmailerAppException("Email address " . $to . " is invalid -- aborting!");
}
$mail->isSMTP();
$mail->SMTPDebug  = 0;
$mail->Host       = "smtp.gmail.com";
$mail->Port       = "587";
$mail->SMTPSecure = "tls";
$mail->SMTPAuth   = true;
$mail->Username   = "notifications@fourthforce.in";
$mail->Password   = "tyghbn@123";
//$mail->addReplyTo($usermail, $luser);
$mail->From       = $eeemail;
$mail->FromName   = "Fourth Force";
$mail->addAddress("notifications@fourthforce.in", "notifications");
$mail->addCC($eeemail, "asd");
$mail->Subject  = " Verification Completed (Verified-True)";

$body = 
'<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01  
Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html lang="en"> 
<title>New Verification</title> 
</head> 
<body> 
<table align="left" cellpadding="0" cellspacing="0" border="0" style="width:92%">
<tr style="padding-top:9px; padding-bottom:9px"> 
 Verification has been verified by TVO -'.$username.' '."".'.
</tr></table>
<table style="width:100%">
  <tr>
    <td>Type Of Verification
</td>
    <td>Person To Be Verified
</td>      
    </td>
    <td>Task
</td>
  </tr>
  <tr>
    <td>'.$typofver.'</td>
    <td>' .$pertobever.'' .$pertobeverlast.'</td>
    <td>' .$task.'</td>
  </tr> 
</table>
';

$body .= '</body> 
</html>'; 
//$mail->WordWrap = 78;
$mail->msgHTML($body); //Create message bodies and embed images

//$mail->addAttachment('images/phpmailer_mini.png','phpmailer_mini.png');  // optional name
//$mail->addAttachment('images/phpmailer.png', 'phpmailer.png');  // optional name 
try {
  $mail->send();
  $results_messages[] = "Message has been sent using SMTP";
}
catch (phpmailerException $e) {
  throw new phpmailerAppException('Unable to send to: ' . $to. ': '.$e->getMessage());
}
}
catch (phpmailerAppException $e) {
  $results_messages[] = $e->errorMessage();
}
}

if($sstatus == 'Notverified'){
	$sqlad= "UPDATE insert_assigned_users SET  sstatus='$sstatus',notverified_on =now() where verification_user_id='$ver_master' and type='$qualification_id' and sstatus!='rework' ";
	$lsqlg=mysql_query($sqlad);

	require_once 'phpmailer/PHPMailerAutoload.php';
 
$results_messages = array();
 
$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';
 
//class phpmailerAppException extends phpmailerException {}
 
try {
$to = $eeemail;
if(!PHPMailer::validateAddress($to)) {
  throw new phpmailerAppException("Email address " . $to . " is invalid -- aborting!");
}
$mail->isSMTP();
$mail->SMTPDebug  = 0;
$mail->Host       = "smtp.gmail.com";
$mail->Port       = "587";
$mail->SMTPSecure = "tls";
$mail->SMTPAuth   = true;
$mail->Username   = "notifications@fourthforce.in";
$mail->Password   = "tyghbn@123";
//$mail->addReplyTo($usermail, $luser);
$mail->From       = $eeemail;
$mail->FromName   = "Fourth Force";
$mail->addAddress("notifications@fourthforce.in", "notifications");
$mail->addCC($eeemail, "asd");
$mail->Subject  = " Verification Completed (Verified-False)";

$body = 
'<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01  
Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html lang="en"> 
<title>New Verification</title> 
</head> 
<body> 
<table align="left" cellpadding="0" cellspacing="0" border="0" style="width:92%">
<tr style="padding-top:9px; padding-bottom:9px"> 
 Verification has been verified by TVO -'.$username.' '."".'.
</tr></table>
<table style="width:100%">
  <tr>
    <td>Type Of Verification
</td>
    <td>Person To Be Verified
</td>      
    </td>
    <td>Task
</td>
  </tr>
  <tr>
    <td>'.$typofver.'</td>
    <td>' .$pertobever.'' .$pertobeverlast.'</td>
    <td>' .$task.'</td>
  </tr> 
</table>
';

$body .= '</body> 
</html>'; 
//$mail->WordWrap = 78;
$mail->msgHTML($body); //Create message bodies and embed images

//$mail->addAttachment('images/phpmailer_mini.png','phpmailer_mini.png');  // optional name
//$mail->addAttachment('images/phpmailer.png', 'phpmailer.png');  // optional name 
try {
  $mail->send();
  $results_messages[] = "Message has been sent using SMTP";
}
catch (phpmailerException $e) {
  throw new phpmailerAppException('Unable to send to: ' . $to. ': '.$e->getMessage());
}
}
catch (phpmailerAppException $e) {
  $results_messages[] = $e->errorMessage();
}
}


	

$log = mysql_query("SELECT activity_log_id,ref_no,verification_id,type,activity_log,document,supervisor_id,log_date,status,ct.First_Name FROM supervisor_activity_log wv Inner join user ct on wv.supervisor_id=ct.User_Id"); 


	 while($r6 = mysql_fetch_array($log)) {

	// 	$supervisor_view_new_veri_array['data2'][] = $r2;

	array_push($collectionArray,$r6);

}







	


print json_encode($collectionArray, JSON_NUMERIC_CHECK);





?>

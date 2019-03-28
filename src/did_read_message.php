<?php session_start(); 
require_once("../connection.php");
require_once("messages.php");
if ($_SESSION["logged_in"] == false) {																					
	header( "location: form.php"); 
} 
$msg=Message::loadMsgByMId($conn,$_GET['msg_id']);



$x=$msg->getUser_odb();



if($x==$_SESSION['user_id']) {
	$x=$msg->getMId();
	$wiad=$msg->updateMsg($conn,$x);
	$wyswietl=$msg->getMessage();
	echo $wyswietl;
	die();
} else {
	$wyswietl=$msg->getMessage();
	echo $wyswietl;
	die();
}




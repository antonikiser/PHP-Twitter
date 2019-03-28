<?php session_start(); 
require_once("../connection.php");
require_once("messages.php");
if ($_SESSION["logged_in"] == false) {																					
	header( "location: includer_form.php"); 
} 

$msg= new Message();
$msg->setUserId_nad($_SESSION['user_id']);
$msg->setUserId_odb($_POST['user_odb']);
$msg->setMessage($_POST['message_content']);
$x=$msg->saveMsg ($conn);
header("location:includer_chat.php?identyfikator=".$_POST['user_odb'] );
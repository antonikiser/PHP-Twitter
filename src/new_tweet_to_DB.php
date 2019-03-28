<?php 
session_start();
require_once("../connection.php");
require_once("tweet.php");

if ($_SESSION["logged_in"] == false) {																					
	header( "location: includer_form.php"); 
} 
var_dump($_POST);
var_dump($_GET);

$x= new Tweet();
$x->setText($_POST['tweet']);
$x->setUserId($_SESSION['user_id']);
$x->saveToDB($conn);

header("location:includer_main.php");
die();



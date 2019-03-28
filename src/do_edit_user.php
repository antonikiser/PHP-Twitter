<?php 
session_start();
require_once("../connection.php");
require_once("user.php");
if ($_SESSION["logged_in"] == false) {																					
	header( "location: form.php"); 
} 

$newEmail=$_POST['$newEmail'];
$newPassword=$_POST['$newPassword'];
$newLogin=$_POST['$newLogin'];

$x=User::getById($conn, $_SESSION['user_id']);
$x->setLogin($newLogin);
$x->setPassword($newPassword);
$x->setEmail($newEmail)

$x->save($conn);

header('location:main.php');
die();
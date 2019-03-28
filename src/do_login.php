<?php
session_start();
require_once("../connection.php");
require_once("user.php");


if(isset($_SESSION['user_id']) && isset($_SESSION['logged_in']) && $_SESSION['user_id']!=null ) {

	header("location:includer_main.php");
	die();
}else{

	if(isset ($_POST["login"]) && isset ($_POST["password"])) {
		$login = $_POST['login'];
		$pass = $_POST['password'];
	
		User::login($pass,$login);	
	}
}
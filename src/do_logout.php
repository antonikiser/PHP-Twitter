<?php
session_start();
require_once("user.php");
if($_SESSION["logged_in"]==true) {
	User::logout();
	
	var_dump($_SESSION);
	die();
	header("location:form.php");
} else {
	echo "ZADEN UZYTKOWNIK NIE JEST ZALOGOWANY, NIE MOZNA WYLOGOWAC";
} 
?>


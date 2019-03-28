<?php 
session_start();
require_once("../connection.php");
require_once("user.php");

User::register($conn);

header("location:includer_main.php");
die();

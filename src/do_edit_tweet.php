<?php
session_start();
require_once("../connection.php");
require_once("tweet.php");
if ($_SESSION["logged_in"] == false) {																					
	header( "location: includer_form.php"); 
} 


$tweet = Tweet::loadTweetById($conn, $_POST['tweet_id']);
var_dump($tweet);


$tweet->setText($_POST['tweet_content']);
var_dump($tweet);


$tweet->saveToDB($conn);

header('location:includer_main.php');
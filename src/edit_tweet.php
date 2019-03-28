<?php
session_start();
require_once("../connection.php");
require_once("tweet.php");
if ($_SESSION["logged_in"] == false) {																					
	header( "location: includer_form.php"); 
} 

$tweet1 = Tweet::loadTweetById($conn, $_GET['identyfikator']);

?>
<form action="do_edit_tweet.php" method="post">


<input type="hidden" name="tweet_id" value="<?= $tweet1->getTweetId(); ?>">
<input type="text" name="tweet_content" value="<?= $tweet1->getText(); ?>">

<input type="submit">
</form>
<?php 
session_start();
require_once("../connection.php");
require_once("tweet.php");
require_once("comment.php");
if ($_SESSION["logged_in"] == false) {																					
	header( "location: includer_form.php"); 
} 


$tweetId=$_POST['tweetid']; 
$comment=$_POST['comment_content']; 

$new= new Comment();
$new->setComment($comment);
$new->setTweetId($tweetId);
$new->setUserId($_SESSION['user_id']);
$y=$new->saveComment($conn);

header("location:includer_user_tweets.php?identyfikator=".$_POST['userid']);


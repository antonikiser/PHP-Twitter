<?php session_start(); 

if ($_SESSION["logged_in"] == false) {																					
	header( "location: includer_form.php"); 
} 

require_once("../connection.php");
require_once("tweet.php");
require_once("comment.php");

?>


<table>
<tr>
	<td> Tweet Id   .</td> 
	<td> User Id   .</td> 
	<td> Text   .</td> 
	<td> Creation Date   .</td>
	<td> Comments    .</td>
	<td> Add Comment    .</td>
</tr>

<?php 
$tweetList = Tweet:: loadAllTweetByUserId($conn,$_GET['identyfikator']) ;

foreach($tweetList as $tweet): 
?>	


<tr> 
	<td> <?= $tweet->getTweetId();?></td> 
	<td>  <?= $tweet->getUserId(); ?></td> 
	<td>  <?= $tweet->getText();?></td> 
	<td>  <?= $tweet->getDate();?></td>	
	<td> <a href="includer_view_comments.php?tweet_id=<?=$tweet->getTweetId(); ?>">Pokaz komentarze</a></td>
	<td>	
	<form action="do_new_comment_to_DB.php" method="post">
	<input type="text" name="comment_content" maxlength 140 >
	<input type="submit" value="Podziel sie komentarzem kolego">
	<input type="hidden" value="<?=$tweet->getTweetId(); ?>" name ="tweetid">
	</form>
	</td>

<?php endforeach; ?>

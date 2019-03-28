<?php session_start();

if ($_SESSION["logged_in"] == false) {																					
	header( "location: includer_form.php"); 
	die();
} 

 ?>

<h1><a href="do_logout.php">WYLOGUJ SIE</a></h1>


<?php
require_once("../connection.php");
require_once("tweet.php");
require_once("comment.php");

$uzytkownik= $_SESSION['user_id'];
echo "hey uzytkowniku o id " . $uzytkownik ." witamy na witrynie";
?>

<form action="new_tweet_to_DB.php" method="post">
Wpisz nowego tweeta:</br>
<input type="text" name="tweet" maxlength 140 ></br>
<input type="submit" value="Wyślij">
</form>

<table>
<tr>
	<td> Tweet Id   .</td> 
	<td> User Id   .</td> 
	<td> Text   .</td> 
	<td> Creation Date   .</td>
	<td> Edit Tweet    .</td>
	<td> Comments    .</td>
	<td> Add Comment    .</td>
</tr>
<?php 
//$tweetList = Tweet:: loadAllTweetByUserId($conn,$_SESSION['user_id']) ;
$tweetList = Tweet:: loadAllTweets($conn) ;
foreach($tweetList as $tweet): 
?>	
	
<tr> 
	<td> <?= $tweet->getTweetId();?></td> 
	<td>  <?= $tweet->getUserId(); ?></td> 
	<td>  <?= $tweet->getText();?></td> 
	<td>  <?= $tweet->getDate();?></td>
	<td>  <?php if( $tweet->getUserId()==$_SESSION['user_id']){?> <a href="includer_edit_tweet.php?identyfikator=<?=$tweet->getTweetId(); ?>"> Edytuj tweeta</a><?php }; ?></td>		
	<td> <a href="includer_view_comments.php?tweet_id=<?=$tweet->getTweetId(); ?>">  Pokaz komentarze  </a></td>
	<td>	
	<form action="do_new_comment_to_DB.php" method="post">
	<input type="text" name="comment_content" maxlength 140 >
	<input type="submit" value="Podziel sie komentarzem kolego">
	<input type="hidden" value="<?=$tweet->getTweetId(); ?>" name ="tweetid">
	</form>
	</td>
	
<?php endforeach; ?>


<h1>  <a href="includer_msgPage.php">CHAT</a></h1>		





</table>
</body>  

</html>
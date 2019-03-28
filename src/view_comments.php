<?php 
require_once("../connection.php");
require_once("tweet.php");
require_once("comment.php");
if ($_SESSION["logged_in"] == false) {																					
	header( "location: includer_form.php"); 
} 
?>

<!DOCTYPE html PUBLIC ">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">  

<head>  

<meta http-equiv="Content-Type" content="text/html; charset="iso-8859-2" /> 

<meta name="Description" content="Opis Twojej strony dla wyszukiwarek" />  

<meta name="log" content="Tu s?wa kluczowe rozdzielone przecinkami dla wyszukiwarek" />  

<title>MAIN PAGE</title>  

</head>  

<body> 

<table>
<tr>
	<td> commentId</td> 
	<td> userId</td> 
	<td> tweetId</td> 
	<td> Creation Date</td>
	<td> comment </td>
</tr>
<?php 
$com=Comment::loadAllCommentByTweetId($conn,$_GET['tweet_id']);
foreach($com as $var): 
?>	
	
<tr> 
	<td> <?= $var->getCommentId();?></td> 
	<td>  <?= $var->getUserId(); ?></td> 
	<td>  <?= $var->getTweetId();?></td> 
	<td>  <?= $var->getDate();?></td>
	<td>  <?= $var->getComment();?></td>

</tr>
<?php endforeach; ?>



</table>
</body>  

</html>

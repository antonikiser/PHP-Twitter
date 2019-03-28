<?php session_start(); 
require_once("../connection.php");
require_once("user.php");
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

<title>MSG</title>  

</head>  

<body> 



<table>
<tr> 
	<td> User Id   .</td> 
	<td> Email   .</td>
	<td> Username    .</td>
</tr>
<?php 
$loggedIn=$_SESSION['user_id'];
$users = User::viewAllUsersMsg($conn,$loggedIn) ;
foreach($users as $x): 
?>	
	
<tr> 
	<td> <?=  $x->getUserId();  ?></td> 
	<td>  <?= $x->getEmail();  ?></td> 
	<td>  <?= $x->getUsername();  ?></td> 	
	<td> <a href="includer_chat.php?identyfikator=<?=$x->getUserId();  ?>"> chat</a></td>	
	<td> <a href="includer_user_tweets.php?identyfikator=<?=$x->getUserId();  ?>"> Tweety <?= $x->getUsername();?></a></td>	
</tr>
<?php endforeach; ?>








</table>
</body>  

</html>

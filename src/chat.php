<?php 
session_start(); 
require_once("../connection.php");
require_once("user.php");
require_once("messages.php");
if ($_SESSION["logged_in"] == false) {																					
	header( "location: includer_form.php"); 
} 


	
?>
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
	<td> Data   .</td> 
	<td> Tresc   .</td>
	<td> Status   .</td>
</tr>
<?php
$msg=Message::loadAllSentAndReceivedMsgByUserId($conn,$_GET['identyfikator'],$_SESSION['user_id'] );
foreach($msg as $x): 
?>

<tr> 
	<td> <?=$x->getData()?></td> 
	<td> <a href="includer_did_read_message.php?msg_id=<?=$x->getMId(); ?> "> <?=$x->getMessage() ?> </a></td>
	<td> <?=$x->getStatus()?></td> 
</tr>

<?php 
endforeach;

 ?>

<form action="do_new_message_to_DB.php" method="post">
	<input type="text" name="message_content" maxlength 140 >
	<input type="submit" value="Wyslij">
	<input type="hidden" value="<?=$_GET['identyfikator']?>" name ="user_odb">

</form>
	
	

	
	
	
	
	
	
	
	
	
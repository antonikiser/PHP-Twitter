<?php session_start(); 
if ($_SESSION["logged_in"] == false) {																					
	header( "location: form.php"); 
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

<form action="do_edit_user.php" method="post">
Wpisz nowy login:</br>
<input type="text" name="newLogin" maxlength 30 ></br>
Wpisz nowe haslo:</br>
<input type="text" name="newPassword" maxlength 30 ></br>
Wpisz nowy email:</br>
<input type="text" name="newEmail" maxlength 50 ></br>

<input type="submit" value="Wylij">

</form>






</table>
</body>  

</html>








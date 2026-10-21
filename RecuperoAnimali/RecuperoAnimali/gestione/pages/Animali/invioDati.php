<?php

	include_once "../connessione.php";
		   

	print_r($_POST);
	$str = md5($_POST['password']);

	if (!empty($_POST["cod_utente"]))
	{
		$query = "UPDATE utenti SET Cognome='$_POST[cognome]', Nome='$_POST[nome]', Codice_comune='$_POST[comune]' , Indirizzo='$_POST[indirizzo]', Email='$_POST[email]', User='$_POST[user]',  Codice_Ruolo= $_POST[ruolo], Codice_Centro=$_POST[centro] WHERE Codice_Utente=$_POST[cod_utente]";
					//echo $query;
	}
	else
	{

		$query = "INSERT INTO utenti (Cognome, Nome, Codice_comune , Indirizzo, Email, User, Password, Codice_Ruolo, Codice_Centro, Stato)  VALUES ('$_POST[cognome]', '$_POST[nome]', '$_POST[comune]', '$_POST[indirizzo]', '$_POST[email]', '$_POST[user]', '$str',$_POST[ruolo],$_POST[centro], 1);";
					//echo $query;
					
	}
$query = mysqli_query($con, $query);
header("Location: ListView.php");
?>
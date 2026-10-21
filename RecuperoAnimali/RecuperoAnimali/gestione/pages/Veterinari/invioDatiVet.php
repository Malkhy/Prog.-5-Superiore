<?php

	include_once "../connessione.php";
		   

	print_r($_POST);

	if (!empty($_POST["cod_utente"]))
	{
		$query = "UPDATE utenti SET Telefono = '$_POST[telefono]', Cognome='$_POST[cognome]', Nome='$_POST[nome]', Codice_comune='$_POST[comune]' , Indirizzo='$_POST[indirizzo]', Email='$_POST[email]', User='$_POST[user]',  Codice_Ruolo= $_POST[ruolo], Codice_Centro=$_POST[centro] WHERE Codice_Utente=$_POST[cod_utente]";
					//echo $query;
	}
	else
	{

		$query = "INSERT INTO utenti (Telefono,Cognome, Nome, Codice_comune , Indirizzo, Email, User, Password, Codice_Ruolo, Codice_Centro, Stato)  VALUES ( '$_POST[telefono]', '$_POST[cognome]', '$_POST[nome]', '$_POST[comune]', '$_POST[indirizzo]', '$_POST[email]', '$_POST[user]', $_POST[password],$_POST[ruolo],$_POST[centro], 1);";
					//echo $query;
					
	}
$query = mysqli_query($con, $query);
header("Location: ListViewVet.php");
?>
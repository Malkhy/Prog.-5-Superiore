<?php

	include_once "../connessione.php";
		   

	print_r($_POST);

	if (!empty($_POST["cod_soccorritore"]))
	{
		
		$query = "UPDATE soccorritore SET Cognome='$_POST[cognome]', Nome='$_POST[nome]', Codice_comune='$_POST[comune]', Telefono='$_POST[telefono]', Indirizzo='$_POST[indirizzo]', Email='$_POST[email]',  Codice_Tip_Soccorritore= $_POST[tipoSoccorritore] WHERE Codice_Soccorritore=$_POST[cod_soccorritore]";
	}
	else
	{
		
		$query = "INSERT INTO soccorritore (Cognome, Nome, Codice_comune ,Telefono, Indirizzo, Email, Codice_Tip_Soccorritore) VALUES ('$_POST[cognome]', '$_POST[nome]', '$_POST[comune]', '$_POST[telefono]', '$_POST[indirizzo]', '$_POST[email]', '$_POST[tipoSoccorritore]');";
			
					
	}
$query = mysqli_query($con, $query);
header("Location: ListViewSoc.php");
?>
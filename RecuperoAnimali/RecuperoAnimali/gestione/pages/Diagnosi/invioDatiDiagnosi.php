<?php

	include_once "../connessione.php";
		   

	print_r($_POST);

	if (!empty($_POST["cod_diagnosi"]))
	{
		$query = "UPDATE diagnosi SET Codice_Scheda='$_POST[scheda]', Codice_Epidermico='$_POST[statoEp]', Codice_Sensorio='$_POST[statoSens]', Temperatura_Corporea='$_POST[temperatura]' , Peso='$_POST[peso]', Codice_Operatore='$_POST[veterinario]', Note='$_POST[descrizione]'  WHERE Codice_Diagnosi=$_POST[cod_diagnosi];";
					echo $query;
	}
	else
	{

		$query = "INSERT INTO diagnosi (Codice_Scheda, Codice_Epidermico, Codice_Sensorio , Temperatura_Corporea, Peso, Codice_Operatore, Data_Redazione, Note)  VALUES ('$_POST[scheda]', '$_POST[statoEp]', '$_POST[statoSens]', '$_POST[temperatura]', '$_POST[peso]', '$_POST[veterinario]', current_timestamp , '$_POST[descrizione]');";
					echo $query;
					
	}
$query = mysqli_query($con, $query);
header("Location: ListViewDiagnosi.php");
?>
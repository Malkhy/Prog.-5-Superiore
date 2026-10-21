<?php

	include_once "../connessione.php";
		   

	print_r($_POST);

	if (!empty($_POST["Cod_Terapia_Farmacologica"]))
	{
		//$query = "UPDATE terapia SET 	Codice_Diagnosi='$_POST[diagnosi]', Cod_Tipologia_Terapia='$_POST[tip_terapia]',Descrizione='$_POST[descrizione]' Temperatura_Corporea='$_POST[temperatura]' , Peso='$_POST[peso]', Codice_Operatore='$_POST[veterinario]', Note='$_POST[descrizione]',  WHERE Codice_Diagnosi=$_POST[cod_diagnosi]";
					//echo $query;
	}
	else
	{

		$query = "INSERT INTO terapia_farmacologica (Data_Compilazione, Codice_Terapia, Codice_Farmaco , Posologia, Frequenza, Durata, Data_inizio, Note)  VALUES ('$_POST[Data_compilazione]', '$_POST[terapia]', '$_POST[farmaco]', '$_POST[Posologia]', '$_POST[Posologia]', '$_POST[Frequenza]', '$_POST[Durata]', '$_POST[Data_Inizio]', '$_POST[Note]');";
					echo $query;
					
	}
$query = mysqli_query($con, $query);

header("Location: ListViewTerapia.php");

?>
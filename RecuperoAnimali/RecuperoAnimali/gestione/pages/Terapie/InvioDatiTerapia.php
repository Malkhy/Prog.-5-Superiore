<?php

	include_once "../connessione.php";
		   

	print_r($_POST);

	if (!empty($_POST["cod_terapia"]))
	{
		$query = "UPDATE terapia SET 	Codice_Diagnosi='$_POST[diagnosi]', Cod_Tipologia_Terapia='$_POST[tip_terapia]', Descrizione='$_POST[descrizione_terapia]', Codice_Operatore='$_POST[veterinario]' WHERE Codice_Terapia=$_POST[cod_terapia]";
					//echo $query;
	}
	else
	{

		$query = "INSERT INTO terapia (Codice_Diagnosi, Cod_Tipologia_Terapia, Descrizione , Data_Compilazione, Codice_Operatore)  VALUES ('$_POST[diagnosi]', '$_POST[tip_terapia]', '$_POST[descrizione_terapia]', current_timestamp, '$_POST[veterinario]');";
					//echo $query;

					if($_POST["tip_terapia"] == 1){
	
						header("Location: EditFarmacologica.php");
					} 
					elseif($_POST["tip_terapia"] == 2){
						
						header("Location: EditChirurgica.php");
					}
					else{
						
						header("Location: EditRiabilitativa.php");
					}

		
					
	}
$query = mysqli_query($con, $query);
header("Location: ListViewTerapia.php");



?>
<?php

	include_once "../connessione.php";
		   

	//print_r($_POST);

	if (!empty($_POST["cod_scheda"])) {


		
		$query = "UPDATE scheda_arrivo SET Codice_Centro='$_POST[centro]', Codice_Animale='$_POST[specie]' , Codice_Comune='$_POST[comune]', Longitudine='$_POST[longitudine]', Latitudine='$_POST[latitudine]',  Codice_Sviluppo='$_POST[fase_sviluppo]', Codice_Ricovero='$_POST[ricovero]', Note='$_POST[descrizione]', Codice_Soccorritore='$_POST[soccorritore]', Codice_Triage='$_POST[triage]', Codice_Ricovero='$_POST[ricovero]', Data_Esito_Finale='$_POST[dataEsito]', Cod_Esito_Finale='$_POST[esito]' , Codice_Operatore=$_POST[operatore] WHERE Codice_Accettazione=$_POST[cod_scheda];";
					echo $query;
	}
	else
	{

		
	
	$query="INSERT INTO entity_documento (Data_Inserimento) VALUES(current_timestamp);";
	$query= mysqli_query($con, $query);

		$query = "INSERT INTO scheda_arrivo (Codice_Centro, Data_arrivo, Codice_Animale, Codice_Comune, Longitudine, Latitudine, Codice_Sviluppo, Codice_Ricovero, Note, Codice_Soccorritore, Codice_Triage, Data_Esito_Finale, Cod_Esito_Finale, Codice_Operatore)  VALUES ('$_POST[centro]', current_timestamp , '$_POST[specie]' , '$_POST[comune]', '$_POST[longitudine]', '$_POST[latitudine]', '$_POST[fase_sviluppo]', '$_POST[ricovero]', '$_POST[descrizione]', '$_POST[soccorritore]', '$_POST[triage]', NULL , NULL, '$_POST[operatore]');";
					echo $query;
					
	}
	
$query = mysqli_query($con, $query);
header("Location: ListViewAccettazione.php");
?>
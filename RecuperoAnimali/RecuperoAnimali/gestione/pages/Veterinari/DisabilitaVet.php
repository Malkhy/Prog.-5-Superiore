<?php

	include_once "../connessione.php";
		   


	if (!empty($_GET["user"]))
	{
		switch ($_GET['stato']) {
						  case "Attivo":
							//code block
							$Stato=0;
							break;
						  Default:
							//code block;
							$Stato=1;
							break;
						}
		$query = "UPDATE utenti SET Stato=$Stato WHERE Codice_Utente=$_GET[user]";
		$query = mysqli_query($con, $query);
		//echo $query;
	}

	

header("Location: ListViewVet.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/font-awesome.min.css" rel="stylesheet">
	<link href="../../css/datepicker3.css" rel="stylesheet">
	<link href="../../css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #337ab7;
  color: white;
}
</style>	
	
</head>
<body>
<?php
		   include "../connessione.php";
		   
?>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<?php
		   include "../../common/nav_header.php";
		?>		
		
		
	</nav>
		<?php
		   include "../../common/nav_left.php";
		?>			
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">modello</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Lista Schede Accettazione</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<Table id="customers">
		<tr>
			<th>Centro</th><th>Data Arrivo</th><th>Specie</th><th>Comune Ritrovamento</th><th>Longitudine</th><th>Latitudine</th><th>Fase Sviluppo</th><th>Ricovero</th><th>Descrizione</th><th>Soccorritore</th><th>Triage</th><th>Esito Finale</th><th>Data Esito Finale</th><th>Operatore</th><th>Modifica</th>
		<tr>
		<?php

				$query ="SELECT scheda_arrivo.Codice_Accettazione, utenti.Codice_Centro ,anagrafica_centro.Denominazione, entity_documento.Data_Inserimento, specie_animali.Nome_taxon, regprovcomune.Comune as comune, scheda_arrivo.Longitudine,scheda_arrivo.Latitudine, fase_sviluppo.Descrizione as fase_sviluppo, causa_ricovero.Descrizione as ricovero, soccorritore.Cognome, soccorritore.Codice_Soccorritore , triage.Descrizione as triage, scheda_arrivo.Note, esito.Descrizione as Esito, scheda_arrivo.Data_Esito_Finale, utenti.Cognome as Cognome_utente, utenti.Codice_Utente FROM scheda_arrivo
LEFT JOIN  regprovcomune
ON scheda_arrivo.Codice_Comune =  regprovcomune.Codice_comune
LEFT JOIN  anagrafica_centro
ON scheda_arrivo.Codice_Centro =  anagrafica_centro.Codice_Centro
LEFT JOIN   specie_animali
ON scheda_arrivo.Codice_Animale =  specie_animali.Codice_animale
LEFT JOIN   fase_sviluppo
ON scheda_arrivo.Codice_Sviluppo =  fase_sviluppo.Codice_fase
LEFT JOIN   soccorritore
ON scheda_arrivo.Codice_Soccorritore =  soccorritore.Codice_Soccorritore
LEFT JOIN   triage
ON scheda_arrivo.Codice_Triage =  triage.Codice_Triage
LEFT JOIN   esito
ON scheda_arrivo.Cod_Esito_Finale =  esito.Codice_Esito
LEFT JOIN causa_ricovero
ON scheda_arrivo.Codice_Ricovero = causa_ricovero.Codice_ricovero
LEFT JOIN utenti
ON scheda_arrivo.Codice_Operatore = utenti.Codice_Utente
LEFT JOIN entity_documento
ON scheda_arrivo.Data_arrivo = entity_documento.Data_Inserimento;";
				
				$result = $con->query($query);
				if ($result) {
					
					if ($result->num_rows > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							
							echo "<tr>";
							echo "<td><a href='../ListViewCentri.php?IdCentro=$row[Codice_Centro]'>$row[Denominazione]</a></td><td>$row[Data_Inserimento]</td><td>$row[Nome_taxon]</td><td>$row[comune]</td><td>$row[Longitudine]</td><td>$row[Latitudine]</td><td>$row[fase_sviluppo]</td><td>$row[ricovero]</td><td>$row[Note]</td><td><a href='ListViewSoc.php?IdSoc=$row[Codice_Soccorritore]'>$row[Cognome]</a></td><td>$row[triage]</td><td>$row[Esito]</td><td>$row[Data_Esito_Finale]</td><td><a href='ListView.php?IdUtente=$row[Codice_Utente]'>$row[Cognome_utente]</a></td><td><a href='EditAccettazione.php?user=$row[Codice_Accettazione]'>Modifica</a></td>";
							echo "</tr>";

						}
					} 
				}
				else {
					
					die("Errore Server SQl");
				}
				?>	
				</table>
			
				
				
				
				
				
		</div><!--/container-->	
	
		
		
		
			
		
		
		<?php
		   
		   include "../../common/footer.php";
		?>	
				
			
		
	</div>	<!--/.main-->
	
	<script src="../../js/jquery-1.11.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/chart.min.js"></script>
	<script src="../../js/chart-data.js"></script>
	<script src="../../js/easypiechart.js"></script>
	<script src="../../js/easypiechart-data.js"></script>
	<script src="../../js/bootstrap-datepicker.js"></script>
	<script src="../../js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>
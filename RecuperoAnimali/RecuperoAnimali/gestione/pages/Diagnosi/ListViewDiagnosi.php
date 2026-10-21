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
				<h1 class="page-header">Lista Diagnosi</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<Table id="customers">
		<tr>
			<th>Scheda</th><th>Stato Epidermico</th><th>Stato Sensorio</th><th>Temperatura Corporea</th><th>Veterinario</th><th>Peso</th><th>Data Redazione Diagnosi</th><th>Note</th><th>Modifica</th>
		<tr>
		<?php
			
				$cognomeVet="";
				
				$query = "SELECT  d.Codice_Diagnosi, u.Codice_Utente, u.Cognome, u.Nome,specie.Nome_taxon, stato_e.Descrizione AS stato_epi, stato_s.Descrizione AS stato_sens, d.Temperatura_Corporea, d.Note, d.Data_Redazione, d.Peso, d.Codice_Scheda FROM diagnosi AS d
				LEFT JOIN scheda_arrivo AS sa
				ON d.Codice_Scheda = sa.Codice_Accettazione
				LEFT JOIN utenti AS u
				ON d.Codice_Operatore = u.Codice_Utente
				LEFT JOIN stato_epidermico AS stato_e
				ON d.Codice_Epidermico = stato_e.codice_epidermico
				LEFT JOIN stato_sensorio AS stato_s
				ON d.Codice_Sensorio = stato_s.Codice_stato
				LEFT JOIN specie_animali as specie
				ON sa.Codice_Animale = specie.Codice_animale;";
				
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						
						echo "<tr>";

						
						echo "<td><a href='ListViewScheda.php?codd=$row[Codice_Scheda]'>Scheda</a></td><td>$row[stato_epi]</td><td>$row[stato_sens]</td><td>$row[Temperatura_Corporea]</td><td><a href='ListViewVet.php?IdVet=$row[Codice_Utente]'>$row[Cognome]</a></td><td>$row[Peso]</td><td>$row[Data_Redazione]</td><td>$row[Note]</td><td><a href='EditDiagnosi.php?user=$row[Codice_Diagnosi]'>Modifica</a></td>";
						
						echo "</tr>";

					}
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
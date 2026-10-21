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
				<h1 class="page-header">Lista Terapie</h1>
			</div>
		</div><!--/.row-->
		

		<H2>Lista Terapie Farmacologiche</h2>


		<div class="panel panel-container">
		<Table id="customers">
		<tr>
			<th>Data Compilazione</th><th>Terapia</th><th>Farmaco</th><th>Posologia</th><th>Frequenza</th><th>Durata</th><th>Data Inizio</th><th>Note</th><th>Modifica</th>
		<tr>
		<?php
				
				$query = "SELECT terapia_farmacologica.Data_Compilazione, terapia.Descrizione , terapia_farmacologica.Codice_Terapia, farmaci.MEDICINALE_VETERINARIO, Posologia, Frequenza, Durata, Data_inizio, Note  FROM terapia_farmacologica 
				LEFT JOIN farmaci ON terapia_farmacologica.Codice_Farmaco = farmaci.Codice_farmaco
				LEFT JOIN terapia ON terapia_farmacologica.Codice_Terapia = terapia.Codice_Terapia;";
				
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						
						echo "<tr>";
						echo "<td>$row[Data_Compilazione]</td><td> $row[Descrizione]</td><td> $row[MEDICINALE_VETERINARIO]</td><td>$row[Posologia]</td><td>$row[Frequenza]</td><td>$row[Durata]</td><td>$row[Data_inizio]</td><td>$row[Note]</td><td><a href='EditFarmacologica.php?user=$row[Codice_Terapia]'>Modifica</a></td>";
						echo "</tr>";

					}
				}
				?>	
				</table>
				
		</div><!--/container-->	
	

		<H2>Lista Terapie Chirurgiche</h2>
		
		<div class="panel panel-container">
		<Table id="customers">
		<tr>
			<th>Terapia</th><th>Data Compilazione</th><th>Descrizione</th><th>Stato</th><th>Data Intervento</th><th>Veterinario</th><th>Durata Intervento</th><th>Esito Operazione</th><th>Note</th><th>Modifica</th>
		<tr>
		<?php
				$cognomeVet="";
				
				$query = "SELECT terapia.Descrizione AS descr, terapia_chirurgica.Data_Compilazione, terapia_chirurgica.Descrizione, terapia_chirurgica.Stato, terapia_chirurgica.Data_Intervento, utenti.Nome, utenti.Cognome, terapia_chirurgica.Durata_intervento, terapia_chirurgica.Esito_Operazione, terapia_chirurgica.Note FROM terapia_chirurgica
				LEFT JOIN terapia ON terapia_chirurgica.Codice_Terapia = terapia.Codice_Terapia
				LEFT JOIN utenti ON terapia_chirurgica.Cod_Operatore = utenti.Codice_Utente;";
				
			
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						
						echo "<tr>";
						echo "<td>$row[descr]</td><td> $row[Data_Compilazione]</td><td> $row[Descrizione]</td><td>$row[Stato]</td><td>$row[Data_Intervento]</td><td>$row[Nome] . $row[Cognome] </td><td>$row[Durata_intervento]</td><td>$row[Esito_Operazione]</td><td>$row[Note]</td><td><a href='EditTerapia.php?user=$row[Codice_Diagnosi]'>Modifica</a></td>";
						echo "</tr>";

					}
				}
				?>	
				</table>

				
		</div><!--/container-->	
		
		<H2>Lista Terapie Riabilitative</h2>

		<div class="panel panel-container">
        <Table id="customers">
        <tr>
            <th>Terapia</th><th>Descrizione Terapia Riabilitativa</th><th>Frequenza Terapia Riabilitativa</th><th>Data di Compilazione</th><th>Durata della Terapia</th><th>Modifica</th>
        <tr>
        <?php


                $query = "SELECT tr.Codice_Riabilitazione, terapia.Descrizione as Terapia, tr.Descrizione, tr.Frequenza, tr.Data_Compilazione, tr.Durata FROM terapia_riabilitativa tr
                LEFT JOIN terapia AS terapia
                ON tr.Codice_Terapia = terapia.Codice_Terapia;";

                $result = $con->query($query);
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<tr>";
                        echo "<td>$row[Terapia]</td><td> $row[Descrizione]</td><td> $row[Frequenza]</td><td>$row[Data_Compilazione]</td><td>$row[Durata]</td><td><a href='EditRiabilitativa.php?user=$row[Codice_Riabilitazione]'>Modifica</a></td>";
                        echo "</tr>";

                    }
                }
                ?>
                </table>

        </div>
			
		
		
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
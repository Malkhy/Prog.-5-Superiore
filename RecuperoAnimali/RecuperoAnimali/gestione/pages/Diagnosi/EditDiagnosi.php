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
	
	    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<?php
		   include_once "../connessione.php";
		   
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
				<h1 class="page-header">Modifica Dati</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			
				
		</div><!--/container-->	
		<?php
		
		if (!empty($_GET["user"])) {
				$query = "SELECT * FROM diagnosi WHERE Codice_Diagnosi=$_GET[user];";
				//echo $query;
				// $query = mysqli_query($con, $qr);
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$Codice_Diagnosi=$row['Codice_Diagnosi'];
						$Codice_Scheda=$row['Codice_Scheda'];
						$Codice_Epidermico=$row['Codice_Epidermico'];
						$Codice_Sensorio=$row['Codice_Sensorio'];
						$Temperatura_Corporea=$row['Temperatura_Corporea'];
						$Codice_Operatore=$row['Codice_Operatore'];
						$Descrizione=$row['Note'];
						$Peso=$row['Peso'];
					}
					
				
				}
				//
		}				
		else
			
		{
			
			$Codice_Scheda=0;
			$Codice_Epidermico=0;
			$Codice_Sensorio=0;
			$Temperatura_Corporea=0;
			$Codice_Operatore=0;
			$Descrizione="";
			$Peso=0.0;
		}
		
		
		
		
		?>
		
		
		<form name="registrazioneForm" id="registrazioneForm" action="invioDatiDiagnosi.php" method="post" onsubmit="return controllo()" enctype="multipart/form-data"> 
		<?php
		if (!empty($_GET["user"])) {
			echo "<input name='cod_diagnosi' id='cod_diagnosi' type='hidden' value='$Codice_Diagnosi'>";
		}
?>		
			
        <div class="form-group">
			<label for="scheda">Numero Scheda</label>
			<select class="form-control2" id="scheda" name="scheda">
			<option value=""> Seleziona la Scheda d'Accettazione</option>
		<?php
		
				$query = "SELECT Codice_Accettazione, sa.Codice_Operatore, ca.Descrizione, u.Cognome AS utente_Cognome, u.Nome AS utente_Nome, s.Cognome AS soccorritore_Cognome, s.Nome AS soccorritore_Nome FROM scheda_arrivo AS sa
				LEFT JOIN causa_ricovero AS ca
				ON sa.Codice_Ricovero = ca.Codice_ricovero
				LEFT JOIN utenti AS u
				ON sa.Codice_Operatore = u.Codice_Utente
				LEFT JOIN soccorritore AS s
				ON sa.Codice_Soccorritore = s.Codice_Soccorritore;";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

			?>
					<option value="<?php echo $row['Codice_Accettazione']; ?>" <?php if(!empty($_GET["user"]) && $row['Codice_Accettazione']==$Codice_Scheda) echo 'selected'; ?>  ><?php echo $row['utente_Cognome']; echo ' '; echo $row['utente_Nome']; echo ' '; echo $row['soccorritore_Cognome']; echo ' '; echo $row['utente_Nome']; echo ' '; echo $row['Descrizione']; ?></option>
			<?php
					}
				}
			?>
			</select>
		</div>		
		
		<!-- Note della diagnosi -->
		<div>
		
                
			<label for="descrizione">Descrizione Diagnosi</label>
			<input name="descrizione" id="descrizione" type="text" value="<?php echo $Descrizione; ?>">
        </div>

		<!-- Veterinario -->
		<div class="form-group">
			<label for="veterinario">Veterinario Operante</label>
			<select class="form-control2" id="veterinario" name="veterinario">
				<option value=""> Seleziona l'Operatore</option>
			<?php
		
				$query = "SELECT Codice_Utente,Cognome, Nome FROM utenti WHERE Codice_Ruolo = 1;";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

			?>
					<option value="<?php echo $row['Codice_Utente']; ?>" <?php if(!empty($_GET["user"]) && $row['Codice_Utente']==$Codice_Operatore) echo 'selected'; ?> ><?php echo  $row['Nome']; echo " "; echo $row['Cognome']; ?></option>
			<?php
					}
				}
			?>
			</select>
		</div>	

		
        <!-- Temperatura Corporea -->
        <label for="temperatura">Temperatura Corporea</label>
        <input name="temperatura" id="temperatura" type="text" value="<?php echo $Temperatura_Corporea; ?>">
       		
	
		
        <!-- Stato Epidermico -->
        <div class="form-group">
		<label for="statoEp">Stato Epidermico</label>
				<select class="form-control2" id="statoEp" name="statoEp">
				<option value=""> Seleziona lo Stato Epidermico</option>
			<?php
		
				$query = "SELECT DISTINCT codice_epidermico, Descrizione FROM stato_epidermico;";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

			?>
					<option value="<?php echo $row['codice_epidermico']; ?>" <?php if(!empty($_GET["user"]) && $row['codice_epidermico']==$Codice_Epidermico) echo 'selected'; ?> ><?php echo  $row['Descrizione']; ?></option>
			<?php
					}
				}
			?>
				</select>
		</div>	
        
		<!-- Peso -->		
		<label for="peso">Peso</label>
        <input name="peso" id="peso" type="text" value="<?php echo $Peso; ?>">
		<label>KG</label>
		
		<!-- Stato Sensorio -->
		<div class="form-group">
		<label for="statoSens">Stato Sensorio</label>
				<select class="form-control2" id="statoSens" name="statoSens">
				<option value=""> Seleziona lo Stato Sensorio</option>
			<?php
		
				$query = "SELECT DISTINCT Codice_stato, Descrizione FROM stato_sensorio;";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

			?>
					<option value="<?php echo $row['Codice_stato']; ?>" <?php if(!empty($_GET["user"]) && $row['Codice_stato']==$Codice_Sensorio) echo 'selected'; ?> ><?php echo  $row['Descrizione']; ?></option>
			<?php
					}
				}
			?>
				</select>
		</div>	
       
	   	<!-- Bottone regitra -->
		<input type="submit" class="btn btn-primary" value="Registra">	
		</form>
		
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
    <script>
        $(document).ready(function() {

            $("#regione").on('change', function() {
                var regione = $(this).val();
			
                $.ajax({
                    method: "POST",
                    url: "response.php",
                    data: {
                        id: regione
						
                    },
                    datatype: "html",
                    success: function(data) {
                        $("#provincia").html(data);
                        $("#comune").html('<option value="">Seleziona Comune</option>');

                    }
                });
            });
			
            $("#provincia").on('change', function() {
                var provinciaid = $(this).val();
                $.ajax({
                    method: "POST",
                    url: "response.php",
                    data: {
                        sid: provinciaid
                    },
                    datatype: "html",
                    success: function(data) {
                        $("#comune").html(data);

                    }

                });
            });
        
		
		});
    </script>	
</body>
</html>
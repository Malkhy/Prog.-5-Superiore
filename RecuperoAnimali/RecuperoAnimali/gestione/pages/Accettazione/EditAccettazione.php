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
				<h1 class="page-header">Inserimento Nuovo Animale</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			
				
		</div><!--/container-->	
		<?php
		
		if (!empty($_GET["user"])) {
				$query = "SELECT * FROM scheda_arrivo  WHERE Codice_Accettazione=$_GET[user];";
				//echo $query;
				// $query = mysqli_query($con, $qr);
				
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$Data_Esito_Finale=$row['Data_Esito_Finale'];
						$Cod_Esito_Finale=$row['Cod_Esito_Finale'];
						$Codice_Soccorritore=$row['Codice_Soccorritore'];
						$Codice_Accettazione=$row['Codice_Accettazione'];
						$Codice_comune=$row['Codice_Comune'];
						$Codice_centro=$row['Codice_Centro'];
						$Data_arrivo=$row['Data_arrivo'];
						$Codice_animale=$row['Codice_Animale'];
						$Longitudine=$row['Longitudine'];
						$Latitudine=$row['Latitudine'];
						$Codice_sviluppo=$row['Codice_Sviluppo'];
						$Codice_ricovero=$row['Codice_Ricovero'];
						$Note=$row['Note'];
						$Codice_triage=$row['Codice_Triage'];
						$Codice_operatore=$row['Codice_Operatore'];

					}
					
					$query = "SELECT Comune, Regione, SiglaPR FROM regprovcomune WHERE Codice_comune='$Codice_comune';";
					$result = $con->query($query);
					
					if ($result->num_rows > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							$Comune= $row['Comune'];
							$Regione=$row['Regione'];
							$SiglaPR=$row['SiglaPR'];							
						}
						
					}
				}
				//
		}				
		else
			
		{

			$Data_Esito_Finale="";
			$Cod_Esito_Finale=0;
			$Codice_Soccorritore=0;
			$Codice_Accettazione=0;
			$Codice_comune=0;
			$Codice_centro=0;
			$Data_arrivo=0;
			$Codice_animale=0;
			$Longitudine=0;
		 	$Latitudine=0;
			$Codice_sviluppo=0;
			$Codice_ricovero=0;
			$Note="";
			$Codice_triage=0;
			$Codice_operatore=0;

		}
		
		
		
		
		?>
		
		
		<form name="registrazioneForm" id="registrazioneForm" action="invioDatiAccettazione.php" method="POST" onsubmit="return controllo()" enctype="multipart/form-data"> 
		<?php
		
			if (!empty($_GET["user"])) {
				echo "<input name='cod_scheda' id='cod_scheda' type='hidden' value='$Codice_Accettazione'>";
			}
		?>

		<!-- Centro di recupero -->
				<label for="centro"> Centro di Recupero dov'è in cura l'Animale</label>
			<select class="form-control2" id="centro" name="centro">
				<option value=""> Seleziona il Centro</option>
				<?php

				$query = "SELECT Codice_Centro, Denominazione  FROM anagrafica_centro;";
				// $query = mysqli_query($con, $qr);
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

				?>
                    <option value="<?php echo $row['Codice_Centro']; ?>"  <?php if($row['Codice_Centro']==$Codice_centro) echo 'selected'; ?>  ><?php echo $row['Denominazione']; ?></option>
				<?php
					}
				}

				?>

        </select>
		<div class="form-group">


                <div class="form-group">
                    <label for="specie">Specie</label>
					<select class="form-control2" id="specie" name="specie">
					<option value=""> Seleziona la Specie</option>
				<?php
		
					$query = "SELECT Nome_taxon, Codice_animale FROM specie_animali ORDER BY Nome_taxon ASC;";
					$result = $con->query($query);
					if ($result->num_rows > 0) {
						while ($row = mysqli_fetch_assoc($result)) {

					?>
						<option value="<?php echo $row['Codice_animale']; ?>" <?php if($row['Codice_animale']==$Codice_animale) echo 'selected'; ?>><?php echo $row['Nome_taxon']; ?></option>
					<?php
						}
					}
				?>
					</select>
				</div>
		</div>


		<!-- Comune -->
		<div class="form-group">
			<label for="regione"> Regione</label>
			<select class="form-control2" id="regione" name="regione">
				<option value=""> Seleziona la Regione</option>
				<?php
		
					$query = "SELECT DISTINCT Regione FROM regprovcomune ORDER BY Regione ASC;";
					$result = $con->query($query);
					if ($result->num_rows > 0) {
						while ($row = mysqli_fetch_assoc($result)) {

					?>
						<option value="<?php echo $row['Regione']; ?>" <?php if(!empty($_GET["user"]) && $row['Regione']==$Regione) echo 'selected'; ?>><?php echo $row['Regione']; ?></option>
					<?php
						}
					}
				?>

        </select>
		
	
		<label for="provincia"> Provincia</label>
        <select class="form-control2" id="provincia" name="provincia">
            <option value="">Seleziona Provicia</option>
				<?php
					if(!empty($_GET["user"]))
					{
						$query = "SELECT SiglaPR, Provincia FROM regprovcomune WHERE Regione='$Regione' ORDER BY 1 ASC;";
						echo $query;
						$result = $con->query($query);
						if ($result->num_rows > 0) {
							while ($row = mysqli_fetch_assoc($result)) {

						?>
						<option value="<?php echo $row['SiglaPR']; ?>" <?php if($row['SiglaPR']==$SiglaPR) echo 'selected'; ?>><?php echo $row['Provincia']; ?></option>
						<?php
							}
						}
					}
				?>			
			

        </select>
		
		<label for="comune"> Comune</label>
        <select class="form-control2" id="comune" name="comune">
            <option value="">Seleziona Comune</option>
	<?php
					if(!empty($_GET["user"]))
					{
						$query = "SELECT Codice_comune, Comune FROM regprovcomune WHERE SiglaPR='$SiglaPR' ORDER BY 1 ASC;";
						echo $query;
						$result = $con->query($query);
						if ($result->num_rows > 0) {
							while ($row = mysqli_fetch_assoc($result)) {

						?>
						<option value="<?php echo $row['Codice_comune']; ?>" <?php if($row['Codice_comune']==$Codice_comune) echo 'selected'; ?>><?php echo $row['Comune']; ?></option>
						<?php
							}
						}
					}
				?>				
			
			
			
        </select>
		<br>
		
        <!-- Longitudine -->
        
           <label for="longitudine">Longitudine</label>
           <input name="longitudine" id="longitudine" type="text" value="<?php echo $Longitudine ?>">
       		
		</div>
		
        <!-- Latitudine -->
        <div class="form-group">
           <label for="latitudine">Latitudine</label>
           <input name="latitudine" id="latitudine" type="text" value="<?php echo $Latitudine ?>">
		</div>


		 <!-- Fase Sviluppo -->
		<div class="form-group">
                <label for="fase_sviluppo">Fase Sviluppo</label>
				<select class="form-control2" id="fase_sviluppo" name="fase_sviluppo">
				<option value=""> Seleziona la Fase di Sviluppo</option>
			<?php
		
				$query = "SELECT DISTINCT Codice_fase, Descrizione FROM fase_sviluppo;";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

			?>
					<option value="<?php echo $row['Codice_fase']; ?>" <?php if(!empty($_GET["user"]) && $row['Codice_fase']==$Codice_sviluppo) echo 'selected'; ?>><?php echo $row['Descrizione']; ?></option>
			<?php
					}
				}
			?>
				</select>
		</div>
		
		 <!-- Ricovero -->
        <div class="form-group">
                <label for="ricovero">Ricovero</label>
				<select class="form-control2" id="ricovero" name="ricovero">
				<option value=""> Seleziona la Causa di Ricovero</option>
			<?php
		
				$query = "SELECT DISTINCT Codice_ricovero, Descrizione FROM causa_ricovero;";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

			?>
					<option value="<?php echo $row['Codice_ricovero']; ?>" <?php if(!empty($_GET["user"]) && $row['Codice_ricovero']==$Codice_ricovero) echo 'selected'; ?>><?php echo $row['Descrizione']; ?></option>
			<?php
					}
				}
			?>
				</select>
		</div>		
		
		<!-- Descrizione Ulteriore -->
        <div class="form-group">
           <label for="descrizione">Descrizione Animale</label>
           <input name="descrizione" id="descrizione" type="text" value="<?php echo $Note ?>">
		   
		<!-- Soccorritore -->
		
		
        
		<div class="form-group">
		<label for="soccorritore">Soccorritore</label>
				<select class="form-control2" id="soccorritore" name="soccorritore">
				<option value=""> Seleziona l'Operatore</option>
			<?php
		
				$query = "SELECT DISTINCT Codice_Soccorritore,Cognome, Nome FROM soccorritore;";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

			?>
					<option value="<?php echo $row['Codice_Soccorritore']; ?>" <?php if(!empty($_GET["user"]) && $row['Codice_Soccorritore']==$Codice_Soccorritore) echo 'selected'; ?> ><?php echo  $row['Nome']; echo " "; echo $row['Cognome']; ?></option>
			<?php
					}
				}
			?>
				</select>
		</div>	

		<div class="form-group">
		<label for="operatore">Operatore</label>
				<select class="form-control2" id="operatore" name="operatore">
				<option value=""> Seleziona l'Operatore</option>
			<?php
		
				$query = "SELECT DISTINCT Codice_Utente,Cognome, Nome FROM utenti WHERE Codice_Ruolo != '1';";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

			?>
					<option value="<?php echo $row['Codice_Utente']; ?>" <?php if(!empty($_GET["user"]) && $row['Codice_Utente']==$Codice_operatore) echo 'selected'; ?> ><?php echo  $row['Nome']; echo " "; echo $row['Cognome']; ?></option>
			<?php
					}
				}
			?>
				</select>
		</div>	




		
		<div class="form-group">
                <label for="triage">Triage</label>
				<select class="form-control2" id="triage" name="triage">
				<option value=""> Seleziona il Triage</option>
			<?php
		
				$query = "SELECT DISTINCT Codice_Triage, Descrizione FROM triage;";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

			?>
					<option value="<?php echo $row['Codice_Triage']; ?>" <?php if(!empty($_GET["user"]) && $row['Codice_Triage']==$Codice_triage) echo 'selected'; ?>><?php echo $row['Descrizione']; ?></option>
			<?php
					}
				}
			?>
				</select>
		</div>		
		
		<div class="form-group">
                <label for="esito">Esito Finale</label>
				<select class="form-control2" id="esito" name="esito">
				<option value=""> Seleziona l'Esito</option>
			<?php
		
				$query = "SELECT DISTINCT Codice_Esito, Descrizione FROM esito;";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

			?>
					<option value="<?php echo $row['Codice_Esito']; ?>" <?php if(!empty($_GET["user"]) && $row['Codice_Esito']==$Cod_Esito_Finale) echo 'selected'; ?>><?php echo $row['Descrizione']; ?></option>
			<?php
					}
				}
			?>
				</select>
		</div>		
		
		<label for="data">Data dell'Esito finale</label> 
		<input type="date" id="dataEsito" name="dataEsito"> 
		
        	
		
    </div>	
		
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
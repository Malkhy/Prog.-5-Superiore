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
				<h1 class="page-header">Dati Soccorritore</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			
				
		</div><!--/container-->	
		<?php
		
		if (!empty($_GET["user"])) {
				$query = "SELECT * FROM soccorritore WHERE Codice_Soccorritore=$_GET[user];";
				//echo $query;
				// $query = mysqli_query($con, $qr);
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$Codice_Soccorritore=$row['Codice_Soccorritore'];
						$Cognome=$row['Cognome'];
						$Nome=$row['Nome'];
						$Codice_comune=$row['Codice_Comune'];
						$Indirizzo=$row['Indirizzo'];
						$Telefono=$row['Telefono'];
						$Email=$row['Email'];
						$Codice_Tip_Soccorritore=$row['Codice_Tip_Soccorritore'];
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
			$Codice_Soccorritore=0;
			$Cognome="";
			$Nome="";
			$Codice_comune="";
			$Indirizzo="";
			$Telefono="";
			$Email="";
			$Codice_Tip_Soccorritore=0;				
		}
		
		
		
		
		?>
		
		
		<form name="registrazioneForm" id="registrazioneForm" action="invioDatiSoc.php" method="post" onsubmit="return controllo()" enctype="multipart/form-data"> 
		<?php
		if (!empty($_GET["user"])) {
			echo "<input name='cod_soccorritore' id='cod_soccorritore' type='hidden' value='$Codice_Soccorritore'>";
		}
?>		
				
				
				<!-- Cognome -->
                <div class="form-group">
                    <label for="cognome">Cognome*</label>
                    <input name="cognome" id="cognome" type="text" value="<?php echo $Cognome; ?>">
                
				<!-- Nome -->
                
                    <label for="nome">Nome*</label>
                    <input name="nome" id="nome" type="text" value="<?php echo $Nome; ?>">
                </div>


		
		
		
		<!-- Ente -->
		<div class="form-group">
			<label for="tipoSoccorritore"> Ente</label>
			<select class="form-control2" id="tipoSoccorritore" name="tipoSoccorritore">
				<option value=""> Seleziona l'ente del soccorritore</option>
				<?php

				$query = "SELECT *  FROM tipologia_soccorritore;";
				// $query = mysqli_query($con, $qr);
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

				?>
                    <option value="<?php echo $row['Codice_Tip_Soccorritore'];  ?>" <?php if($row['Codice_Tip_Soccorritore']==$Codice_Tip_Soccorritore) echo 'selected' ?>><?php echo $row['Descrizione']; ?></option>
				<?php
					}
				}

				?>

        </select> 
		
		<!-- Telefono -->
        <div class="form-group">
           <label for="telefono">Telefono</label>
           <input name="telefono" id="telefono" type="text" value="<?php echo $Telefono; ?>">
        </div>		
		  	
		
		<!-- Email -->
        
           <label for="email">Email</label>
           <input name="email" id="email" type="text" value="<?php echo $Email; ?>">
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
		
        </div>	
		
		<!-- Indirizzo -->
        
           <label for="indirizzo">Indirizzo</label>
           <input name="indirizzo" id="indirizzo" type="text" value="<?php echo $Indirizzo; ?>">
		<br>
		
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
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
				$query = "SELECT * FROM terapia WHERE Codice_Terapia=$_GET[user];";
				//echo $query;
				// $query = mysqli_query($con, $qr);
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$Codice_Terapia=$row['Codice_Terapia'];
						$Codice_Diagnosi=$row['Codice_Diagnosi'];
						$Cod_Tipologia_Terapia=$row['Cod_Tipologia_Terapia'];
						$Codice_Operatore=$row['Codice_Operatore'];
						$Descrizione=$row['Descrizione'];
					}
					
				
				}
				//
		}				
		else
			
		{
			$Codice_Terapia=0;
			$Codice_Diagnosi=0;
			$Cod_Tipologia_Terapia=0;
			$Codice_Operatore=0;
			$Descrizione="";
		}
		
		
		
		
		?>
		
		
		<form name="Terapia" id="Terapia" action="InvioDatiTerapia.php" method="post" onsubmit="return controllo()" enctype="multipart/form-data"> 
		<?php
		if (!empty($_GET["user"])) {
			echo "<input name='cod_terapia' id='cod_terapia' type='hidden' value='$Codice_Terapia'>";
		}
?>		
			
        <div class="form-group">
			<label for="diagnosi">Diagnosi</label>
			<select class="form-control2" id="diagnosi" name="diagnosi">
			<option value=""> Seleziona la Diagnosi</option>
		<?php
		
				$query = "SELECT Codice_Diagnosi FROM diagnosi;";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
									
			?>
					<option value="<?php echo $row['Codice_Diagnosi']; ?>" <?php if(!empty($_GET["user"]) && $row['Codice_Diagnosi']==$Codice_Diagnosi) echo 'selected'; ?> > <?php echo $row['Codice_Diagnosi'];?></option>
			<?php
					}
				}
			?>
			</select>
		</div>		
		
		<!-- Note della diagnosi -->
		<div>
		
                
		<div class="form-group">
			<label for="tip_terapia">Tipologia Terapia</label>
			<select class="form-control2" id="tip_terapia" name="tip_terapia">
			<option value=""> Seleziona la Tipologia della Terapia</option>
		<?php
		
				$query = "SELECT * FROM tipologia_terapia;";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
									
			?>
					<option value="<?php echo $row['Codice_Terapia']; ?>"  <?php if(!empty($_GET["user"]) && $row['Codice_Terapia']==$Cod_Tipologia_Terapia) echo 'selected'; ?> > <?php echo $row['Descrizione'];?></option>
			<?php
					}
				}
			?>
			</select>
		</div>		
		
		<label for="descrizione_terapia">Descrizione Terapia</label>
        <input name="descrizione_terapia" id="descrizione_terapia" type="text" value="<?php echo $Descrizione; ?>">
		

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
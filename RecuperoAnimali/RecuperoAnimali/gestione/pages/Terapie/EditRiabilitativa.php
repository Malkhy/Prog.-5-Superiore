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
				<h1 class="page-header">Modifica Terapia</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			
				
		</div><!--/container-->	
		<?php
		
		if (!empty($_GET["user"])) {
				$query = "SELECT * FROM terapia_riabilitativa WHERE Codice_Riabilitazione=$_GET[user];";
				//echo $query;
				// $query = mysqli_query($con, $qr);
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$Codice_Riabilitazione=$row['Codice_Riabilitazione'];
						$Codice_Terapia=$row['Codice_Terapia'];
						$Descrizione=$row['Descrizione'];
						$Frequenza=$row['Frequenza'];
						$Data_Compilazione=$row['Data_Compilazione'];
						$Durata=$row['Durata'];
						
					}
				
				}
				//
		}				
		else
			
		{
			$Codice_Riabilitazione=0;
			$Codice_Terapia=0;
			$Descrizione="";
			$Frequenza="";
			$Data_Compilazione="yyyy/mm/dd";
			$Durata="";				
		}
		
		
		
		
		?>
		
		
		<form name="Riabilitativa" id="Riabilitativa" action="invioDatiRiabilitativa.php" method="post" onsubmit="return controllo()" enctype="multipart/form-data"> 
		<?php
		if (!empty($_GET["user"])) {
			echo "<input name='cod_riabilitazione' id='cod_riabilitazione' type='hidden' value='$Codice_Riabilitazione'>";
		}
?>		
				
				
				<!-- Cognome -->
                <div class="form-group">
                <label for="n_terapia">Terapia</label>
				<select class="form-control2" id="n_terapia" name="n_terapia">
				<option value=""> Seleziona il numero della terapia</option>
			<?php
		
					$query = "SELECT Codice_Terapia FROM terapia;";
					$result = $con->query($query);
					if ($result->num_rows > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
									
			?>
					<option value="<?php echo $row['Codice_Terapia']; ?>"> <?php echo $row['Codice_Terapia'];?></option>
			<?php
					}
				}
			?>
				</select>
				</div>
			
				<!-- Descrizione -->
                <div>
                    <label for="descrizione">Descrizione Terapia*</label>
                    <input name="descrizione" id="descrizione" type="text" value="<?php echo $Descrizione; ?>">
                </div>
		
        <!-- Frequenza -->
			<div>
				<label for="freaquenza">Frequenza della terapia</label>
				<input name="freaquenza" id="freaquenza" type="text" value="<?php echo $Frequenza; ?>">
				<select name="n_volte" id="n_volte">
					<option value="mensile">Al mese </option>
					<option value="girnaliera">Al giorno</option>
					<option value="settimanale">A settimana</option>
				</select>
       		
			</div>
			
			<div>
				<label for="data_compilazione">Seleziona la data di Compilazione</label>
				<input type="date" id="data_compilazione" name="data_compilazione">
			</div>
	
		
		
		<!-- Durata Terapia -->
			<div>
			   <label for="durata">Durata della terapia</label>
			   <input name="durata" id="durata" type="time" value="<?php echo $Durata; ?>">
			</div>	
		
    
		
		<input type="submit" class="btn btn-primary" value="Registra">	
		</form>
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
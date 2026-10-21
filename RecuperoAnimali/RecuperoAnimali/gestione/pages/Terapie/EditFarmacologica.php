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
				$query = "SELECT * FROM terapia_farmacologica WHERE Cod_Terapia_Farmacologica=$_GET[user];";
				//echo $query;
				// $query = mysqli_query($con, $qr);
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$Codice_Farmacologica=$row['Cod_Terapia_Farmacologica'];
						$Data_compilazione=$row['Data_Compilazione'];
						$Codice_Terapia=$row['Codice_Terapia'];
						$Codice_farmaco=$row['Codice_Farmaco'];
						$Posologia=$row['Posologia'];
						$Frequenza=$row['Frequenza'];
						$Durata=$row['Durata'];
						$Data_Inizio=$row['Data_inizio'];
						$Descrizione=$row['Note'];
					}
					
				
				}
				//
		}				
		else
			
		{
			
			$Codice_Farmacologica=0;
			$Data_compilazione=null;
			$Codice_Terapia=0;
			$Codice_farmaco=0;
			$Posologia=0;
			$Frequenza=0;
			$Durata=0;
			$Data_Inizio="yyyy/mm/dd";
			$Descrizione="";
		}
		
		
		
		
		?>
		
		
		<form name="Farmacologica" id="Farmacologica" action="InvioDatiFarmacologica.php" method="post" onsubmit="return controllo()" enctype="multipart/form-data"> 
		<?php
			if (!empty($_GET["user"])) {
				echo "<input name='Cod_Terapia_Farmacologica' id='Cod_Terapia_Farmacologica' type='hidden' value='$Codice_Farmacologica'>";
			}
		?>		
		
		
		<label for="DataCompilazione">Data Compilazione Terapia</label>
        <input name="Data_compilazione" id="Data_compilazione" type="date" value="<?php echo $Data_compilazione; ?>">
			
        <div class="form-group">
			<label for="Terapia">Terapia</label>
			<select class="form-control2" id="terapia" name="terapia">
			<option value=""> Seleziona la Terapia</option>
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
		
		
		
        <div class="form-group">

		
		<label for="descrizione_terapia">Note Terapia Farmacologica</label>
        <input name="note" id="note" type="text" value="<?php echo $Descrizione; ?>">
		
		<br>
		
		<label for="descrizione_terapia">Posologia</label>
        <input name="Posologia" id="Posologia" type="text" value="<?php echo $Posologia; ?>">
		
				<br>

		
		<label for="descrizione_terapia">Frequenza</label>
        <input name="Frequenza" id="Frequenza" type="text" value="<?php echo $Frequenza; ?>">
		
				<br>

		
		<label for="descrizione_terapia">Durata</label>
        <input name="Durata" id="Durata" type="text" value="<?php echo $Durata; ?>">
			
			<br>

		<label for="descrizione_terapia">Data Inizio</label>
        <input name="Data_Inizio" id="Data_Inizio" type="date" value="<?php echo $Data_Inizio; ?>">
		
		</div>
		
		
		
		<!-- Veterinario -->
		<div class="form-group">
			<label for="Farmaco">Farmaco</label>
			<select class="form-control2" id="farmaco" name="farmaco">
				<option value=""> Seleziona il farmaco</option>
			<?php
		
				$query = "SELECT DISTINCT MEDICINALE_VETERINARIO, Codice_farmaco FROM farmaci;";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					while ($row = mysqli_fetch_assoc($result)) {

			?>
					<option value="<?php echo $row['Codice_farmaco']; ?>" <?php if(!empty($_GET["user"]) && $row['Codice_farmaco']==$Codice_farmaco) echo 'selected'; ?> ><?php echo  $row['MEDICINALE_VETERINARIO'];?></option>
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
<!DOCTYPE html>
<html lang="it">

<head>
</head>


<body>


<?php

    if(isset($_POST["username"]) && isset($_POST["password"]) ) {

        $username = $_POST["username"];

        $password = $_POST["password"];
		
		
		$sname = "localhost";
		$uname = "root";
		$pass = "";
		$db_name = "centro_animali";

		$con = mysqli_connect($sname, $uname, $pass,$db_name);

		$qs = "SELECT * 
           FROM utenti
           WHERE user = '$username' AND Password = '$password' AND Stato='1';"; 

		$ris = mysqli_query($con, $qs);

		if (mysqli_num_rows($ris)) {

			
			echo "<script>window.location.href = '/5A/RecuperoAnimali/gestione/index.php'; </script>";

		} else {

			header("Location: AccessoWildLife.php?error=1");
			exit;

		}
		
		
		

    } else {

        header("Location: AccessoWildLife.php");
        exit();
    }

    mysqli_close($con);

?>




</body>



</html>
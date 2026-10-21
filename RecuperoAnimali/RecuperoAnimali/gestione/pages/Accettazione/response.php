<?php
include ("../connessione.php");
if (!empty($_POST["id"])) {
    $id = $_POST['id'];
    $query = "SELECT DISTINCT SiglaPR, Provincia FROM regprovcomune WHERE Regione='$id' ORDER BY 1 ASC";

    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0) {
        echo '<option value="">Selezione Provincia</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['SiglaPR'] . '">' . $row['Provincia'] . '</option>';
  
		}
    }
} elseif (!empty($_POST['sid'])) {
    $id = $_POST['sid'];
    $query1 = "SELECT Codice_comune, Comune FROM regprovcomune WHERE SiglaPR='$id' ORDER BY Comune ASC;";
    $result1 = mysqli_query($con, $query1);
    if ($result1->num_rows > 0) {
        echo '<option value="">Seleziona Comune</option>';
        while ($row = mysqli_fetch_assoc($result1)) {
            echo '<option value="' . $row['Codice_comune'] . '">' . $row['Comune'] . '</option>';
        }
    }
}

?>
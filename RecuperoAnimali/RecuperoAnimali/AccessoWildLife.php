<!DOCTYPE html>
<html lang="it">
<head>
<title>Accesso - Associazione Wildlife</title>
<meta charset="UTF-8">
<meta name="description" content="Pagina di accesso per l'Associazione Wildlife">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Matteo Vitali, Nicolò Carlucci, Marco Mannarella, Davide Melchionna, Roberto Clementi">
<link rel="stylesheet" href="HomeStyle.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- Barra di navigazione -->
<div class="w3-top">
  <div class="w3-bar w3-green w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-green" href="javascript:void(0);" onclick="myFunction()" title="Attiva/Disattiva il Menu di Navigazione"><i class="fa fa-bars"></i></a>
    <a href="HomeWildLife.php" class="w3-bar-item w3-button w3-padding-large w3-green w3-hover-white">Home</a>
  </div>
</div>

<!-- Intestazione -->
<header class="w3-container w3-green w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Accesso - Associazione Wildlife</h1>
</header>

<!-- Form di accesso -->
<div class="w3-container w3-padding-64 w3-center">
  <form name="accesso" action="verificaLogin.php" onsubmit="return validaAccesso()" method="POST">
    <div class="w3-section">
      <label>Nome utente</label>
      <input class="w3-input w3-border" type="text" name="username" placeholder="Inserisci il tuo nome utente">
    </div>
    <div class="w3-section">
      <label>Password</label>
      <input class="w3-input w3-border" type="password" name="password" placeholder="Inserisci la tua password">
    </div>
    <button class="w3-button w3-black w3-padding-large w3-large" type="submit">Accedi</button>
  </form>
</div>

<!-- Piè di Pagina -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
     <p>Grazie per aver visitato il nostro sito!</a></p>
 </div>
</footer>

<script>
// Funzione di validazione del modulo di accesso
function validaAccesso() {
    var username = document.forms['accesso']['username'].value;
    var password = document.forms['accesso']['password'].value;

    if (username === "") { 
        alert("Il campo nome utente è vuoto! Compilalo.");
        return false;
    }
    
    if (password === ""){
        alert("Il campo password è vuoto! Compilalo.");
        return false;
    }

    return true;
}
</script>
</body>
</html>

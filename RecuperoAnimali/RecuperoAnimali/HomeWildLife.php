<!DOCTYPE html>
<html lang="it">
<head>
<title>Pagina Homa WILDLIFE</title>
<meta charset="UTF-8">
<meta name="description" content="Pagina home dell'associazione wildlife">
<meta name="keywords" content="informazioni">
<meta name="author" content="Matteo Vitali, Nicolò Carlucci, Marco Mannarella, Davide Melchionna, Roberto Clementi">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="HomeStyle.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
function scrollToElement(elementId) {
  var element = document.getElementById(elementId);
  if (element) {
    element.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
}
</script>

</head>
<body>
<!-- Barra di navigazione -->
<div class="w3-top">
  <div class="w3-bar w3-green w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-green" href="javascript:void(0);" onclick="myFunction()" title="Attiva/Disattiva il Menu di Navigazione"><i class="fa fa-bars"></i></a>
    <a class="w3-bar-item w3-button w3-padding-large w3-hover-white" onclick="scrollToElement('intestazione')">WildLife</a>
    <a class="w3-bar-item w3-button w3-padding-large w3-hover-white" onclick="scrollToElement('ChiSiamo')">Chi siamo</a>
    <a class="w3-bar-item w3-button w3-padding-large w3-hover-white" onclick="scrollToElement('ComeOperiamo')">Come operiamo</a>
    <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="scrollToElement('AnimaleDifficolta')">Hai trovato un animale in difficoltà?</a>
    <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" onclick="scrollToElement('Mappa')">Mappa Centri di Recupero</a>
  </div>
  <!-- Barra di navigazione su schermi piccoli -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a class="w3-bar-item w3-button w3-padding-large" onclick="scrollToElement('trovatoDifHai trovato un animale in difficoltà? Ecco cosa fareficoltà')">Hai trovato un animale in difficoltà? Ecco cosa fare</a>
    <a class="w3-bar-item w3-button w3-padding-large" onclick="scrollToElement('Mappa Centri di Recupero')">Mappa Centri di Recupero</a>
  </div>
</div>

<!-- Intestazione -->
<header id="intestazione" class="w3-container w3-green w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">WILD LIFE</h1>
  <p class="w3-xlarge">Per il soccorso e la cura di animali selvatici</p>
  <a href="AccessoWildLife.php" class="w3-button w3-black w3-padding-large w3-large w3-margin-top ">Accesso</a>
</header>

<!-- Prima Griglia -->
<div id="ChiSiamo" class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>Chi siamo</h1>
      <h5 class="w3-padding-32">Siamo l'assocazione WildLife, il nostro scopo è quello di aiutare gli animali selvatici in difficoltà, preservare la natura, tutelare la biodiversità e promuovere la cultura ecologica. Utilizziamo il portale web per poter dare la possibilità a tutti di segnalarci e portarci eventuali animali selvatici rimasti ferriti o in difficoltà.</h5>

      <p class="w3-text-grey">Operiamo sul territorio nazionale e ci mettiamo a disposizione per proteggere la natura che ci circonda e gli animali che la abitano. Questi esseri viventi sono spesso vittime di avvelenamenti, ferimenti da trappole 
      o armi da parte dei bracconieri. Alcuni di loro riecono a sopravvivcere a tutto ciò ma rimangono comunque in condizioni gravi che se non curate a dovere possono portarli a conseguenze gravi. Tramite le segnalazioni che riceviamo possiamo 
      ancora fare qualcosa per loro prima che sia troppo tardi.</p>
    </div>

    <div class="w3-third w3-center">
      <i></i>
    </div>
  </div>
</div>

<!-- Seconda Griglia -->
<div id="ComeOperiamo" class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i></i>
    </div>

    <div class="w3-twothird">
      <h1>Come operiamo</h1>
      <h5 class="w3-padding-32">Operiamo sul territorio nazionale con equipe di operatori specializzati per ogni attività.</h5>

      <p class="w3-text-grey">Tramite le segnalazioni che riceviamo e gli animali che vengono portati ai centri di recupero abbiamo la possibilità di presatre soccorso a queste specie che sono rimaste ferite o in diffcoltà, abbiamo un corpo di medici specializzati 
      pronti per ogni tipo di operazione o diagnosi da effettuare. Disponiamo anche di strutture all'interno dei centri addibbirte ad ospitare più specie di animali, queste strutture servono soprattutto per gli animali che vengono abbandonati o per i cuccioli che 
      sono stati trovati da soli ed indifesi in territori pericolosi.</p>
    </div>
  </div>
</div>

<!-- terza Griglia -->
<div id="AnimaleDifficolta" class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>Hai trovato un animale in difficoltà?
      <br>Cosa fare?
      </h1>
      <h5 class="w3-padding-32">Se hai trovato un animale in difficoltà, contatta subito il centro di recupero più vicino a te e manderemo un nostro assistente ad aiutarti</h5>

      <p class="w3-text-grey"><h3>Assicurare la tua sicurezza:</h3> Prima di avvicinarti all'animale ferito, assicurati di essere al sicuro. Se l'animale è in una situazione pericolosa, come una strada trafficata, assicurati di segnalare l'area per evitare altri incidenti.

        <br><h3>Valutare la situazione:</h3> Se è sicuro farlo, avvicinati all'animale ferito con cautela. Valuta le condizioni dell'animale senza toccarlo. Guarda se sembra essere in grado di muoversi autonomamente o se ha ferite evidenti.

        <br><h3>Seguire le istruzioni dei soccorsi:</h3> Quando chiami i soccorsi, descrivi la situazione nel modo più dettagliato possibile. Segui le istruzioni che ti vengono date per garantire che l'animale riceva l'aiuto necessario nel minor tempo possibile.

        <br><h3>Fornire assistenza se possibile:</h3> Se l'animale sembra in grado di muoversi in sicurezza, puoi cercare di fornire assistenza fino all'arrivo dei soccorsi. Ad esempio, se l'animale è stato coinvolto in un incidente stradale, puoi cercare di proteggerlo dalla circolazione stradale o fornire acqua se sembra disidratato.

        <br><h3>Rimanere calmi e pazienti:</h3> Mantieni la calma durante la situazione e cerca di rassicurare l'animale con movimenti lenti e voci tranquillizzanti. Ricorda che l'animale potrebbe essere spaventato o confuso a causa della situazione.</p>
    </div>

    <div class="w3-third w3-center">
      <i></i>
    </div>
  </div>
</div>


<!-- quarta Griglia -->
<div id="Mappa" class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
    </div>

<!-- quinta Griglia -->
    <div class="w3-center">
      <h1>Mappa Centri di Recupero</h1>

      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12367353.697823416!2d2.1183282868056765!3d40.81975990771308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d4fe82448dd203%3A0xe22cf55c24635e6f!2sItalia!5e0!3m2!1sit!2sit!4v1713269698573!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <body>
    
    <gmp-map center="-33.9,151.2" zoom="10" map-id="DEMO_MAP_ID"  >
      <gmp-advanced-marker position="41.363557, 15.312583" title="centro1">
        <img class="flag-icon"
             src="https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"/>
      </gmp-advanced-marker>
      </body>
    </div>
  </div>
</div>


<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Informazioni di contatto:</h1>
    <p><a href="mailto:info@example.com">wildlife.segnalazioni@yahoo.it</a></p>
    <p><a href="tel:+1234567890">+39 327 208 9961</a></p>
    <p>Indirizzo: Via Baldo degli Ubaldi, 00167 Roma, Roma</p>
</div>

<!-- Piè di Pagina -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
     <p>Grazie per aver visitato il nostro sito!</a></p>
 </div>
</footer>
</body>
</html>

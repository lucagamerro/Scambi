<?php
$pw = $_GET['pw'];
if (isset($attivato1) != 'no'):  //sostituisci con richiesta al db
  $attivato1 = 'si';      //chiedi se è attivato
else:                     //modifica anche view.php
  $attivato1 = 'no';
endif;

// Connessione al database
$mysqli = new mysqli('localhost', 'id14056239_gasquemais', 'Gamerro*2005', 'id14056239_annunci');
if ($mysqli->connect_error) {
  die('Errore di connessione (' . $mysqli->connect_errno . ') '
    . $mysqli->connect_error);
}
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" ><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" ><!--<![endif]-->
<html>
<body>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scambi</title>
  <!-- Fogli di stile -->
  <link href="css/bootstrap.css" rel="stylesheet" media="screen">
  <link href="css/stili-custom.css" rel="stylesheet" media="screen">
  <!-- Modernizr -->
  <script src="js/modernizr.custom.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- respond.js per IE8 --> 
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->
 </head>
 <body>
<div id="app">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/index.html"><b>Scambi</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/index.html">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="home.php">Annunci <span class="sr-only">(current)</span></a>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about.html">About </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="/search.php">
      <input class="form-control mr-sm-2" type="text" placeholder="Cerca nel sito" name="testo">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Cerca</button>
    </form>
  </div>
</nav>
<br>
<?php if ($pw == 'root'): ?>
<h3>
  Annunci
  <small class="text-muted">ecco le ricerche.</small>
</h3>
<br>
<div id="#centrato"><button type="button" class="btn btn-primary btn-lg"><a href="/new.php" style="color:white;">Nuovo annuncio</a></button></div>
<br>
<ul class="nav nav-tabs">
      <li class="nav-item">
        <div v-if="page == 'Offro'">
          <a class="nav-link active" data-toggle="tab" @click="cambia('Offro')">Offro</a>        
        </div>
        <div v-if="page == 'Cerco'">
          <a class="nav-link" data-toggle="tab" @click="cambia('Offro')">Offro</a>        
        </div>
      </li>
      <li class="nav-item">
      <div v-if="page == 'Offro'">
          <a class="nav-link" data-toggle="tab" @click="cambia('Cerco')">Cerco</a>        
        </div>
        <div v-if="page == 'Cerco'">
          <a class="nav-link active" data-toggle="tab" @click="cambia('Cerco')">Cerco</a>        
      </div>
</ul>
<div v-if="page == 'Offro'">
<table class="table table-hover">
  <thead>
    <tr class="table-primary">
      <th scope="col"><b>TITOLO</b></th>
      <th scope="col"><b>OFFERTE</b></th>
      <th scope="col"><b>NOME</b></th>
      <th scope="col"><b>EMAIL</b></th>
      <th scope="col"><b>DATA</b></th>
      <th scope="col"><b>VISUALIZZA</b></th>
    </tr>
  </thead>
  <tbody>
<?php 
$query = $mysqli->query("SELECT titolo, offrocerco, nome, email, data, titolo FROM annunci WHERE offrocerco='0' ORDER BY titolo");

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
      if ($row['offrocerco'] == 0):
        $categoria = 'Offro';
      else:
        $categoria = 'Cerco';
      endif;
      echo '<tr><th scope="row">' . $row['titolo'] . '</th><td>' . $categoria . '</td><td>' . $row['nome'] . '</td><td>' . $row['email'] . '</td><td>' . $row['data'] . '</td> <td><a class="btn btn-primary btn-lg" href="/view.php?titolo=' . $row['titolo'] . '">vedi</a><td></tr> <br>';
    }
} else {
  echo '<br><h3>Tutto tace...   <small class="text-muted">   Crea un nuovo annuncio</small></h3><br>';
}
?>    
  </tbody>
</table> 
</div>
<div v-if="page == 'Cerco'">
  <table class="table table-hover">
    <thead>
      <tr class="table-primary">
        <th scope="col"><b>TITOLO</b></th>
        <th scope="col"><b>RICERCHE</b></th>
        <th scope="col"><b>NOME</b></th>
        <th scope="col"><b>EMAIL</b></th>
        <th scope="col"><b>DATA</b></th>
        <th scope="col"><b>VISUALIZZA</b></th>
      </tr>
    </thead>
    <tbody>
<?php 
$query = $mysqli->query("SELECT titolo, offrocerco, nome, email, data, titolo FROM annunci WHERE offrocerco='1' ORDER BY titolo");

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
      if ($row['offrocerco'] == 0):
        $categoria = 'Offro';
      else:
        $categoria = 'Cerco';
      endif;
      echo '<tr><th scope="row">' . $row['titolo'] . '</th><td>' . $categoria . '</td><td>' . $row['nome'] . '</td><td>' . $row['email'] . '</td><td>' . $row['data'] . '</td> <td><a class="btn btn-primary btn-lg" href="/view.php?titolo=' . $row['titolo'] . '">vedi</a><td></tr> <br>';
    }
} else {
  echo '<br><h3>Tutto tace...   <small class="text-muted">   Crea un nuovo annuncio</small></h3><br>';
}
?>  
  </tbody>
</table> 
</div>
<?php else: ?> 
  <div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Attenzione!</h4>
  <p class="mb-0">La password inserita è errata. <a href="/index.html" class="alert-link">Riprova</a>.</p>
</div>

<?php endif; ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<small class="form-text text-muted">
      Creato da <a>Luca Gamerro.</a> <a href="#top">   Torna su</a>
  </small>
</div>
 <script src="http://code.jquery.com/jquery.js"></script>
 <script src="js/script.js"></script>
 <script src="/bootstrap.min.js">import 'bootswatch/dist/slate/bootstrap.min.css';</script>
 </body>
</html>

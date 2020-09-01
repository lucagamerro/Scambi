<?php 
ob_start();
header('refresh:0.5;url=home.php?pw=rivoli');
ob_end_flush(); 
$titolo = $_GET['titolo']; 
$testo = $_GET['testo'];

// Connessione al database
$mysqli = new mysqli('localhost', 'id14056239_gasquemais', 'Gamerro*2005', 'id14056239_annunci');
if ($mysqli->connect_error) {
  die('Errore di connessione (' . $mysqli->connect_errno . ') '
    . $mysqli->connect_error);
}

// Eliminazione annuncio
$query = "DELETE FROM annunci WHERE titolo='$titolo' AND testo='$testo'";
if (!$mysqli->query($query)) {
  die($mysqli->error);
}

// Eliminazione commenti
$query = "DELETE FROM commenti WHERE annuncio='$titolo' AND testo='$testo'";
if (!$mysqli->query($query)) {
  die($mysqli->error);
}

// Eliminazione foto
$foto = '/storage/ssd1/239/14056239/public_html/foto/' . $titolo . '.jpg';
if (file_exists($foto)):
    unlink($foto);
endif;

// Eliminazione lista
 $url = "https://gasquemais.000webhostapp.com/view.php?titolo=" . $titolo;
 $data = file("/storage/ssd1/239/14056239/lista.txt");
 $out = array();
 foreach($data as $line) {
     if(trim($line) != $url) {
         $out[] = $line;
     }
 }
 $fp = fopen("/storage/ssd1/239/14056239/lista.txt", "w+");
 flock($fp, LOCK_EX);
 foreach($out as $line) {
     fwrite($fp, $line);
 }
 flock($fp, LOCK_UN);
 fclose($fp);  
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" ><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" ><!--<![endif]-->
<html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scambi - annuncio eliminato</title>
  <!-- Fogli di stile -->
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <!-- Modernizr -->
  <script src="js/modernizr.custom.js"></script>
  <!-- respond.js per IE8 --> 
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->
 </head>
 <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/index.html"><b>Scambi</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link active" href="home.php?pw=rivoli">Annunci <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/new.php">Nuovo </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about.html">About </a>
      </li>
    </ul>
    <form action="search.php" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Cerca" name="ricerca" autocomplete="off">
    </form>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-primary my-2 my-sm-0" type="submit"  href="/index.html">Logout</a>
    </form>
  </div>
</nav>
<br>
  <div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">Eliminazione annuncio</h4>
  <p class="mb-0">L'annuncio sta venendo eliminato dalla lista. Se non succede nulla vai alla <a href="/home.php?pw=rivoli" class="alert-link">lista</a>.</p>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
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
 <script src="http://code.jquery.com/jquery.js"></script>
 <script src="/bootstrap.min.js">import 'bootswatch/dist/slate/bootstrap.min.css';</script>
 </body>
</html>
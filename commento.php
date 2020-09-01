<?php
$titolo = $_GET['annuncio']; 
$nome = $_GET['nome'];
$testo = $_GET['testo'];
$email = $_GET['email'];
$data = date("d/m/y");
$link = 'https://gasquemais.000webhostapp.com/view.php?titolo=' . $titolo;

// Reindirizzamento 
 ob_start();
 $hhh = 'refresh:1;url=' . $link . '#comm';
 header($hhh);
 ob_end_flush();

// Connessione al database
$mysqli = new mysqli('localhost', 'id14056239_gasquemais', 'Gamerro*2005', 'id14056239_annunci');
if ($mysqli->connect_error) {
  die('Errore di connessione (' . $mysqli->connect_errno . ') '
    . $mysqli->connect_error);
}

// Inserimento dati
$query = "INSERT INTO `commenti` (`annuncio`, `nome`, `testo`, `data`, `id`) VALUES ('$titolo', '$nome', '$testo', '$data', '0')";
if (!$mysqli->query($query)) {
  die($mysqli->error);
}

// Email:
if ($email != 'nascosta'):
    $from = 'user14056239@us-imm-node4a.000webhost.io';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    $to = $email;
    $subject = 'Nuovo commento - ' . $titolo;
    $link = 'https://gasquemais.000webhostapp.com/view.php?titolo=' . $titolo . '#comm';
    $message = '<html><body><p>E stato appena pubblicato un nuovo commento su un tuo annuncio di Scambi. Eccone un anteprima:</p><h1>' . $titolo . '</h1><h4>@' . $nome . '</h4><br><p>' . $testo . '</p><br><a href="' . $link . '"> VEDI TUTTO </a><br><br><br><small>Email generata automaticamente - sito <a href="gasquemais.000webhostapp.com">Scambi</a></small></body></html>';
    mail($to, $subject, $message, $headers);
endif;
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" ><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" ><!--<![endif]-->
<html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scambi - commento aggiunto</title>
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
  <h4 class="alert-heading">Inserimento commneto...</h4>
  <p class="mb-0">Il cammento sta venendo inserito, attendi. Se non succede nulla <a href="<?php echo $link; ?>" class="alert-link">Torna indietro.</a>
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
<?php
$titolo = 'about';

// Connessione al database
$mysqli = new mysqli('localhost', 'id14056239_gasquemais', 'Gamerro*2005', 'id14056239_annunci');
if ($mysqli->connect_error) {
  die('Errore di connessione (' . $mysqli->connect_errno . ') '
    . $mysqli->connect_error);
}

$query = $mysqli->query("SELECT * FROM annunci WHERE titolo='$titolo'");
while($row = $query->fetch_assoc()) {
  $titolo = $row["titolo"];
  $nome = $row["nome"];
  $email = $row["email"];
  $telefono = $row["telefono"];
  $testo = $row["testo"];
  $attivo = $row["attivo"];
}
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" ><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" ><!--<![endif]-->
<html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scambi - about</title>
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
        <a class="nav-link" href="/index.html">Annunci </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/index.html">Nuovo </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="/about.html">About <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-primary my-2 my-sm-0" type="submit"  href="/index.html">Logout</a>
    </form>
  </div>
</nav>
<br><br>
<div class="jumbotron">
<h2>About</h2>
<br>
<p>Queto sito è creato da Luca Gamerro. Il codice è rilasciato sotto la licenza MIT.  Essendo open source, trovi il codice aggiornato su <a href="https://github.com/lucagamerro/Scambi" target="_blak">Github</a>. <br>
    Puoi inoltre guardare il <a href="#video">video</a> di presentazione del sito e lasciare un <a href="#comm">commento</a>. Per informazioni, consigli o altro non esitare a contattarmi via mail a 
    <a href="mailto:sitoscambi@gmail.com">sitoscambi@gmail.com</a>. <br>
    Ciao!</p><br>
<p class="lead">Luca Gamerro</p>
</div>
<br><br><br><br><br><br><br><br id="video">
<h3>Video di presentazione: </h3>
<p class="videoH">
<iframe class="video" src="https://www.youtube.com/embed/G9nJq0Jly7M?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</p>
<br><br><br><br><br><br><br><br id="comm">
<div class="section">
<h2>Commenti</h2>
<?php 
$query = $mysqli->query("SELECT annuncio, nome, testo, data FROM commenti WHERE annuncio='$titolo' ORDER BY data");

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
      echo '<div class="commento"><hr><h6><a href="#bottom">@' . $row['nome'] . '</a></h6><p>' . $row['testo'] . '</p><small>' . $row['data'] . '</small></div>';
    }
} else {
  echo '<br><h3>Ancora nessun commento...   <small class="text-muted">   Scrivine uno!</small></h3><br>';
}
?>
<form action="commento.php?" class="box">
  <fieldset>
    <legend>Nuovo commento:</legend>
    <div class="form-group">
      <input type="text" name="annuncio" hidden="" value="<?php echo $titolo; ?>"></p>
      <input type="text" name="email" hidden="" value="<?php echo $email; ?>"></p>
      <label for="exampleInputEmail1">Nome</label>
      <input type="text" class="form-control" placeholder="Inserisci il tuo nome" name="nome">
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Testo commento</label>
      <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Inserisci il testo del commento" name="testo"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Invia</button>
  </fieldset>
</form>
</div>

<small class="form-text text-muted">
    Creato da <a>Luca Gamerro.</a> <a href="#top">   Torna su</a>
</small>
<style>
html {
  scroll-behavior: smooth;
}
.videoH {
    text-align: center;
}
.section {
    margin-left: 15px;
}
.commento {
    margin-left: 12.5px;
    margin-top: 30px;
}
.section hr {
    background: #22222;
    margin-right: 40px;
}
.section p {
    margin-left: 10px;
    margin-right: 40px;
}
.section small {
    margin-left: 10px;
}
.imma {
    margin-left: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(0, 0, 0, 0.7);
    border-radius: 30px;
    width: 400px;
    height: 341px;
}
.box {
    width: 1312px;
    padding: 25px;
    border: 1px solid #f1f1f1;
    border-radius: 20px;
    margin-top: 25px;
    margin-bottom: 50px;
}
.video {
    width: 800px;
    height: 550px;
}
@media only screen and  (max-width: 760px) {
.box {
    width: 325px;
    padding: 25px;
    border: 4px solid #2222;
    border-radius: 36px;
    margin-top: 25px;
    margin-bottom: 15px;
}
.imma {
    margin-left: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(0, 0, 0, 0.7);
    border-radius: 30px;
    width: 293px;
    height: 250px;
}
.video {
    width: 355px;
    height: 244px;
}
}
</style>
</body>
</html>
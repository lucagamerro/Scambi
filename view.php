<?php 
$titolo = $_GET['titolo'];
$foto = '<img src="https://gasquemais.000webhostapp.com/var/www/foto/">' . $titolo;

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

$email = 'mailto:' . $email;
$telefono = 'https://api.whatsapp.com/send?phone=' . $telefono;
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" ><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" ><!--<![endif]-->
<html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scambi - <?php echo $titolo; ?></title>
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
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-primary my-2 my-sm-0" type="submit"  href="/index.html">Logout</a>
    </form>
  </div>
</nav>
<br>
<br>
<div class="jumbotron">
  <h1 class="display-3"> <?php echo $titolo;?></h1> 
  <p class="lead"> <?php echo $nome;?> </p>
  <hr class="my-4">
  <p><?php echo $testo;?></p>
<?php if(file_exists('/storage/ssd1/239/14056239/public_html/foto/' . $titolo . '.jpg')): ?>
  <img src="https://gasquemais.000webhostapp.com/foto/<?php echo $titolo; ?>.jpg" class="imma"> <br> <br>
<?php endif; ?>
  <p class="lead">
    <a class="btn btn-secondary btn-lg mar" href=<?php echo $telefono; ?> target="_blank" role="button">Mandami un whatsapp</a>
    <?php if ($email == 'mailto:nascosta'):?>
      <a class="btn btn-info disabled mar" role="button">Contatami via mail</a>
    <?php else:?>
      <a class="btn btn-info btn-lg mar" href=<?php echo $email;?> role="button">Contattami via mail</a>
    <?php endif; ?>
    <a class="btn btn-primary btn-lg mar" href="#comm" role="button">Commenti</a>
    <a class="btn btn-primary btn-lg btn-danger mar" href="/completato.php?titolo=<?php echo $titolo;?>" > Elimina (irreversibile)</a>
  </p>
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
<p id="comm"></p>
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
.mar {
    margin-top: 10px;
}
}
</style>
</body>
</html>
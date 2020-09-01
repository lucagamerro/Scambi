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

// Visite
$file = $_SERVER['DOCUMENT_ROOT'] . 'contatore.txt';
$visite = file($file);
$visite[0]++;
$fp = fopen($file , "w");
fputs($fp , "$visite[0]");
fclose($fp);
function view_tot_entries() {
  // recupero il numero di accessi
  $file = $_SERVER['DOCUMENT_ROOT'] . 'contatore.txt';
  $fp = fopen($file, "r");
  $tot = fgets($fp, 4096);
  fclose($fp);
  return $tot;
}

// Random
$lines = file("/storage/ssd1/239/14056239/lista.txt");
$rows = count($lines);
$max = rand(0, $rows);
$max =  round($max);
$url = $lines[$max];
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
  <title>Scambi - homepage</title>
  <!-- Fogli di stile -->
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <!-- Modernizr -->
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
  <script src="js/modernizr.custom.js"></script>
  <script>
var url = "<?php echo trim($url); ?>";

function ran() {
    console.log("Ciao");
    document.getElementById("random").style.animation = "gira 1s";
    setTimeout(function(){
        document.getElementById("random").style.transform = "rotate(0deg)";
        location.href = url;
    }, 1000);
} 
</script>
 </head>
 <body>
<div id="app">
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
      <input class="form-control mr-sm-2" type="text" placeholder="Cerca" name="ricerca" autocomplete="off" title="premi invio">
    </form>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn btn-primary my-2 my-sm-0" type="submit"  href="/index.html">Logout</a>
    </form>
  </div>
</nav>
<br>
<?php if ($pw == 'rivoli'): ?>
<div class="centrato">
<h3>
  Annunci
  <small class="text-muted">ecco le ricerche.</small>
</h3>
<br>
<a href="/new.php" type="button" class="btn btn-primary btn-lg btn-secondary" style="color:white;">Nuovo annuncio</a>
<br>
</div>
<ul class="nav nav-tabs">
      <li class="nav-item">
        <div v-if="page == 'Offro'">
          <a class="nav-link" data-toggle="tab" @click="cambia('Offro')">Offro</a>        
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
<br>
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
$query = $mysqli->query("SELECT titolo, offrocerco, nome, email, data, titolo FROM annunci WHERE offrocerco='0' ORDER BY cast(data as datetime) asc");

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
      if ($row['offrocerco'] == 0):
        $categoria = 'Offro';
      else:
        $categoria = 'Cerco';
      endif;
      echo '<tr><th scope="row">' . $row['titolo'] . '</th><td>' . $categoria . '</td><td>' . $row['nome'] . '</td><td>' . $row['email'] . '</td><td>' . $row['data'] . '</td> <td><a class="btn btn-info" href="/view.php?titolo=' . $row['titolo'] . '">vedi</a><td></tr>';
    }
} else {
  echo '<br><h3>Tutto tace...   <small class="text-muted">   Crea un nuovo annuncio</small></h3><br>';
}
?>    
  </tbody>
</table> 
</div>
<div v-if="page == 'Cerco'">
    <br>
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
$query = $mysqli->query("SELECT titolo, offrocerco, nome, email, data, titolo FROM annunci WHERE offrocerco='1' ORDER BY cast(data as datetime) asc");

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
      if ($row['offrocerco'] == 0):
        $categoria = 'Offro';
      else:
        $categoria = 'Cerco';
      endif;
      echo '<tr><th scope="row">' . $row['titolo'] . '</th><td>' . $categoria . '</td><td>' . $row['nome'] . '</td><td>' . $row['email'] . '</td><td>' . $row['data'] . '</td> <td><a class="btn btn-info" href="/view.php?titolo=' . $row['titolo'] . '">vedi</a><td></tr>';
    }
} else {
  echo '<br><h3>Tutto tace...   <small class="text-muted">   Crea un nuovo annuncio</small></h3><br>';
}
?>  
  </tbody>
</table> 
<br><br><br>
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
<br>
<small class="form-text text-muted">
    <button id="random" onclick="ran()">
        <img src="https://visualpharm.com/assets/409/Rubik's%20Cube-595b40b85ba036ed117da9af.svg" title="Prova a cliccare!" height="50">
    </button>
      Creato da <a>Luca Gamerro. Visitato <?php echo view_tot_entries(); ?> volte.</a> <a href="#top">   Torna su</a>
</small>
</div>
<style>
.centrato {
    margin: 10px;
}

th {
    font-weight: 500;
}

a {
    cursor: pointer;
}
@media only screen and  (max-width: 760px) {

    td, tr { display: block; }
    
    /* Hide table headers (but not display: none;, for accessibility) */
    
    thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }
    
    tr { border: 1px solid #78c2ad; }
    
    tr + tr { margin-top: 1.5em; }
    
    td {
      /* make like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
      background-color: #F8D9D5;
      text-align: left;
    }
    
    td:before {
      content: attr(data-label);
      display: inline-block;
      line-height: 1.5;
      margin-left: -100%;
      width: 100%;
      white-space: nowrap;
    }
}

#random {
    border: none;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    transform: rotate(180deg);
}
#random:focus { outline: none; }

@keyframes gira {
    0% { transform: rotate(180deg); }
    100% { transform: rotate(0deg); }
}
  
</style>
 <script src="js/script.js"></script>
 </body>
</html>
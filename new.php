<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" ><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" ><!--<![endif]-->
<html>
 <head></head>      
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scambi - nuovo annuncio</title>
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
        <a class="nav-link" href="home.php?pw=rivoli">Annunci </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="/new.php">Nuovo <span class="sr-only">(current)</span></a>
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
<h3>
    Crea un nuovo annuncio
    <small class="text-muted">richiedi qualcosa</small> <br>
  </h3>
  <p class="lead">Completa il segnunte form per aggiungere un annuncio. <br> Sii conciso e completa i campi che sono contrassegnati da un asterisco. </p> 
  <br>
  <br>
  <div class="jumbotron">
  <form action="inviato.php" method="POST" enctype="multipart/form-data">
      <h3>Form</h3>
      <br>
    <fieldset>
      <div class="form-group">
        <label for="exampleInputEmail1">Indirizzo email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Inserisci la tua email" name="email">
        <small id="emailHelp" class="form-text text-muted">La tua email è al sicuro.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Numero di telefono *</label>
        <input type="text" class="form-control" placeholder="Inserisci il tuo numero SENZA includere il +39" name="telefono">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nome e cognome *</label>
        <input type="text" class="form-control" placeholder="Inserisci il tuo nome" name="nome">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Titolo annuncio *</label>
        <input type="text" class="form-control" placeholder="Inserisci il titolo" name="titolo">
      </div>
      <div class="form-group">
        <label for="exampleTextarea">Testo dell'annuncio *</label>
        <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Scrivi un piccolo testo descrittivo di quello che stai cercando" name="testo"></textarea>
      </div>
            <fieldset class="form-group">
          <div class="form-group">
      <label for="exampleInputFile">Carica foto</label>
      <input type="file" class="fileToUpload" id="fileToUpload" aria-describedby="fileHelp" name="fileToUpload">
      <small id="fileHelp" class="form-text text-muted">Per favore carica una foto di meno di 2mb</small>
    </div>
      <div class="form-group">
        <label for="exampleSelect2">Offri o chiedi qualcosa? *</label>
        <select multiple="" class="form-control" id="exampleSelect2" name="categoria" row="2">
            <option>&bull;  Richiedo qualcosa</option>
            <option>&bull;  Offro qualcosa</option>
        </select>
      </fieldset>
        <div class="form-check disabled">
          <label class="form-check-label"> 
            <input class="form-check-input" type="checkbox" value="si" name="visibile" checked="" aria-describedby="caio">
            Rendi visibile l'indirizzo email
          </label>
        </div><br><br>
      </fieldset>
      <button type="submit" class="btn btn-secondary" value="Invia">Invia</button>
    </fieldset>
  </form>
  </div>
  <br>
  <br>
<small class="form-text text-muted">
    Creato da <a>Luca Gamerro.</a> <a href="#top">   Torna su</a>
</small>
 <script src="http://code.jquery.com/jquery.js"></script>
 <script src="/bootstrap.min.js">import 'bootswatch/dist/slate/bootstrap.min.css';</script>
 </body>
</html>
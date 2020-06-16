<!DOCTYPE html>
<html>
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
  <!-- respond.js per IE8 -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->
<style>
html {
  background: radial-gradient(#000, #111);
  color: white;
  overflow: hidden;
  height: 100%;
  user-select: none;
}

.static {
  width: 100%;
  height: 100%;
  position: relative;
  margin: 0;
  padding: 0;
  top: -100px;
  opacity: 0.05;
  z-index: 230;
  user-select: none;
  user-drag: none;
}

.error {
  text-align: center;
  font-family: 'Gilda Display', serif;
  font-size: 95px;
  font-style: italic;
  text-align: center;
  width: 100px;
  height: 60px;
  line-height: 60px;
  margin: auto;
  position: absolute;
  top: 0;
  bottom: 0;
  left: -60px;
  right: 0;
  animation: noise 2s linear infinite;
  overflow: default;
}

.error:after {
  content: '404';
  font-family: 'Gilda Display', serif;
  font-size: 100px;
  font-style: italic;
  text-align: center;
  width: 150px;
  height: 60px;
  line-height: 60px;
  margin: auto;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  opacity: 0;
  color: blue;
  animation: noise-1 .2s linear infinite;
}

.info {
  text-align: center;
  font-family: 'Gilda Display', serif;
  font-size: 15px;
  font-style: italic;
  text-align: center;
  width: 200px;
  height: 60px;
  line-height: 60px;
  margin: auto;
  position: absolute;
  top: 140px;
  bottom: 0;
  left: 0;
  right: 0;
  animation: noise-3 1s linear infinite;
}

.error:before {
  content: '404';
  font-family: 'Gilda Display', serif;
  font-size: 100px;
  font-style: italic;
  text-align: center;
  width: 100px;
  height: 60px;
  line-height: 60px;
  margin: auto;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  opacity: 0;
  color: red;
  animation: noise-2 .2s linear infinite;
}

@keyframes noise-1 {
  0%, 20%, 40%, 60%, 70%, 90% {opacity: 0;}
  10% {opacity: .1;}
  50% {opacity: .5; left: -6px;}
  80% {opacity: .3;}
  100% {opacity: .6; left: 2px;}
}

@keyframes noise-2 {
  0%, 20%, 40%, 60%, 70%, 90% {opacity: 0;}
  10% {opacity: .1;}
  50% {opacity: .5; left: 6px;}
  80% {opacity: .3;}
  100% {opacity: .6; left: -2px;}
}

@keyframes noise {
  0%, 3%, 5%, 42%, 44%, 100% {opacity: 1; transform: scaleY(1);}  
  4.3% {opacity: 1; transform: scaleY(1.7);}
  43% {opacity: 1; transform: scaleX(1.5);}
}

@keyframes noise-3 {
  0%,3%,5%,42%,44%,100% {opacity: 1; transform: scaleY(1);}
  4.3% {opacity: 1; transform: scaleY(4);}
  43% {opacity: 1; transform: scaleX(10) rotate(60deg);}
}
</style>
 </head>
 <body>
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/index.html"><b>Scambi</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/index.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="home.php?pw="root">Annunci</a> <span class="sr-only">(current)</span></a>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about.html">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="/search.php">
      <input class="form-control mr-sm-2" type="text" placeholder="Cerca nel sito" name="testo">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Cerca</button>
    </form>
  </div>
</nav>
<div class="error">404</div>
<br /><br />
<span class="info">Pagina in via di sviluppo. Vai alla <a herf="home.php?pw=root">home</a>.</span>
<img src="http://images2.layoutsparks.com/1/160030/too-much-tv-static.gif" class="static" />
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
</body>
</html>
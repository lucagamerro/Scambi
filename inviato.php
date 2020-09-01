<?php
$nome = $_POST["nome"]; 
$titolo = $_POST["titolo"]; 
$testo = $_POST["testo"]; 
$testo_FIN = str_replace("'", "", $testo);
$telefono = $_POST["telefono"]; 
$categoria = $_POST["categoria"]; 
$visibile = isset($_POST["visibile"]);
$data = date("d/m/y");
//email visibile
if ($visibile == 'si'):
  $email = $_POST['email'];
else:
  $email = 'nascosta';
endif;
if ($categoria == '• Richiedo qualcosa'):
  $categoria = 1;
else:
  $categoria = 0;
endif;
$telefono = '39' . $telefono;

// Foto:
$target_dir = "/storage/ssd1/239/14056239/public_html/foto/";
$target_file = $target_dir . $titolo . '.jpg';
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) :
  echo  '';
else:
    if(isset($_FILES["fileToUpload"])):
        echo" ";
    else:
        echo "v igotgoCsr>iINFO_EXTE.sR]t/otgsFi     echoist($_FILE/i.osg vsg i   echois
<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db



  $url = "https://lit-plateau-15934.herokuapp.com/messages";
  $json = file.get_contents($url);
  $datos = json_decode($json, True);
  echo $datos ;



  ?>



 

<?php include('../templates/footer.html'); ?>

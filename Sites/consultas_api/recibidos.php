<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db



  $url = "https://lit-plateau-15934.herokuapp.com/messages";
  $json = file_get_contents($url);
  $datos = json_decode($json, True);
  echo $datos ;
  foreach($datos as $p){ echo $p};



  ?>



 

<?php include('../templates/footer.html'); ?>

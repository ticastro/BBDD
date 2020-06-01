<?php session_start(); ?>



<?php include('../templates/header.html');   ?>


<body>
<?php
echo 'El Artista ha sido agregado a tus favoritos ' ;

$nombre_artista = $_GET["nombre_artista"];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  require("../config/conexion.php");


//$nombre_lugar = "Museos Vaticanos";

  #Se construye la consulta como un string
$query1 = "SELECT MAX(fid) from favoritos ;" ;
  $result = $db -> prepare($query1);
  $result -> execute();
  $data1 = $result -> fetchAll();
$fid = $data1[0][0] + 1;
$uid = $_SESSION["uid"];


$query2 = "INSERT INTO favoritos VALUES ('$fid', '$uid', '$nombre_artista');" ;
  $result = $db -> prepare($query2);
  $result -> execute();

echo "<a href='../consultas_arte/consulta_artistas.php'>Volver</a>"
  ?>


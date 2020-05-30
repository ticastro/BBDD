<?php session_start(); ?>



<?php include('../templates/header.html');   ?>

<body>
<?php
echo 'Compra procesada con exito' ;

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

$nombre_lugar = $_GET["nombre_lugar"];
$hora_compra = getdate();
echo $hora_compra[0];
echo $hora_compra[0][0]."asfd";
$uid = $_SESSION["uid"];
echo "uid".$uid;
echo "nombre_lugar".$nombre_lugar;


$query = "SELECT id_lugar from lugar WHERE nombre = '$nombre_lugar'; ";
  $result = $db2 -> prepare($query);
  $result -> execute();
  $para_id = $result -> fetchAll();
$id_lugar = $para_id[0][0];
echo "ido_lugar".$id_lugar;
  #Se construye la consulta como un string
  $query1 = "INSERT INTO entradas_museos(uid,id_lugar,fecha_compra_museo) VALUES ('$uid', '$id_lugar', CURRENT_TIMESTAMP);" ;


  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query1);
  $result -> execute();
  
  ?>


<?php include('../templates/footer.html'); ?>

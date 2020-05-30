<?php session_start(); ?>



<?php include('../templates/header.html');   ?>


<body>
<?php
echo 'Hoteles ' ;
$llegada = $_POST["llegada"];
$salida = $_POST["salida"];
$nombre_hotel = $_SESSION["nombre_hotel"];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db


if (date("Y-m-d") > $llegada || $llegada > $salida){
  echo 'Por favor ingresa fechas validas';
}else{
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");
$uid = $_SESSION["uid"];

 $query2 = "SELECT hid from hoteles where nombre = '$nombre_hotel'; ";
 
  $result = $db -> prepare($query2);
  $result -> execute();
  $lista_hid = $result -> fetchAll();

$hid = $lista_hid[0][0];
$query4 = "SELECT MAX(rid) FROM reservas ;";

  $result = $db -> prepare($query4);
  $result -> execute();
  $lista_rid = $result -> fetchAll();

$rid = $lista_rid[0][0] + 1;

echo $llegada;
echo $salida;
echo $rid;
echo $uid;
echo $hid;
 /*   
    $query5 = "INSERT INTO reservas(rid, checkin, chekout) VALUES ('$rid', '$llegada', '$salida');" ;
    $query6 = "INSERT INTO hace(uid, rid) VALUES ('$uid', '$rid');" ;
    $query7 = "INSERT INTO en_hotel(rid, hid) VALUES ('$rid', '$hid');" ;


    $result = $db-> prepare($query5);
    $result -> execute();

    $result = $db-> prepare($query6);
    $result -> execute();

    $result = $db-> prepare($query7);
    $result -> execute();
   */ 
}
?>

  
<?php include('../templates/footer.html'); ?>

<?php session_start(); ?>


<?php include('../templates/header.html');   ?>


<body>
<?php
$fecha_ingresada = $_POST["fecha_ingresada"]

if (date("Y-m-d") > $fecha_ingresada){
  echo 'Por favor ingresar fecha futura';
echo '<a href="fecha_viaje.php">Volver</a></p>';
}else{
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
$vid = $_SESSION["vid"];
unset($_SESSION["vid"]);
$fecha_ingresada = $_POST["fecha_ingresada"]

  #Se construye la consulta como un string
$query1 = "SELECT count(*) from (SELECT DISTINCT  tickets.tid, viajes.capacidad, viajes.vid from tickets,viajes,para where tickets.fechaviaje = '$fecha_ingresada' AND para.vid = '$vid' AND viajes.vid = '$vid') AS foo group by foo.vid; ";


  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db2 -> prepare($query1);
  $result -> execute();
  $data1 = $result -> fetchAll();
}
?>

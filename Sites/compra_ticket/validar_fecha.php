<?php session_start(); ?>


<?php include('../templates/header.html');   ?>


<body>
<?php
$fecha_ingresada = $_POST["fecha_ingresada"];

if (date("Y-m-d") > $fecha_ingresada){
  echo 'Por favor ingresar fecha futura';
echo '<a href="fecha_viaje.php">Volver</a></p>';
}else{
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("../config/conexion.php");
$vid = $_SESSION["vid"];
$uid = $_SESSION["uid"];
$fecha_actual = getdate();
//unset($_SESSION["vid"]);
$fecha_ingresada = $_POST["fecha_ingresada"];


  #Se construye la consulta como un string
$query1 = "SELECT count(*) from (SELECT DISTINCT  tickets.tid, viajes.capacidad, viajes.vid from tickets,viajes,para where tickets.fechaviaje = '$fecha_ingresada' AND para.vid = '$vid' AND viajes.vid = '$vid') AS foo group by foo.vid; ";

//SELECT count(*) from (SELECT DISTINCT  tickets.tid, viajes.capacidad, viajes.vid from tickets,viajes,para where tickets.fechaviaje = '400' AND para.vid = 10 AND viajes.vid = 10) AS foo group by foo.vid;

$query2 = "SELECT DISTINCT capacidad from viajes where vid = '$vid';";


  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query1);
  $result -> execute();
  $data1 = $result -> fetchAll();

  $result = $db-> prepare($query2);
  $result -> execute();
  $data2 = $result -> fetchAll();


if ($data1[0][0] = ""){
$data1[0][0] = 0;
}
if ($data1[0][0] <  $data2[0][0]){
    echo "La fecha elegida es valida, tu reserva de viaje ha sido procesada. \n";



//SELECT DISTINCT  tickets.asiento, tickets.tid, viajes.capacidad, viajes.vid from tickets,viajes,para where para.vid = 10 AND viajes.vid = 10 AND tickets.tid = para.tid;

$tid_valido = 0;
$i = 0;
do {
    $i = $i + 1;

    $query3 = "SELECT DISTINCT  tickets.asiento, tickets.tid, viajes.capacidad, viajes.vid from tickets,viajes,para where tickets.fechaviaje = '$fecha_ingresada' AND para.vid = '$vid' AND viajes.vid = '$vid' AND tickets.tid = para.tid AND tickets.asiento = $i;";
  $result = $db-> prepare($query3);
  $result -> execute();
  $data3 = $result -> fetchAll();

  $tid_valido = 0;

  if ($data3[0][0] == ""){
    $asiento = $i;
    $query4 = "SELECT MAX(tid) FROM tickets ;";

    $result = $db-> prepare($query4);
    $result -> execute();
    $data4 = $result -> fetchAll(); 

    $tid = $data4[0][0] + 1 ;
    $tid_valido = 1;
  }

    
} while ($tid_valido = 0);




    
    $query5 = "INSERT INTO tickets(tid, asiento, fechaviaje) VALUES ('$tid', '$asiento', '$fecha_ingresada');" ;
    $query6 = "INSERT INTO para(tid, vid) VALUES ('$tid', '$vid');" ;
    $query7 = "INSERT INTO compra_ticket(tid, uid, fechacompra) VALUES ('$tid', '$uid',  CURRENT_TIMESTAMP);" ;


    $result = $db-> prepare($query5);
    $result -> execute();

    $result = $db-> prepare($query6);
    $result -> execute();

    $result = $db-> prepare($query7);
    $result -> execute();
    
    



    echo '<a href="../perfil/perfil.php">Ir a Mi Perfil</a></p>';

}else{ 
echo "No existe disponibilidad para esa fecha, selecciona otra por favor. \n";}
echo '<a href="../compra_ticket/fecha_viaje.php">Volver</a></p>';

}
?>

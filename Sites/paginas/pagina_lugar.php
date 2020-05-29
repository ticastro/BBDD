<?php session_start(); ?>



<?php include('../templates/header.html');   ?>


<body>
<?php
echo 'Bienvenido a ' ;

echo $_GET["lugar"];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  require("../config/conexion.php");

$nombre_lugar = $_GET["lugar"];
$nombre_lugar = "Museos Vaticanos"

  #Se construye la consulta como un string
$query1 = "SELECT ciudad from lugar where nombre = '$nombre_lugar' ;" ;
$query2 = "SELECT agencias.pais from agencias, lugar where lugar.nombre = '$nombre_lugar' AND agencias.ciudad = lugar.ciudad;" ;
$query3 = "SELECT hr_apertura, hr_cierre, precio from museo, lugar where lugar.nombre = '$nombre_lugar' AND lugar.id_lugar = museo.id_lugar ;" ;
$query4 = "SELECT hr_apertura, hr_cierre from iglesia, lugar where lugar.nombre = '$nombre_lugar' AND lugar.id_lugar = iglesia.id_lugar ;" ;



  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db2 -> prepare($query1);
  $result -> execute();
  $data1 = $result -> fetchAll();
  $result = $db2 -> prepare($query2);
  $result -> execute();
  $data2 = $result -> fetchAll();
  $result = $db2 -> prepare($query3);
  $result -> execute();
  $data3 = $result -> fetchAll();
  $result = $db2 -> prepare($query4);
  $result -> execute();
  $data4 = $result -> fetchAll();
  ?>


<?php
echo "Esta en la ciudad".$data1[0][0];
echo ", del país ".$data2[0][0];
if ($data3 [0][0] != ""){
echo $data3[0][0];
echo $data3[0][1];
echo $data3[0][2];
}else{
echo $data4[0][0];
echo $data4[0][1];
}
 
?>


 <table>
    <tr>
      <th>Tus reservas</th>
    </tr>

    <tr>
      <th>hotel</th>
      <th>check in</th>
      <th>check out</th>
      <th>direccion</th>
    </tr>
  
      <?php
        foreach ($reservas as $p) {

          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td></tr>";

      }
      ?>
      
  </table>


  <table>
    <tr>
      <th>Tus datos de viaje</th>
    </tr>

    <tr>
      <th>nº asiento</th>
      <th>fecha compra</th>
      <th>fecha viaje</th>
      <th>hora salida</th>
      <th>origen</th>
      <th>destino</th>
    </tr>
  
  
      <?php
        foreach ($datos as $p) {

          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td><td>$p[4]</td><td>$p[5]</td></tr>";

      }
      ?>
      
  </table>



<?php include('../templates/footer.html'); ?>

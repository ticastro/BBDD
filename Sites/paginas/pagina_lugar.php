<?php session_start(); ?>



<?php include('../templates/header.html');   ?>


<body>
<?php
echo 'Bienvenido a ' ;

echo $_GET["lugar"];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  require("../config/conexion.php");

$nombre_lugar = $_GET["lugar"];
$nombre_lugar = "Museos Vaticanos";

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
echo "\n"."Esta en la ciudad".$data1[0][0];
echo ", del país ".$data2[0][0];
if ($data3 [0][0] != ""){
echo "\n"."El museo abre a las ".$data3[0][0];
echo "y cierra a las ".$data3[0][1];
echo "con un precio de ".$data3[0][2];
}else{
echo "\n"."La iglesia abre a las ".$data4[0][0];
echo "y cierra a las ".$data4[0][1];
}


$query5 = "SELECT DISTINCT obras.nombre, obras.fecha_inicio, obras.fecha_culmino FROM obras, lugar WHERE obras.id_lugar = lugar.id_lugar AND lugar.nombre = '$nombre_lugar' ;" ;
  $result = $db2 -> prepare($query5);
  $result -> execute();
  $data5 = $result -> fetchAll();


$query6 = "SELECT DISTINCT artistas.nombre FROM obras, lugar,artistas WHERE obras.id_lugar = lugar.id_lugar AND lugar.nombre = '$nombre_lugar' AND artistas.id_artista = obras.id_artista ;"; 
  $result = $db2 -> prepare($query6);
  $result -> execute();
  $data6 = $result -> fetchAll();
?>


 <table>
    <tr>
      <th>Obras en el lugar</th>
    </tr>

    <tr>
      <th>Nombre</th>
      <th>Año de inicio</th>
      <th>Año de culmino</th>
      <th>Link</th>
    </tr>
  
      <?php
        foreach ($data5 as $p) {

          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td><a href='pagina_obra.php?nombre='$p[0]'>Obra</a></td></tr>";

      }
      ?>
      
  </table>


  <table>
    <tr>
      <th>Artistas con obra en este lugar</th>
    </tr>

    <tr>
      <th>Nombre</th>
      <th>Link</th>
    </tr>
  
  
      <?php
        foreach ($data6 as $p) {
          echo "<tr><td>$p[0]</td><td><a href='pagina_artista.php?nombre='$p[0]'>Artista</a></td></tr>";
          

      }
      ?>
      
  </table>



<?php include('../templates/footer.html'); ?>

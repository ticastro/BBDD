<?php session_start(); ?>



<?php include('../templates/header.html');   ?>


<body>
<?php
echo 'Bienvenido a ' ;

$origen = $_GET["origen"];
$destino = $_GET["destino"];
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  require("../config/conexion.php");


  #Se construye la consulta como un string
$query1 = "SELECT DISTINCT ultimo.transporte, ultimo.horasalida, ultimo.precio, ultimo.capacidad, ultimo.duracion, ultimo.vid, ultimo.destino, ciudades.nombre from (SELECT foo.transporte, foo.horasalida, foo.precio, foo.capacidad, foo.duracion,foo.vid, foo.ocid ,ciudades.nombre as destino from (SELECT DISTINCT viajes.transporte, viajes.horasalida, viajes.precio, viajes.capacidad, viajes.duracion  ,viajes.vid, origen.cid as ocid, destino.cid as dcid FROM viajes, origen, destino WHERE origen.vid = viajes.vid AND destino.vid = viajes.vid) AS foo, ciudades WHERE foo.dcid = ciudades.cid) AS ultimo, ciudades where ciudades.cid = ultimo.ocid AND ultimo.destino = '$destino' AND ciudades.nombre = '$origen' ;" ;

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query1);
  $result -> execute();
  $data1 = $result -> fetchAll();

?>
 <table>
    <tr>
      <th>Opciones de viaje para ciudades seleccionadas</th>
    </tr>

    <tr>
      <th>Transporte</th>
      <th>Hora de salida</th>
      <th>Precio</th>
      <th>Duracion</th>
      <th>Link</th>
    </tr>
  
      <?php
        foreach ($data1 as $p) {

          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[4]</td><td><a href='fecha_viaje.php?vid=$p[5]'>Elegir fechas</a></td></tr>";

      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>

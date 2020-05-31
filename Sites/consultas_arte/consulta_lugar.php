<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var = $_POST["nombre_lugar"];
  $query1 = "SELECT lugar.nombre, lugar.ciudad, agencias.pais  FROM lugar, agencias WHERE lugar.nombre LIKE '%$var%' and lugar.ciudad=agencias.ciudad;";
  $result1 = $db2 -> prepare($query1);
  $result1 -> execute();
  $dataCollected1 = $result1 -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>


<br>
<br>

Informaciones sobre el lugar :
  <table>
    <tr>
      <th>Lugar</th>
      <th>Ciudad</th>
      <th>Pais</th>
    </tr>
  <?php
  foreach ($dataCollected1 as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td></tr>";
  }
  ?>
  </table>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $query2 = "SELECT lugar.nombre, obras.nombre, obras.fecha_inicio, obras.fecha_culmino  FROM lugar, obras WHERE lugar.nombre LIKE '%$var%' and lugar.id_lugar=obras.id_lugar;";
  $result2 = $db2 -> prepare($query2);
  $result2 -> execute();
  $dataCollected2 = $result2 -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

<br>
<br>
Obras en este lugar : 

  <table>
    <tr>
      <th>Lugar</th>
      <th>Obras</th>
      <th>Fecha de inicio</th>
      <th>Fecha de culmino</th>
    </tr>
  <?php
  foreach ($dataCollected2 as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> </tr>";
  }
  ?>
  </table>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $query3 = "SELECT DISTINCT artistas.nombre  FROM lugar, obras, artistas  WHERE lugar.nombre LIKE '%$var%' and lugar.id_lugar=obras.id_lugar and obras.id_artista=artistas.id_artista;";
  $result3 = $db2 -> prepare($query3);
  $result3 -> execute();
  $dataCollected3 = $result3 -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

<br>
<br>

Artistas cuyas obras se encuentran en ese lugar :

  <table>
    <tr>
      <th>Nombre de los artistas</th>
    </tr>
  <?php
  foreach ($dataCollected3 as $p) {
    echo "<tr> <td>$p[0]</td></tr>";
  }
  ?>
  </table>



<?php include('../templates/footer.html'); ?>

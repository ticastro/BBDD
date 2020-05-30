<?php session_start(); ?>



<?php include('../templates/header.html');   ?>


<body>
<?php
require("../config/conexion.php");

echo 'Hoteles ' ;
$vid = $_GET["vid"];
$_SESSION["vid"] = $vid;
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db

 $query2 = "SELECT DISTINCT nombre from hoteles; ";
 



  $result = $db -> prepare($query2);
  $result -> execute();
  $hoteles = $result -> fetchAll();


?>

   <table>
    <tr>
      <th>Hoteles disponibles</th>
    </tr>
     <tr>
      <th>Nombre</th>
      <th>Link</th>
    </tr>
  
      <?php
        foreach ($hoteles as $p) {

          echo "<tr><td>$p[0]</td><td><a href='fecha_hotel.php?nombre_hotel=$p[0]'>Reservar</a></td></tr>";

      }
      ?>
      
  </table>
<?php include('../templates/footer.html'); ?>

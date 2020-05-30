<?php session_start(); ?>



<?php include('../templates/header.html');   ?>


<body>
<?php
echo 'Estas ciudades estan en nuestros planes de viajes. Ingresa destino y origen para ver si es que hay disponibilidad  ' ;



  #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  require("../config/conexion.php");


 
 $query2 = "SELECT DISTINCT  ciudades.nombre as origen, ultimo.destino from (SELECT foo.ocid ,ciudades.nombre as destino from (SELECT DISTINCT origen.cid as ocid, destino.cid as dcid FROM viajes, origen, destino WHERE origen.vid = viajes.vid AND destino.vid = viajes.vid) AS foo, ciudades WHERE foo.dcid = ciudades.cid) AS ultimo, ciudades where ciudades.cid = ultimo.ocid; ";
 



  $result = $db -> prepare($query2);
  $result -> execute();
  $ciudades = $result -> fetchAll();
  ?>

 <table>
    <tr>
      <th>Ciudades</th>
    </tr>
     <tr>
      <th>Origen</th>
      <th>Destino</th>
      <th>Ver más</th>
    </tr>
  
      <?php
        foreach ($ciudades as $p) {

          echo "<tr><td>$p[0]</td><td>$p[1]</td><td><a href='../compra_ticket/mostrar_viaje.php?origen=$p[0]&destino=$p[1]'>Ver mas</a></td></tr>";

      }
      ?>
      
  </table>



<?php include('../templates/footer.html'); ?>

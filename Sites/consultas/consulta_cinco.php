<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
 

  #Se construye la consulta como un string
  $query = "SELECT arriba.uid,arriba.nombre,arriba.checkin,arriba.chekout, abajo.nombre FROM (SELECT hoteles.nombre, reservas.rid FROM hoteles, en_hotel, reservas WHERE hoteles.hid = en_hotel.hid AND en_hotel.rid = reservas.rid) AS abajo, (SELECT usuarios.uid, datos_usuarios.nombre, reservas.checkin, reservas.chekout, reservas.rid FROM datos_usuarios, tiene_datos, usuarios, hace, reservas WHERE datos_usuarios.duid = tiene_datos.duid AND tiene_datos.uid = usuarios.uid AND hace.uid = usuarios.uid AND hace.rid = reservas.rid AND reservas.checkin >= '2020-01-01' AND reservas.chekout <= '2020-03-31') AS arriba WHERE arriba.rid = abajo.rid ; " ;

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $usernames = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>uid</th>
      <th>nombre usuario</th>
      <th>check in</th>
      <th>check out</th>
      <th>nombre hotel</th>


    </tr>
  
      <?php
        foreach ($usernames as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td><td>$p[4]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>
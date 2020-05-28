

<?php include('../templates/header.html');   ?>



<body>
<?php
echo 'Bienvenido a tu perfil.' ;

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $uid = $_SESSION['uid'];

  #Se construye la consulta como un string
  $query = "SELECT DISTINCT foo.nombre, fee.checkin, fee.chekout, foo.direccionhotel FROM (SELECT reservas.rid, reservas.checkin, reservas.chekout FROM usuarios, hace, reservas WHERE usuarios.uid = '$uid' AND usuarios.uid = hace.uid AND hace.rid = reservas.rid) as fee, (SELECT reservas.rid, hoteles.direccionhotel, hoteles.nombre FROM hoteles, en_hotel, reservas WHERE hoteles.hid = en_hotel.hid AND en_hotel.rid = reservas.rid) as foo WHERE fee.rid = foo.rid  ;" ;


  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $reservas = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Tus reservas</th>
    </tr>
  
      <?php
        foreach ($reservas as $p) {

          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td></tr>";

      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>

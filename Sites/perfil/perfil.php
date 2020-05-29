<?php session_start(); ?>



<?php include('../templates/header.html');   ?>

<body>
<?php
echo 'Bienvenido a tu perfil.' ;

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $uid = $_SESSION['uid'];
  echo '$uid';
  echo $_SESSION['uid'];

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
<?php
#Se construye la consulta como un string
  $query1 = "SELECT DISTINCT final.asiento, final.fechaviaje, final.horasalida, final.origen, ciudades.nombre as destino FROM ciudades, (SELECT DISTINCT hola.asiento, hola.fechaviaje, hola.horasalida, hola.dcid, ciudades.nombre as origen FROM ciudades, (SELECT DISTINCT fee.asiento, fee.fechaviaje, foo.horasalida, foo.ocid, foo.dcid FROM (SELECT tickets.asiento, tickets.fechaviaje, para.vid FROM compra_ticket, tickets, para WHERE compra_ticket.tid = tickets.tid AND compra_ticket.uid = '$uid' AND para.tid = tickets.tid) as fee, (SELECT para.vid, viajes.horasalida, origen.cid as ocid, destino.cid as dcid FROM para, viajes, origen, destino WHERE para.vid = viajes.vid AND origen.vid = viajes.vid AND destino.vid = viajes.vid) as foo WHERE fee.vid = foo.vid) AS hola WHERE hola.ocid = ciudades.cid) AS final where final.dcid = ciudades.cid ;" ;


  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query1);
  $result -> execute();
  $tabla_tickets = $result -> fetchAll();
?>

  <table>
    <tr>
      <th>Tus tickets de transporte</th>
    </tr>
  
      <?php
        foreach ($tabla_tickets as $p) {

          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td></tr>";

      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>

<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $uid = $_POST["uid"];
  $uid = INTval($uid);

  #Se construye la consulta como un string
  $query = "SELECT izquierda.uid, SUM(derecha.precio) FROM (SELECT usuarios.uid, tickets.tid FROM usuarios, compra_ticket, tickets WHERE usuarios.uid = compra_ticket.uid AND compra_ticket.tid = tickets.tid) AS izquierda, (SELECT viajes.precio, tickets.tid FROM viajes, para, tickets WHERE viajes.vid = para.vid AND para.tid = tickets.tid) AS derecha WHERE izquierda.tid = derecha.tid AND izquierda.uid = $uid GROUP BY izquierda.uid; " ;

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $pokemones = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>TOTAL gastado</th>
    </tr>
  
      <?php
        foreach ($pokemones as $p) {
          echo "<tr><td>$p[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>
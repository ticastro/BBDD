<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $username = $_POST["username"];
  $username = strval($username);

  #Se construye la consulta como un string
  $query = "SELECT * FROM(SELECT paises.nombre, hoteles.hid FROM hoteles, esta_en, ciudades, pertenece_a, paises WHERE hoteles.hid = esta_en.hid AND esta_en.cid = ciudades.cid AND ciudades.cid = pertenece_a.cid AND paises.pid = pertenece_a.pid) AS abajo, (SELECT usuarios.username, en_hotel.hid FROM usuarios, hace, reservas, en_hotel, hoteles WHERE usuarios.uid = hace.uid AND reservas.rid = hace.rid AND checkin <= CURRENT_DATE AND reservas.rid = en_hotel.rid AND en_hotel.hid = hoteles.hid) AS arriba WHERE arriba.hid = abajo.hid AND LOWER(arriba.username) LIKE LOWER('%$username%'); "

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $pokemones = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>paises</th>
    </tr>
  
      <?php
        foreach ($pokemones as $p) {
          echo "<tr><td>$p[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>

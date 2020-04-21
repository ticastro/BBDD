<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $pais = $_POST["pais"];
  $pais = strval($pais);

  #Se construye la consulta como un string
  $query = "SELECT ciudades.nombre FROM ciudades, pertenece_a, paises WHERE paises.pid = pertenece_a.pid AND pertenece_a.cid = ciudades.cid AND LOWER(paises.nombre) LIKE LOWER('%$pais%');" ;

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $pokemones = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>ciudades</th>
    </tr>
  
      <?php
        foreach ($pokemones as $p) {
          echo "<tr><td>$p[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>

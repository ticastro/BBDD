<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");



  #Se construye la consulta como un string
 	$query = "SELECT Nombre FROM artistas;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db2 -> prepare($query);
	$result -> execute();
    $artistas = $result -> fetchAll();



  ?>



  <table>
    <tr>
      <th>Nombre</th>
    </tr>

      <?php
        foreach ($artistas as $a) {
          echo "<tr><td>$a[0]</td>";
          echo "<input type='checkbox' name='products[]' value='".$a['title']."'>"</tr>";
      }
      ?>

  </table>

<?php include('../templates/footer.html'); ?>

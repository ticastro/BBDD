<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

    //echo $_GET['nombre_artista'];
    $nombreArtista = $_GET['nombre_artista'];

  #Se construye la consulta como un string
 	$query = "SELECT id_artista, nombre, fecha_nacimiento, descripcion FROM artistas where nombre like '%$nombreArtista%';";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db2 -> prepare($query);
	$result -> execute();
	$artistass = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Nombre</th>
      <th>Fecha de nacimiento</th>
      <th>Descripciòn</th>
    </tr>

      <?php
        foreach ($artistass as $a) {
          echo "<tr><td>$a[1]</td><td>$a[2]</td><td>$a[3]</td><td>$p[4]</td><td>$p[5]</td></tr>";
      }
      ?>

  </table>


<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db



  #Se construye la consulta de OBRAS!!! como un string
 	$query2 = "SELECT obras.id_artista, obras.nombre, obras.id_obras FROM obras, artistas where artistas.nombre like '%$nombreArtista%' and obras.id_artista = artistas.id_artista ;";


  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db2 -> prepare($query2);
	$result -> execute();
	$obras = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Nombre obras</th>
    </tr>

      <?php
        foreach ($obras as $a) {
          echo "<tr><td>$a[1]</td><td><a href='consulta_obra2.php?id_obra=$a[2]'>Ver Obra</a></p> </td></tr>";
      }
      ?>
  </table>



<?php include('../templates/footer.html'); ?>

<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>





<?php
  $idobra = $_GET['id_obra'];

  require("../config/conexion.php");

  $query2 = "SELECT artistas.nombre FROM obras, artistas
  where id_obras = '$idobra' and obras.id_artista = artistas.id_artista;";
  $result = $db2 -> prepare($query2);
  $result -> execute();
  $nombreArtista = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Nombre Artista</th>
      <th>Link</th>
    </tr>
  <?php
  foreach ($nombreArtista as $na) {
      echo "<tr><td>$na[0]</td><td><a href='consulta_artista.php?nombre_artista=$na[0]'>Ver Artista</a></p> </td></tr>";
  }
  ?>
  </table>





<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


  $idobra = $_GET['id_obra'];

 	$query = "SELECT nombre, fecha_inicio, fecha_culmino, periodo FROM obras
 	where id_obras = '$idobra';";
	$result = $db2 -> prepare($query);
	$result -> execute();
	$obras = $result -> fetchAll();
  ?>






	<table>
    <tr>
      <th>Nombre Obra</th>
      <th>Fecha Inicio</th>
      <th>Fecha Culmino</th>
      <th>Periodo</th>
    </tr>
  <?php
	foreach ($obras as $obra) {
  		//echo "<tr><td>$obra[0]</td><td>$obra[1]</td><td>$obra[2]</td><td>$obra[3]</td><td><a href='consulta_artista.php?nombre_artista=$a[0]'>Ver Artista</a></p> </td></tr>";
    echo "<tr><td>$obra[0]</td><td>$obra[1]</td><td>$obra[2]</td><td>$obra[3]</td></tr>";
	}
  ?>
	</table>






<?php

  $idobra = $_GET['id_obra'];

 	$query = "SELECT  lugar.nombre, lugar.ciudad, agencias.pais FROM obras , agencias , artistas , lugar
 	where obras.id_obras = '$idobra' and obras.id_artista = artistas.id_artista and obras.id_lugar = lugar.id_lugar and lugar.ciudad = agencias.ciudad;";
	$result = $db2 -> prepare($query);
	$result -> execute();
	$lugares = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombre Obra</th>
      <th>Ciudad</th>
      <th>Pais</th>
      <th>Lugar</th>

    </tr>
  <?php
	foreach ($lugares as $lugar) {
  		echo "<tr><td>$lugar[0]</td><td>$lugar[1]</td><td>$lugar[2]</td><td><a href='../paginas/pagina_lugar.php?lugar=$lugar[0]'>Ver Lugar</a></p> </td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>

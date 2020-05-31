<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre = $_POST["obra_eligida"];

 	$query = "SELECT obras.nombre, artistas.nombre, lugar.nombre, lugar.ciudad, agencias.pais FROM obras , agencias , artistas , lugar
 	where obras.nombre LIKE '%$nombre%' and obras.id_artista = artistas.id_artista and obras.id_lugar = lugar.id_lugar and lugar.ciudad = agencias.ciudad;";
	$result = $db2 -> prepare($query);
	$result -> execute();
	$obras = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Obra</th>
      <th>Artista</th>
      <th>Lugar</th>
      <th>Ciudad</th>
      <th>Pais</th>
    </tr>
  <?php
	foreach ($obras as $obra) {
  		echo "<tr><td>$obra[0]</td><td>$obra[1]</td><td>$obra[2]</td><td>$obra[3]</td><td>$obra[4]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>

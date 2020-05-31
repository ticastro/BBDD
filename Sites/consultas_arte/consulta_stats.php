<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre = $_POST["obra_eligida"];

 	$query = "SELECT obras.nombre, artistas.nombre, lugares.nombre, lugares.ciudad, agencias.pais FROM obras o, agencias ag, artistas  ar, lugar l where o.nombre LIKE '%$nombre%' and o.id_artista = ar.id_artista and o.id_lugar = l.id_lugar and l.ciudad = ag.ciudad;";
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

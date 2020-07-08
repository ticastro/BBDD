<?php session_start(); ?>
<html>
 <head>
  <title>Ayudantia Leaflet</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
	integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
	crossorigin=""/>
 </head>
 <body>



<?php

$fecha_inicial = $_POST["fecha_inicial"];
$fecha_final = $_POST["fecha_final"];
$uid = $_SESSION["uid"];

$url = "https://lit-plateau-15934.herokuapp.com/messages";
$json = file_get_contents($url);
$datos = json_decode($json, True);

$lista = array();
$contador = 0;

foreach ($datos as $d ) {

    if ($d["sender"] == $uid && $fecha_inicial >= $d["date"] && $fecha_final <= $d["date"]){
        $coordenadas = array();
        $str_contador = strval($contador);
        $coordenadas["lat"] = $d["lat"];
        $coordenadas["long"] = $d["long"];
        $coordenadas["date"] = $d["date"];
        $lista[$str_contador] = $coordenadas;
        $contador += 1;
    }
}
echo $fecha_inicial."<br />";
echo $fecha_final."<br />";
print_r($lista);


/**<?php echo '<p>Hello World</p>'; ?> 
 <?php 
    $lat = -33.5;
    $long = -70.5;
    $marker_list = [
        ["lat" => -33.4,
        "long" => -70.5],
        ["lat" => -33.6,
        "long" => -70.5],
        ["lat" => -33.5,
        "long" => -70.6],
    ];
?>

 <div id="mapid" style="height: 300px"></div>
 </body>

 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
<script>
    var map = L.map('mapid').setView([<?php echo $lat ?>, <?php echo $long ?>], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    <?php foreach($marker_list as $marker) {
        echo 
        'L.marker([' . $marker["lat"] . ',' . $marker["long"] . ']).addTo(map);';
    } ?>
</script>
</html> 

*/

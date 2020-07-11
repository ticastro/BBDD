<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  $uid = $_SESSION["uid"];
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
$username = $_POST["username"];
$mensaje = $_POST["message"];
  require("../config/conexion.php");
  $query = "SELECT uid FROM usuarios WHERE username = '$username' ;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $uid_destino = $result -> fetchAll();  ## obtengo receptant



  foreach ($uid_destino as $u ) {
    $uid_destino_int = intval($u[0]);
    }
$uid_destino_str = strval($uid_destino_int);
if ($uid_destino_str == ""){
  echo "El usuario no es valido";
}else{

print_r($uid_destino);

  $fecha_hoy = getdate();
  $fecha_hoy_str = strval($fecha_hoy["year"])."-".strval($fecha_hoy["mon"])."-".strval($fecha_hoy["mday"]);

echo "La fecha de hoy es: ".$fecha_hoy_str."<br />";
echo "El sender es: ".strval($uid)."<br />";
echo "El receptant es: ".$uid_destino_str."<br />";



  $url = "https://lit-plateau-15934.herokuapp.com/messages";
  $json = file_get_contents($url);
  $datos = json_decode($json, True);


foreach ($datos as $p){ 
  if($p["sender"] == $uid ){
    $coordenadas = array();
    $coordenadas["long"] = $p["long"];
    $coordenadas["lat"] = $p["lat"];
            }          
        }
if (isset($coordenadas["lat"])){
#agregar codigo de que hacer si estan seteadas
}else{
  $coordenadas["lat"] = -33.5;
  $coordenadas["long"] = -70.5;
}


echo "Las coordenadas de envio son: Lat: ".strval($coordenadas["lat"])." Long: ".strval($coordenadas["long"]);
}
      ?>
 


<?php



// where are we posting to?
$url = 'https://lit-plateau-15934.herokuapp.com/messages';

    // what post fields?
    $fields = array(
       'date' => $fecha_hoy_str,
       'lat' => strval($coordenadas["lat"]),
       'long' => strval($coordenadas["long"]),
       'message' => $message,
       'receptant' => $uid_destino_str,
       'sender' => strval($uid),
    );

  $data = json_encode($fields);
    // build the urlencoded data
    // open connection
    $ch = curl_init();

// Attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
    // close connection
    curl_close($ch)
?>
<?php include('../templates/footer.html'); ?>

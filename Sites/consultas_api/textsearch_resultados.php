<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php

require("../config/conexion.php");

 $deseada = $_POST["deseada"];
 $requerida = $_POST["requerida"];
 $prohibida = $_POST["prohibida"];
 $id_usuario = $_POST["idusuario"];

 $deseada = strval($deseada);
 $requerida = strval($requerida);
 $prohibida = strval($prohibida);
 $id_usuario = intval($id_usuario);
 var_dump($requerida=="");
 var_dump($id_usuario);

 #aqui se crea el data
 $data = array();
  if($id_usuario != "") {
  $data['userId'] = $id_usuario;
  }
  if($requerida != "") {
  $data['required'] = explode(",",$requerida);
  }

  if($deseada != "") {
  $data['desired'] = explode(",",$deseada);
  }


  if($prohibida != "") {
  $data['forbidden'] = explode(",",$prohibida);
  }






  $uid = $_SESSION["uid"];
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db




  $url = "https://lit-plateau-15934.herokuapp.com/text-search";     # se tiene que cambiar por text-search




# esto es lo nuevo que estoy probando
# SE DEBE CREAR UN JSON CON LOS VALORES SOLICITADOS DEL USUARIO EN --> BUSQUEDA_POR_TEXTO
  $data1 = array(
  'userId' =>  $id_usuario,
  'required' => explode(",",$requerida),
  'desired'=> explode(",",$deseada),
  'forbidden'=> explode(",",$prohibida)
  ); # ESTO DEBERIA BORRARSE, solo sirve de ejemplo

#echo "PROBANDO EL PROHIBIDAS:";
#var_dump($data);

  $options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode( $data ),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"));

$context  = stream_context_create( $options );
$result = file_get_contents( $url, false, $context );
$response = json_decode( $result , true);

$msn = $response;#["resultados de ID"];                                             #modifique esta linea



?>

      <?php


       echo "Lograste acceder a la pagina de busqueda por texto: "."<br />";


       foreach ($msn as $p){

            echo "fecha: ".$p['date']." latitud: ".$p['lat']." longitud: ".$p['long']." mid: ".$p['mid']." receptor: ".$p['receptant']." remitente: ".$p['sender']." mensaje: ".$p['message'];
            echo " "."<br />";

        }



      ?>


<?php include('../templates/footer.html'); ?>
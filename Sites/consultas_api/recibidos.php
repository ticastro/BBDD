<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  $uid = $_SESSION["uid"];
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db




  $url = "https://lit-plateau-15934.herokuapp.com/messages";
  $json = file_get_contents($url);
  $datos = json_decode($json, True);
?>

     <?php
        foreach ($datos as $p){ 
            if($p["receptant"] == $uid ){
              echo $p["message"];

            }
            
        }
      
      ?>

  <table>
    <tr>
      <th>Date</th>
      <th>Lat</th>
      <th>Long</th>
      <th>mid</th>
      <th>Receptant</th>
      <th>Sender</th>
      <th>Message</th>

      
    </tr>

      
  </table>



  ?>



 

<?php include('../templates/footer.html'); ?>

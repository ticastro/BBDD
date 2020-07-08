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

      <?php
        foreach ($datos as $p) 
          { if (intval($p["receptant"]) == $uid){
            echo $p['date'];
          echo "<tr><td>$p['date']</td><td>$p['lat']</td><td>$p['long']</td><td>$p['mid']</td><td>$p['receptant']</td><td>$p['sender']</td><td>$p['message']</td></tr>";
        }
      }
      ?>
      
  </table>



  ?>



 

<?php include('../templates/footer.html'); ?>

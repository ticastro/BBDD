<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db



  $url = "https://lit-plateau-15934.herokuapp.com/messages";
  $json = file.get_contents($url);
  $datos = json_decode($json, True);
  echo $datos ;



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

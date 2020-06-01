<?php session_start(); ?>



<?php include('../templates/header.html');   ?>


<body>
<?php
echo 'Bienvenido a tus artistas favoritos ' ;

$uid = $_SESSION["uid"];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  require("../config/conexion.php");



  #Se construye la consulta como un string
$query1 = "SELECT nombre_artista from favoritos where uid = '$uid';" ;


  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query1);
  $result -> execute();
  $data1 = $result -> fetchAll();
?>

   <table>
    <tr>
      <th>Tus Artistas favoritos</th>
    </tr>

    <tr>
      <th>Nombre Artista</th>
      <th>Link</th>
    </tr>
  
  
      <?php
        foreach ($data1 as $p) {
          echo "<tr><td>$p[0]</td><td><a href='pagina_artista.php?nombre=$p[0]'>Ver Artista</a></td></tr>";
          

      }
      ?>
      
  </table>

  



<?php include('../templates/footer.html'); ?>

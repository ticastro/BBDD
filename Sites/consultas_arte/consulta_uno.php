<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
 

  #Se construye la consulta como un string
 	$query = "SELECT username, mail FROM Usuarios, tiene_mail , mail_usuarios WHERE tiene_mail.muid = mail_usuarios.muid AND usuarios.uid = tiene_mail.uid ;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db2 -> prepare($query);
	$result -> execute();
	$usernames = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>username</th>
      <th>mail</th>
    </tr>
  
      <?php
        foreach ($usernames as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>

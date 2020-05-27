<?php include('../templates/header.html');   ?>

<?php

require("../config/conexion.php");

 $usuario = $_POST["usuario"];
 $password = $_POST["password"];

 echo $usuario ;
 echo $password ;

if(trim($_POST["usuario"]) != "" && trim($_POST["password"]) != "")
{
$query = "SELECT username, password FROM usuarios WHERE username = $usuario; " ;

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result = $db -> prepare($query);
$result -> execute();
$usernames = $result -> fetchAll();

echo $usernames[0] ;

if ($usernames[0] != ""){
    if ($usernames[1] == $password){
        echo 'Has sido logueado correctamente '.$_SESSION['k_username'].' <p>';
    } else {
        echo "<h4> password incorrecta </h4>";
    }
 }else{
  echo 'Usuario no existente en la base de datos';
}

}else{
 echo 'Debe especificar un usuario y password';
}

/*

 if($row = pg_fetch_array($result)){
  if($row["password"] == $password){
   $_SESSION["k_username"] = $row['usuario'];
   echo 'Has sido logueado correctamente '.$_SESSION['k_username'].' <p>';
   echo '<a href="index.php">Index</a></p>';
   //Elimina el siguiente comentario si quieres que re-dirigir automáticamente a index.php
   /*Ingreso exitoso, ahora sera dirigido a la pagina principal.
   <SCRIPT LANGUAGE="javascript">
   location.href = "index.php";
   </SCRIPT>*/
/*
  }else{
   echo 'Password incorrecto';
  }
 }else{
  echo 'Usuario no existente en la base de datos';
 }
 pg_free_result($result);
}else{
 echo 'Debe especificar un usuario y password';
}
pg_close();
*/

?>
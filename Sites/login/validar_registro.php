<?php 
session_start();
include('../templates/header.html');   ?>

<?php


require("../config/conexion.php");

 $usuario = $_POST["username"];
 $password = $_POST["password"];
 $usuario = strval($usuario);
 $password = strval($password);



if($_POST["username"] != "" && $_POST["password"] != "" && $_POST["nombre"] != "" && $_POST["correo"] != "" && $_POST["direccion"] != "")
{
$query = "SELECT username FROM Usuarios WHERE username = '$usuario' ; " ;

#$query = "SELECT username, password FROM Usuarios, tiene_mail , mail_usuarios WHERE tiene_mail.muid = mail_usuarios.muid AND usuarios.uid = tiene_mail.uid ;";
$result = $db -> prepare($query);
$result -> execute();
$usernames = $result -> fetchAll();


if ($usernames[0][0] == ""){
  echo 'te vamos a registrar con'.$_POST["username"];
  $query1 = "SELECT MAX(uid) FROM Usuarios ;";
  $result = $db -> prepare($query1);
  $result -> execute();
  $uid = $result -> fetchAll();
  $nuevo_uid = intval($uid[0][0]) + 1; 
  $nuevo_username = $_POST["username"];
  $nuevo_password = $_POST["password"];
  echo "$nuevo_uid";
  echo "$nuevo_username";
  echo "$nuevo_password";
  $query2 = "INSERT INTO borrador(uid, nombre, password) VALUES ('$nuevo_uid', '$nuevo_username', '$nuevo_password');" ;
  $result = $db -> prepare($query2);
  $result -> execute();

  //$query3 = "INSERT INTO Datos_usuarios(duid, nombre, direccionusuario) VALUES ($nuevo_uid, $_POST["nombre"], $_POST["direccion"]); ";
  //$query1 = "INSERT INTO Usuarios(uid, username,password) VALUES (valoruid, valorusername, valorpassword); "
  echo 'Has sido logueado correctamente '.$_SESSION['k_username'].' <p>';
  $_SESSION["k_username"] = $usernames[0][0] ;
  print_r($_SESSION);
  echo isset($_SESSION['k_username']) ;
  echo $_SESSION['k_username'] ;
  echo '<a href="../index.php">Index</a></p>';
}
}else{
 echo 'Debe especificar todos los datos pedidos';
}

?>

<?php
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

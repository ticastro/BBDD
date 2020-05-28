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
  $query1 = "SELECT MAX(uid) FROM Usuarios ;";
  $result = $db -> prepare($query1);
  $result -> execute();
  $uid = $result -> fetchAll();
  $nuevo_uid = intval($uid[0][0]) + 1 ;
  $nuevo_username = $_POST["username"];
  $nuevo_password = $_POST["password"];
  $nuevo_nombre = $_POST["nombre"];
  $nuevo_mail = $_POST["correo"];
  $nuevo_direccion = $_POST["direccion"];
  $query2 = "INSERT INTO usuarios(uid, username, password) VALUES ('$nuevo_uid', '$nuevo_username', '$nuevo_password');" ;
  $result = $db -> prepare($query2);
  $result -> execute();
  $query3 = "INSERT INTO Datos_usuarios(duid, nombre, direccionusuario) VALUES ('$nuevo_uid', '$nuevo_nombre', '$nuevo_direccion');" ;
  $result = $db -> prepare($query3);
  $result -> execute();
  $query4 = "INSERT INTO mail_usuarios(muid, mail) VALUES ('$nuevo_uid', '$nuevo_mail');" ;
  $result = $db -> prepare($query4);
  $result -> execute();
  $query5 = "INSERT INTO tiene_datos(duid, uid) VALUES ('$nuevo_uid', '$nuevo_uid');" ;
  $result = $db -> prepare($query5);
  $result -> execute();
  $query6 = "INSERT INTO tiene_mail(muid, uid) VALUES ('$nuevo_uid', '$nuevo_uid');" ;
  $result = $db -> prepare($query6);
  $result -> execute();


  //$query3 = "INSERT INTO Datos_usuarios(duid, nombre, direccionusuario) VALUES ($nuevo_uid, $_POST["nombre"], $_POST["direccion"]); ";
  //$query1 = "INSERT INTO Usuarios(uid, username,password) VALUES (valoruid, valorusername, valorpassword); "
  $_SESSION["k_username"] = $nuevo_username ;
  $_SESSION["uid"] = $nuevo_uid;
  echo 'Has sido registrado correctamente '.$_SESSION['k_username'].' <p>';
  echo '<a href="../index.php">Index</a></p>';
}else{
  echo 'El username ya existe, intente nuevamente.'
  echo '<a href="../login/validar_registro.php">Volver</a></p>';
}

}else{
 echo 'Debe especificar todos los datos pedidos' ;
 echo '\n';
   echo '<a href="../index.php">Index</a></p>';

}

?>



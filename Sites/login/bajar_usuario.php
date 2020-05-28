<?php 
session_start();
include('../templates/header.html');   ?>

<?php


require("../config/conexion.php");

 $usuario = $_SESSION["k_username"];
 $usuario = strval($usuario);

$query = "UPDATE usuarios SET password = '0000' WHERE username = '$usuario' ; " ;

#$query = "SELECT username, password FROM Usuarios, tiene_mail , mail_usuarios WHERE tiene_mail.muid = mail_usuarios.muid AND usuarios.uid = tiene_mail.uid ;";
$result = $db -> prepare($query);
$result -> execute();

echo 'Usuario eliminado correctamente';
echo '<a href="../index.php">Index</a></p>';
session_destroy();


?>



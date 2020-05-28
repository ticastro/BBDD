<?php 
session_start();
include('../templates/header.html');   ?>

<?php


require("../config/conexion.php");

 $usuario = $_POST["usuario"];
 $password = $_POST["password"];
 $usuario = strval($usuario);
 $password = strval($password);



if($_POST["usuario"] != "" && $_POST["password"] != "")
{
$query = "SELECT username, password FROM Usuarios WHERE username LIKE '%$usuario%' ; " ;

#$query = "SELECT username, password FROM Usuarios, tiene_mail , mail_usuarios WHERE tiene_mail.muid = mail_usuarios.muid AND usuarios.uid = tiene_mail.uid ;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result = $db -> prepare($query);
$result -> execute();
$usernames = $result -> fetchAll();

?>
<?php



if ($usernames[0][0] != ""){
    if (strval($usernames[0][1]) == strval($password)){
        echo 'Has ingresado correctamente '.$_SESSION['k_username'].' <p>';
        $_SESSION["k_username"] = $usernames[0][0] ;
        print_r($_SESSION);
        echo isset($_SESSION['k_username']) ;
        echo $_SESSION['k_username'] ;
        echo '<a href="../index.php">Index</a></p>';
        

    } else {
        echo "<h4> password incorrecta </h4>";
    }
 }else{
  echo 'Usuario no existente en la base de datos';
}

}else{
 echo 'Debe especificar un usuario y password';
}

?>
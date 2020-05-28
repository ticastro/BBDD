<?php
session_start();
?>

<?php include('../templates/header.html');   ?>

<?php
//Matamos la sesion
session_destroy();
echo 'Ha terminado la session <p><a href="../index.php">index</a></p>';
?>

<?php include('../templates/header.html');   ?>

<?php
session_start();
//Matamos la sesion
session_destroy();
echo 'Ha terminado la session <p><a href="index.php">index</a></p>';
?>
<SCRIPT LANGUAGE="javascript">
location.href = "index.php";
</SCRIPT>
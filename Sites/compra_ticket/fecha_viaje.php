<?php session_start(); ?>



<?php include('../templates/header.html');   ?>


<body>
<?php
echo '¿En que fechas quieres viajar?  ' ;
$vid = $_GET["vid"];
$_SESSION["vid"] = $vid;
print_r ($_SESSION);
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
?>
<form action="validar_fecha.php" method="post">
Fecha viaje (yyyy-mm-dd):<input type="date" name="fecha_ingresada" size="20" maxlength="20" />
<br />
<input type="submit" value="Ingresar" />
</form>

<?php include('../templates/footer.html'); ?>

<?php session_start(); ?>



<?php include('../templates/header.html');   ?>


<body>
<?php
echo '¿En que fechas quieres hospedar? ' ;
$hotel = $_GET["nombre_hotel"];
$_SESSION["nombre_hotel"] = $hotel;
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
?>
<form action="validar_fecha_hotel.php" method="post">
Fecha llegada (yyyy-mm-dd):<input type="date" name="llegada" size="20" maxlength="20" />
<br />
Fecha salida (yyyy-mm-dd):<input type="date" name="salida" size="20" maxlength="20" />
<br />
<input type="submit" value="Ingresar" />
</form>

<?php include('../templates/footer.html'); ?>

<?php session_start(); ?>



<?php include('../templates/header.html');   ?>




<form action="mapa.php" method="post">
Fecha inicial (yyyy-mm-dd):<input type="date" name="fecha_inicial" size="20" maxlength="20" />
Fecha final (yyyy-mm-dd):<input type="date" name="fecha_final" size="20" maxlength="20" />
<br />
<input type="submit" value="Ingresar" />
</form>
<?php include('../templates/header.html');   ?>

<form action="validar_registro.php" method="post">
Nombre:<input type="text" name="nombre" size="10" maxlength="100" />
<br />
Username:<input type="text" name="username" size="20" maxlength="200" />
<br />
Password:<input type="password" name="password" size="10" maxlength="100" />
<br />
correo:<input type="text" name="correo" size="10" maxlength="100" />
<br />
Direccion:<input type="text" name="direccion" size="10" maxlength="100" />
<br />
<input type="submit" value="Registrarse" />
</form>

<?php include('../templates/header.html');   ?>

<form action="mensaje.php" method="post">
Destinatario (username): <input type="text" name="username" size="20" maxlength="20" />
<br />
Mensaje: <input type="text" name="message" size="200" maxlength="400" />
<br />

<input type="submit" value="Ingresar" />
</form>
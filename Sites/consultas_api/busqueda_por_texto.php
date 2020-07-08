<?php include('../templates/header.html');   ?>

<form action="textsearch_resultados.php" method="post">
Deseada :<input type="text" name="deseada" size="20" maxlength="20" />
<br />
Requerida :<input type="text" name="requerida" size="20" maxlength="20" />
<br />
Prohibida :<input type="text" name="prohibida" size="20" maxlength="20" />
<br />
ID_usuario :<input type="text" name="idusuario" size="20" maxlength="20" />
<br />
<input type="submit" value="Ingresar" />
</form>
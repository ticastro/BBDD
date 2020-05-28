<?php
session_start();

?>

<?php include('templates/header.html');   ?>


<?php
echo 'Bienvenido, ';
if ($_SESSION['k_username'] != "") {
 echo '<b>'.$_SESSION['k_username'].'</b>.';
 echo '<p><a href="login/logout.php">Logout</a></p>';
 echo '<p><a href="login/bajar_usuario.php">Eliminar cuenta</a></p>';

}else{
 echo '<p><a href="login/login.php">Login</a></p>';
echo '<p><a href="login/sign_up.php">Registrarme</a></p>';
 
}
?>

<body>
  <h1 align="center"> Agencia de Viajes</h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre los clientes y viajes de nuestra empresa.</p>

  <br>

  <h3 align="center"> Mostrar usernames y correos</h3>

  <form align="center" action="consultas/consulta_uno.php" method="post">

    <input type="submit" value="Mostrar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Buscar ciudades por país</h3>

  <form align="center" action="consultas/consulta_dos.php" method="post">
    Nombre del país:
    <input type="text" name="pais">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Países en que ha hospedado un usuario: por username</h3>

  <form align="center" action="consultas/consulta_tres.php" method="post">
  
    <input type="text" name="username">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center"> Gastos por uid de usuario:</h3>

  <form align="center" action="consultas/consulta_cuatro.php" method="post">
  
    <input type="text" name="uid">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center"> Información entre 01/01/2020 al 31/03/2020</h3>

  <form align="center" action="consultas/consulta_cinco.php" method="post">
  
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>


  
  <br>
  <br>
  <br>
  <br>
</body>
</html>

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
 echo '<p><a href="perfil/perfil.php">Mi perfil</a></p>';
 echo '<p><a href="paginas/pagina_tickets.php">Ver tickets de transporte</a></p>';
  echo '<p><a href="reservas/reservar_hotel.php">Hacer reservas para hoteles</a></p>';
  echo '<p><a href="consultas_arte/consulta_artistas.php">Ver Artistas</a></p>';
  echo '<p><a href="paginas/pagina_favoritos.php">Ver mis Artistas favoritos</a></p>';


}else{
 echo '<p><a href="login/login.php">Login</a></p>';
echo '<p><a href="login/sign_up.php">Registrarme</a></p>';
 
}
?>

<body>
  <h1 align="center"> Agencia de Viajes</h1>
  <p style="text-align:center;">Ingresa para organizar tu próximo viaje.</p>


</body>
</html>

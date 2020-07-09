<?php
session_start();
?>

<?php include('templates/header.html');   ?>


<body>
  <h1 align="center"> Agencia de Viajes</h1>
  <p style="text-align:center;">Ingresa para organizar tu próximo viaje.</p>


</body>
</html>




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
  echo '<p><a href="consultas_api/recibidos.php">Ver mis mensajes recibidos</a></p>';
  echo '<p><a href="consultas_api/enviados.php">Ver mis mensajes enviados</a></p>';
  echo '<p><a href="consultas_api/escribir_mensaje.php">Enviar mensaje </a></p>';
  echo '<p><a href="consultas_api/busqueda_por_texto.php">Buscar mensajes por texto</a></p>';  #cambie esta linea
  echo '<p><a href="consultas_api/form_fecha.php">Filtrar mensajes</a></p>'; 


}else{
 echo '<p><a href="login/login.php">Login</a></p>';
echo '<p><a href="login/sign_up.php">Registrarme</a></p>';
 
}
?>



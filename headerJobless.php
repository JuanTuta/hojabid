
<?php

// Verificar si la variable de sesión existe y tiene un valor
if (isset($_SESSION["usuario"])) {
    $nombreUsuario = $_SESSION["usuario"];
} else {
    // Si la variable de sesión no existe o no tiene valor, redirigir a index.php
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Mi página web</title>
    <link rel="stylesheet" href="css/css_Header.css">
    <link rel="stylesheet" href="css/log_in.css">
  </head>
  <body>
    <header>
      <div class="barra_de_inicio">
          <div>
          <img  class="Imagen" src="imgs/trabajar.png" alt="Ícono distintivo empresa">
          </div>
          <div class="Panel_gris">
          <p class="cerda">¡Hola, <?php echo $nombreUsuario; ?>!</p>
          </div>
          <div>
          <a class="logout" href="index.php">Cerrar sesión</a>
          </div>
      </div>
    </header>
  </body>
</html>

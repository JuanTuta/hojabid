<?php
session_start();
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Mi página web</title>
    <link rel="stylesheet" href="css/opciones.css">
  </head>
  <body>
    <?php include 'headerEmpresa.php'; ?>
    <div id="container">
      <div class="Blancou">
        <h1>¿Qué quieres hacer?</h1>
        <div class="botones-container">
          <div class="BOTONAZO">
            <a href="consultaHV-empresa.php">
            <img src="imgs/cv.png" class="imagen1" />
            </a>
          </div>
          <div class="BOTONAZO2">
            <a href="crea-vacante.php">
            <img src="imgs/vacante.png" class="imagen2" />
            </a>
          </div>
    </div>
    </div>
        <img src="imgs/rama (1).png" class="imTroll" />
      </div>
  </body>
</html>
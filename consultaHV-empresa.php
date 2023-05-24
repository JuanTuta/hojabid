<?php
session_start();
?>



<!DOCTYPE html>
<html>
  <head>
    <title>Mi página web</title>
    <link rel="stylesheet" href="css/css_consultaHV.css">
  </head>
  <body>
    <?php include 'headerEmpresa.php'; ?>
    <div class="container-rojo">
        <div class="container-blanco">
            <h1>HV disponibles</h1>
            <?php include 'intento.php'; ?>
        </div>
    </div>




  </body>
</html>
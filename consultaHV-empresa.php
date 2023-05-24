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
            <div class="Contenedor-HV">
                    <div class="mini-blanco">
                        <h3 class="Encabezadín-1">TutiGod (Bogotá D.C.)</h3>
                    </div>
                    <a class="archivoHV-1">Descargala ahora</a>
            </div>

            <div class="Contenedor-HV-2">
                    <div class="mini-blanco-2">
                        <h3 class="Encabezadín-2">TutiGod (Bogotá D.C.)</h3>
                    </div>
                    <a class="archivoHV-2">Descargala ahora</a>
            </div>

            <div class="Contenedor-HV-2">
                    <div class="mini-blanco-2">
                        <h3 class="Encabezadín-2">TutiGod (Bogotá D.C.)</h3>
                    </div>
                    <a class="archivoHV-2">Descargala ahora</a>
            </div>

            <?php include 'intento.php'; ?>

        </div>
    </div>




  </body>
</html>
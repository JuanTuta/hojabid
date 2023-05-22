<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Proyecto</title>
    <link rel="stylesheet" href="css/log_in.css">
</head>
<body>
    <div id="container">
        <div class="info">
            <h1>Agencias de Empleos Bogotá</h1>
            <span>Made with LOVE <i class="fa fa-heart"></i></span>
        </div>
        <div class="form">
            <div class="thumbnail">
                <img src="https://cdn-icons-png.flaticon.com/512/4832/4832900.png" />
            </div>
            <form class="login-form" method="POST" action="guardar_datos.php">
                <input type="text" name="usuario" placeholder="Usuario" required />
                <input type="password" name="contrasena" placeholder="Contraseña" required />
                <button type="submit" class="button1">Iniciar sesión</button>
                <p class="message">No está registrado? <a href="#">Crear Cuenta</a></p>
                <p class="message">Olvidó su contraseña? <a href="#">Click aquí</a></p>
            </form>
        </div>
        <video id="video" autoplay loop poster="polina.jpg">
            <source src="http://andytran.me/A%20peaceful%20nature%20timelapse%20video.mp4" type="video/mp4" />
        </video>
    </div>
</body>
</html>

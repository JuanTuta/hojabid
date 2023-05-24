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
        </div>
        <div class="form">
            <div class="thumbnail">
                <img src="https://cdn-icons-png.flaticon.com/512/4832/4832900.png" />
            </div>
            <form class="login-form" action="recu.php" method="POST">
                <p class="message">Coloque su email y su Nueva contraseña <a>Ingrese sus datos correctamente</a></p>
                <span></span>
                <input type="text" name="email" placeholder="Email" />
                <input type="password" name="contrasena" placeholder="Contraseña" required />
                <button type="submit" class="button1">Iniciar sesión</button>
                <p class="message">Error? <a href="#">Click aqui</a></p>
            </form>
        </div>
    </div>
</body>
</html>

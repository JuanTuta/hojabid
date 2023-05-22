<?php
$serverName = "serv1prub.database.windows.net";
$connectionOptions = array(
    "Database" => "PPagina",
    "UID" => "tu_usuario",
    "PWD" => "tu_contraseña",
    "Authentication" => "ActiveDirectoryPassword"
);

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los valores del formulario
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Establecer conexión
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
        echo "Error de conexión";
    } else {
        // Consulta SQL para insertar los datos en la tabla
        $sql = "INSERT INTO usuarioSGod (nombreUsuario, contraseña) VALUES ($usuario, $contrasena);";
    }
}
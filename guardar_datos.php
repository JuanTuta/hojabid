<?php
$serverName = "serv1prub.database.windows.net";
$connectionOptions = array(
    "Database" => "PPagina",
    "UID" => "est.juan.tuta@unimilitar.edu.co",
    "PWD" => "Jp12021866*",
    "Authentication" => "ActiveDirectoryPassword"
);

// Verificar si se enviaron los datos del formulario
// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los valores del formulario
    $usuario = "JPelmamaguevo";
    $contrasena = "mamaguevoxd";

    // Establecer conexión
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
        echo "Error de conexión";
    } else {
        // Consulta SQL para insertar los datos en la tabla
        $sql = "INSERT INTO usuarioSGod (nombreUsuario, contraseña) VALUES (?, ?)";
        
        // Preparar la consulta
        $stmt = sqlsrv_prepare($conn, $sql, array(&$usuario, &$contrasena));
        
        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
            echo "Error en la preparación de la consulta";
        } else {
            // Ejecutar la consulta
            if (sqlsrv_execute($stmt) === false) {
                die(print_r(sqlsrv_errors(), true));
                echo "Error al ejecutar la consulta";
            } else {
                echo "Datos insertados correctamente";
            }
        }
    }
}


<?php
$serverName = "serv1prub.database.windows.net";
$connectionOptions = array(
    "Database" => "PPagina",
    "UID" => "est.juan.tuta@unimilitar.edu.co",
    "PWD" => "Jp12021866*",
    "Authentication" => "ActiveDirectoryPassword"
);

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los valores del formulario
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    try {
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
            echo "Error de conexión";
        } else {
            // Consultar el usuario y la contraseña en la tabla usuarioSGod
            $sql = "SELECT * FROM usuarioSGod WHERE nombreUsuario = ? AND contraseña = ?";
            $params = array($usuario, $contrasena);
            $stmt = sqlsrv_query($conn, $sql, $params);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
                echo "Error al consultar la base de datos";
            }

            // Verificar si se encontró una coincidencia de usuario y contraseña
            if (sqlsrv_has_rows($stmt)) {
                // Iniciar sesión o redirigir a la página de inicio
                session_start();
                $_SESSION["usuario"] = $usuario;
                header("Location: empus.php");
                exit();
            } else {
                echo "Usuario y/o contraseña incorrectos";
            }

            // Cerrar la conexión a la base de datos
            sqlsrv_close($conn);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>



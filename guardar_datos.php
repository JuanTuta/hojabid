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
            // Consultar el usuario, la contraseña y el rol en la tabla usuarioSGod
            $sql = "SELECT * FROM usuarioSGod WHERE nombreUsuario = ? AND contraseña = ?";
            $params = array($usuario, $contrasena);
            $stmt = sqlsrv_query($conn, $sql, $params);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
                echo "Error al consultar la base de datos";
            }

            // Verificar si se encontró una coincidencia de usuario y contraseña
            if (sqlsrv_has_rows($stmt)) {
                // Obtener el nombre de usuario de la consulta
                $row = sqlsrv_fetch_array($stmt);
                $nombreUsuario = $row["nombreUsuario"];

                // Iniciar sesión y almacenar el nombre de usuario en una variable de sesión
                $_SESSION["usuario"] = $nombreUsuario;

                // Obtener el rol del usuario
                $rol = $row["rol"];

                // Redirigir según el rol del usuario
                if ($rol === "usuario") {
                    header("Location: headerJobless.php");
                    exit();
                } elseif ($rol === "empresa") {
                    header("Location: pagina_empresa.php");
                    exit();
                } else {
                    echo "Rol desconocido";
                }
            } else {
                // Mostrar mensaje de alerta y redirigir a index.php mediante JavaScript
                echo '<script>alert("Usuario y/o contraseña incorrectos"); window.location.href = "index.php";</script>';
                exit();
            }

            // Cerrar la conexión a la base de datos
            sqlsrv_close($conn);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>








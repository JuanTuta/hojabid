<?php
session_start();

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
    $email = $_POST["email"];
    $nuevaContrasena = $_POST["contrasena"];

    try {
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
            echo "Error de conexión";
        } else {
            // Consultar el correo en la base de datos
            $sql = "SELECT * FROM usuarioSGod WHERE email = ?";
            $params = array($email);
            $stmt = sqlsrv_query($conn, $sql, $params);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
                echo "Error al consultar la base de datos";
            }

            // Verificar si se encontró el correo
            if (sqlsrv_has_rows($stmt)) {
                // Actualizar la contraseña en la base de datos
                $sqlUpdate = "UPDATE usuarioSGod SET contraseña = ? WHERE email = ?";
                $paramsUpdate = array($nuevaContrasena, $email);
                $stmtUpdate = sqlsrv_query($conn, $sqlUpdate, $paramsUpdate);
                if ($stmtUpdate === false) {
                    die(print_r(sqlsrv_errors(), true));
                    echo "Error al actualizar la contraseña";
                }

                echo '<script>alert("Contraseña cambiada exitosamente"); window.location.href = "index.php";</script>';
                exit();
            } else {
                echo '<script>alert("El correo no existe"); window.location.href = "recuContraseña.php";</script>';
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

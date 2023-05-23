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
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["numero"];
    $ubicacion = $_POST["ubicacion"];
    $salario = $_POST["salario"];
    $hv = $_FILES["hv"]["tmp_name"];
    $video = $_POST["video"];
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    try {
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
            echo "Error de conexión";
        } else {
            // Insertar en la tabla DESEMPLEADO
            $sqlDesempleado = "INSERT INTO DESEMPLEADO (NOMBRE, DIRECCION, TELEFONO, id_UBICACION, SALARIO, HV, VIDEO)
                               VALUES (?, ?, ?, ?, ?, ?, ?)";
            $paramsDesempleado = array($nombre, $direccion, $telefono, $ubicacion, $salario, fopen($hv, "rb"), $video);
            $stmtDesempleado = sqlsrv_query($conn, $sqlDesempleado, $paramsDesempleado);
            if ($stmtDesempleado === false) {
                die(print_r(sqlsrv_errors(), true));
                echo "Error al insertar en la tabla DESEMPLEADO";
            }

            // Obtener el ID_DESEMPLEADO generado automáticamente
            $idDesempleado = sqlsrv_fetch_array(sqlsrv_query($conn, "SELECT SCOPE_IDENTITY()"));

            // Insertar en la tabla usuarioSGod
            $sqlUsuario = "INSERT INTO usuarioSGod (nombreUsuario, contraseña) VALUES (?, ?)";
            $paramsUsuario = array($usuario, $contrasena);
            $stmtUsuario = sqlsrv_query($conn, $sqlUsuario, $paramsUsuario);
            if ($stmtUsuario === false) {
                die(print_r(sqlsrv_errors(), true));
                echo "Error al insertar en la tabla usuarioSGod";
            }

            // Cerrar la conexión a la base de datos
            sqlsrv_close($conn);

            echo "Datos insertados correctamente";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>






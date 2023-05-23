<?php
$serverName = "serv1prub.database.windows.net";
$connectionOptions = array(
    "Database" => "PPagina",
    "UID" => "est.juan.tuta@unimilitar.edu.co",
    "PWD" => "Jp12021866*",
    "Authentication" => "ActiveDirectoryPassword"
);

// Obtener los valores enviados por el formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['numero'];
$ubicacion = $_POST['ubicacion'];
$salario = $_POST['salario'];
$hv = $_POST['hv'];
$video = $_POST['video'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

echo $hv;
try {
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Insertar en la tabla DESEMPLEADO
    $sqlDesempleado = "INSERT INTO DESEMPLEADO (id_DESEMPLEADO, NOMBRE, DIRECCION, TELEFONO, id_UBICACION, SALARIO, id_HV, VIDEO)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $paramsDesempleado = array($id, $nombre, $direccion, $telefono, $ubicacion, $salario, $hv, $video);
    $stmtDesempleado = sqlsrv_query($conn, $sqlDesempleado, $paramsDesempleado);
    if ($stmtDesempleado === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Obtener el ID_DESEMPLEADO generado automáticamente
    $idDesempleado = sqlsrv_fetch_array(sqlsrv_query($conn, "SELECT @@IDENTITY"));

    // Insertar en la tabla usuarioSGod
    $sqlUsuario = "INSERT INTO usuarioSGod (nombreUsuario, contraseña) VALUES (?, ?)";
    $paramsUsuario = array($usuario, $contrasena);
    $stmtUsuario = sqlsrv_query($conn, $sqlUsuario, $paramsUsuario);
    if ($stmtUsuario === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Cerrar la conexión a la base de datos
    sqlsrv_close($conn);

    // Redireccionar a una página de éxito o mostrar un mensaje de éxito
    header("Location: formulario_exitoso.php");
    exit();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>




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
    $nit = $_POST["nit"];
    $razon_social = $_POST["razon_social"];
    $representante = $_POST["representante"];
    $telefono = $_POST["telefono"];
    $ubicacion = $_POST["ubicacion"];
    $sede = $_POST["sede"];
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    try {
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
            echo "Error de conexión";
        } else {
            // Insertar en la tabla Empresa
            $sqlEmpresa = "INSERT INTO Empresa (NIT, RAZON_SOCIAL, REPRESENTANTE, TELEFONO, id_UBICACION, id_SEDE)
                   VALUES (?, ?, ?, ?, ?, ?)";
            $paramsEmpresa = array($nit, $razon_social, $representante, $telefono, $ubicacion, $sede);
            $stmtEmpresa = sqlsrv_query($conn, $sqlEmpresa, $paramsEmpresa);
            if ($stmtEmpresa === false) {
                die(print_r(sqlsrv_errors(), true));
                echo "Error al insertar en la tabla Empresa";
            }

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

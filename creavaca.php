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
    $fechaInicio = $_POST["fini"];
    $fechaFin = $_POST["fin"];
    $cargo = $_POST["cargo"];
    $salario = $_POST["salario"];
    $pregrado = $_POST["pregrado"];
    $descripcion = $_POST["descrip"];
    $rangoEdad = $_POST["reangoe"];
    $ubicacion = $_POST["ubicacion"];

    try {
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
            echo "Error de conexión";
        } else {
            // Insertar la nueva vacante en la tabla VACANTES
            $sql = "INSERT INTO VACANTES (FECHA_INICIO, FECHA_FIN, CARGO, SALARIO, PREGRADO, DESCRIPCION, RANGO_EDAD, EMPRESA, PUNTUACION_EMPRESA, id_UBICACION)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $params = array($fechaInicio, $fechaFin, $cargo, $salario, $pregrado, $descripcion, $rangoEdad, $_SESSION["usuario"], 0, $ubicacion);
            $stmt = sqlsrv_query($conn, $sql, $params);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
                echo "Error al crear la vacante";
            }

            // Redirigir a la página de opciones de empresa
            header("Location: opciones_empresa.php");
            exit();

            // Cerrar la conexión a la base de datos
            sqlsrv_close($conn);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

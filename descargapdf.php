<?php
session_start();

$serverName = "serv1prub.database.windows.net";
$connectionOptions = array(
    "Database" => "PPagina",
    "Uid" => "est.juan.tuta@unimilitar.edu.co",
    "PWD" => "Jp12021866*",
    "Authentication" => "ActiveDirectoryPassword"
);

if (isset($_GET['id'])) {
    $hvFileName = $_GET['id'];

    try {
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        
        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $sql = "SELECT HV FROM DESEMPLEADO WHERE NOMBRE = ?";
        $params = array(&$hvFileName);
        $result = sqlsrv_query($conn, $sql, $params);

        if ($result === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        if (sqlsrv_fetch($result) === true) {
            $hvData = sqlsrv_get_field($result, 0, SQLSRV_PHPTYPE_STREAM(SQLSRV_ENC_BINARY));
            
            // Configurar las cabeceras para la descarga
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $hvFileName . '"');
            echo "No se encontró el archivo solicitado.";
            // Leer el contenido del archivo y enviarlo al navegador
            while (!feof($hvData)) {
                echo fread($hvData, 4096);
            }

            // Cerrar el flujo de datos
            fclose($hvData);
        } else {
            echo "No se encontró el archivo solicitado.";
        }

        sqlsrv_free_stmt($result);
        sqlsrv_close($conn);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No se proporcionó un nombre de archivo válido.";
}
?>
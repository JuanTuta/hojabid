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

            // Convertir los datos VARBINARY en un archivo PDF válido
            $pdfData = stream_get_contents($hvData);
            $tempFileName = tempnam(sys_get_temp_dir(), "pdf_");
            file_put_contents($tempFileName, $pdfData);

            // Configurar las cabeceras para la descarga
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $hvFileName . '"');

            // Enviar el contenido del archivo al navegador
            readfile($tempFileName);

            // Eliminar el archivo temporal
            unlink($tempFileName);

            // Cerrar el flujo de datos
            sqlsrv_free_stmt($result);
            sqlsrv_close($conn);
            exit;
        } else {
            echo "No se encontró el archivo solicitado.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No se proporcionó un nombre de archivo válido.";
}
?>








<?php
session_start();
echo "No se encontraron registros en la tabla DESEMPLEADO1.";
$serverName = "serv1prub.database.windows.net";
$connectionOptions = array(
    "Database" => "PPagina",
    "Uid" => "est.juan.tuta@unimilitar.edu.co",
    "PWD" => "Jp12021866*",
    "Authentication" => "ActiveDirectoryPassword"
);

// Establecer la conexión con el servidor y realizar la consulta
try {
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $sql = "SELECT * FROM DESEMPLEADO";
    $result = sqlsrv_query($conn, $sql);

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Consulta para obtener los datos de los desempleados
    $sqlDesempleados = "SELECT NOMBRE, ID_UBICACION FROM DESEMPLEADO";
    $stmtDesempleados = sqlsrv_prepare($conn, $sqlDesempleados);

    if (sqlsrv_execute($stmtDesempleados)) {
        while ($rowDesempleado = sqlsrv_fetch_array($stmtDesempleados, SQLSRV_FETCH_ASSOC)) {
            $nombreDesempleado = $rowDesempleado["NOMBRE"];
            $ubicacionId = $rowDesempleado["ID_UBICACION"];

            // Consulta para obtener el nombre de la ubicación
            $sqlUbicacion = "SELECT CIUDAD FROM UBICACION WHERE ID_UBICACION = ?";
            $stmtUbicacion = sqlsrv_prepare($conn, $sqlUbicacion, array(&$ubicacionId));

            if (sqlsrv_execute($stmtUbicacion)) {
                if ($rowUbicacion = sqlsrv_fetch_array($stmtUbicacion, SQLSRV_FETCH_ASSOC)) {
                    $nombreUbicacion = $rowUbicacion["CIUDAD"];

                    // Generar el div con los datos obtenidos
                    echo '<div class="Contenedor-HV-2">
                            <div class="mini-blanco-2">
                                <h3 class="Encabezadín-2">' . $nombreDesempleado . ' (' . $nombreUbicacion . ')</h3>
                            </div>
                            <a class="archivoHV-2">Descargala ahora</a>
                        </div>';
                }
            } else {
                echo "Error al ejecutar la consulta de ubicación: " . print_r(sqlsrv_errors(), true);
            }
        }
    } else {
        echo "Error al ejecutar la consulta de desempleados: " . print_r(sqlsrv_errors(), true);
    }

    sqlsrv_free_stmt($result);
    sqlsrv_close($conn);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>



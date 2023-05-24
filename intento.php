<?php
session_start();

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

    if (sqlsrv_has_rows($result)) {
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $nombreDesempleado = $row["DESEMPLEADO"];
            $ubicacionId = $row["ID_UBICACION"];

            // Obtener el nombre de la ubicación de la tabla UBICACION
            $sqlUbicacion = "SELECT CIUDAD FROM UBICACION WHERE ID_UBICACION = $ubicacionId";
            $resultUbicacion = sqlsrv_query($conn, $sqlUbicacion);
            $rowUbicacion = sqlsrv_fetch_array($resultUbicacion, SQLSRV_FETCH_ASSOC);
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
        echo "No se encontraron registros en la tabla DESEMPLEADO.";
    }

    sqlsrv_free_stmt($result);
    sqlsrv_close($conn);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>



<?php
session_start();

$serverName = "serv1prub.database.windows.net";
$connectionOptions = array(
    "Database" => "PPagina",
    "UID" => "est.juan.tuta@unimilitar.edu.co",
    "PWD" => "Jp12021866*",
    "Authentication" => "ActiveDirectoryPassword"
);

try {
    $conn = new mysqli($serverName, $connectionOptions["UID"], $connectionOptions["PWD"], $connectionOptions["Database"]);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$sql = "SELECT * FROM DESEMPLEADO";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nombreDesempleado = $row["DESEMPLEADO"];
        $ubicacionId = $row["ID_UBICACION"];

        // Obtener el nombre de la ubicación de la tabla UBICACION
        $sqlUbicacion = "SELECT CIUDAD FROM UBICACION WHERE ID_UBICACION = $ubicacionId";
        $resultUbicacion = $conn->query($sqlUbicacion);
        $rowUbicacion = $resultUbicacion->fetch_assoc();
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

$conn->close();
?>

<?php
$serverName = "serv1prub.database.windows.net"
$connectionOptions= array(
    "Database" => "PPagina",
    "Authentication" => "ActiveDirectoryInteractive",
    "Uid" => "est.juan.tuta@unimilitar.edu.co",
    "PWD" => "Jp12021866*"
);

## Establece conexión
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(formatErrors(sqlsrv_errors()));
    echo ("F");
}
else {
    //Echo ("TUMBA LA CASAAAA MAMIII");
}
?>

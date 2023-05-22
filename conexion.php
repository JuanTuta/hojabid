<?php
echo "Vida F, Fsísima";
$serverName = "serv1prub.database.windows.net";
$connectionOptions = array(
    "Database" => "PPagina",
    "Authentication" => "ActiveDirectoryInteractive",
    "UID" => "est.juan.tuta@unimilitar.edu.co",
    "PWD" => "Jp12021866*"
);

// Establece conexión
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
    echo "Vida F, Fsísima";
} else {
    echo "TUMBA LA CASAAAA MAMIII";
}
?>

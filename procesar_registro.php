<?php
// Datos de conexión a la base de datos
$serverName = "serv1prub.database.windows.net";
$connectionOptions = array(
    "Database" => "PPagina",
    "UID" => "est.juan.tuta@unimilitar.edu.co",
    "PWD" => "Jp12021866*",
    "Authentication" => "ActiveDirectoryPassword"
);

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$numero = $_POST['numero'];
$ubicacion = $_POST['ubicacion'];
$salario = $_POST['salario'];
$hv = $_FILES['hv']['name']; // Nombre del archivo subido
$video = $_POST['video'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$email = $_POST['email'];

// Guardar el archivo HV en una carpeta en el servidor
$hvDestino = "ruta/del/destino/" . $hv; // Ruta de destino del archivo HV
move_uploaded_file($_FILES['hv']['tmp_name'], $hvDestino);

// Conectarse a la base de datos
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Crear la consulta SQL para insertar los datos en la tabla correspondiente
$sql = "INSERT INTO NombreDeLaTabla (nombre, direccion, numero, ubicacion, salario, hv, video, usuario, contrasena, email)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar la consulta SQL
$stmt = sqlsrv_prepare($conn, $sql, array($nombre, $direccion, $numero, $ubicacion, $salario, $hv, $video, $usuario, $contrasena, $email));
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Ejecutar la consulta
if (sqlsrv_execute($stmt)) {
    // La inserción fue exitosa
    echo "Los datos se han insertado correctamente.";
} else {
    // Hubo un error al ejecutar la consulta
    die(print_r(sqlsrv_errors(), true));
}

// Cerrar la conexión a la base de datos
sqlsrv_close($conn);
?>

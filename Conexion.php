<?php
// Conexión a la base de datos
$server = "localhost";
$username = "root";
$password = "";

// Crear una conexión a la base de datos
$conexion = mysqli_connect($server, $username, $password);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$database = "proyecto_pia";
$db = mysqli_select_db($conexion, $database);
// Verificar la conexión
if (!$db) {
    echo "Conexión fallida: ";
}

// Recuperar los datos del formulario
$nombre = $_POST['nombre'];
$identificacion = floatval($_POST['identificacion']); // Convierte a FLOAT
$telefono = $_POST['telefono'];
$pais = $_POST['pais'];
$Usuario = $_POST['Usuario'];
$Contrasena = $_POST['Contrasena'];

// Insertar los datos en la tabla de la base de datos
$sql = "INSERT INTO datos_cliente (nombre, Identificacion, Telefono, Pais, Usuario, Contrasena) VALUES ('$nombre', $identificacion, '$telefono', '$pais' '$Usuario)";
$sql1 = "INSERT INTO usuario_cliente (Usuario, Contrasena, Identificacion_ID) VALUES ('$Usuario', '$Contrasena', $identificacion)";

$result1 = mysqli_query($conexion, $sql);
$result2 = mysqli_query($conexion, $sql1);

if (!$result1 || !$result2) {
    echo "No se ha podido realizar el registro.";
} else {
    // Redirige al usuario a la página de cursos
    header('Location: Cursos.html');
}

// Cerrar la conexión
$conexion->close();
?>

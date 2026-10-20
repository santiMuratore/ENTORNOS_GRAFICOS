<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "base2");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$email = $_POST['email'] ?? '';
$stmt = $conexion->prepare("SELECT nombre FROM alumnos WHERE mail = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($row = $resultado->fetch_assoc()) {
    $_SESSION['nombre'] = $row['nombre'];
    echo "<p>Alumno encontrado correctamente.</p>";
} else {
    unset($_SESSION['nombre']);
    echo "<p>No se encontró ningún alumno con ese email.</p>";
}

$stmt->close();
$conexion->close();
?>
<a href="bienvenida.php">Ir a la página de bienvenida</a>
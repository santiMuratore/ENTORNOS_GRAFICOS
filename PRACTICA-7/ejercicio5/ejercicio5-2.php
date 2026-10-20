<?php
session_start();
$_SESSION['usuario'] = $_POST['usuario'] ?? '';
$_SESSION['clave'] = $_POST['clave'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 - Sesión Guardada</title>
</head>
<body>
    <p>Variables de sesión guardadas correctamente.</p>
    <a href="mostrar_sesion.php">Ir a la página 3 para ver los datos almacenados</a>
</body>
</html>
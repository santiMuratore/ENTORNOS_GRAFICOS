<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 - Recuperar Sesión</title>
</head>
<body>
    <h2>Datos Recuperados de la Sesión</h2>
    <p><strong>Usuario:</strong> <?php echo htmlspecialchars($_SESSION['usuario'] ?? 'No definido'); ?></p>
    <p><strong>Clave:</strong> <?php echo htmlspecialchars($_SESSION['clave'] ?? 'No definida'); ?></p>
</body>
</html>
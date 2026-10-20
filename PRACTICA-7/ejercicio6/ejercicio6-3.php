<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6 - Bienvenida</title>
</head>
<body>
    <?php if (isset($_SESSION['nombre'])): ?>
        <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h2>
    <?php else: ?>
        <h2>Acceso Denegado</h2>
        <p>No puede visitar esta página ya que no está autenticado como un alumno registrado.</p>
    <?php endif; ?>
</body>
</html>
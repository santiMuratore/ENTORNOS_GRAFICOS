<?php
if (!isset($_COOKIE['contador'])) {
    $visitas = 1;
    setcookie('contador', $visitas, time() + (86400 * 365), "/");
    $mensaje = "¡Bienvenido a nuestra página por primera vez!";
} else {
    $visitas = (int)$_COOKIE['contador'] + 1;
    setcookie('contador', $visitas, time() + (86400 * 365), "/");
    $mensaje = "Has accedido a esta página un total de " . $visitas . " veces.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 - Contador</title>
</head>
<body>
    <h2>Contador de Accesos</h2>
    <p><?php echo $mensaje; ?></p>
</body>
</html>
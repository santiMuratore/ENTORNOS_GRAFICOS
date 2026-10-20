<?php
if (isset($_POST['estilo'])) {
    $estilo_seleccionado = $_POST['estilo'];
    setcookie('estilo', $estilo_seleccionado, time() + (86400 * 30), "/");
} else {
    $estilo_seleccionado = $_COOKIE['estilo'] ?? 'defecto.css';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 - Estilos</title>
    <link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($estilo_seleccionado); ?>">
</head>
<body>
    <h2>Selecciona el estilo visual de la página:</h2>
    <form action="estilos.php" method="post">
        <select name="estilo">
            <option value="rojo.css" <?php if($estilo_seleccionado == 'rojo.css') echo 'selected'; ?>>Estilo Rojo</option>
            <option value="azul.css" <?php if($estilo_seleccionado == 'azul.css') echo 'selected'; ?>>Estilo Azul</option>
            <option value="verde.css" <?php if($estilo_seleccionado == 'verde.css') echo 'selected'; ?>>Estilo Verde</option>
        </select>
        <button type="submit">Guardar estilo</button>
    </form>
</body>
</html>
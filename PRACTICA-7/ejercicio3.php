<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
    setcookie('ultimo_usuario', $usuario, time() + (86400 * 30), "/");
} else {
    $usuario = $_COOKIE['ultimo_usuario'] ?? '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 - Usuario</title>
</head>
<body>
    <h2>Carga de Usuario</h2>
    <form action="usuario.php" method="post">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($usuario); ?>" required>
        <button type="submit">Guardar Cookie</button>
    </form>
</body>
</html>
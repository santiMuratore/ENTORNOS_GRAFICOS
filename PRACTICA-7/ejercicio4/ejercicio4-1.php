<?php
if (isset($_POST['titular'])) {
    $titular = $_POST['titular'];
    setcookie('titular_preferido', $titular, time() + (86400 * 30), "/");
} else {
    $titular = $_COOKIE['titular_preferido'] ?? 'todos';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4 - Periódico</title>
</head>
<body>
    <h1>El Periódico Digital</h1>
    
    <form action="periodico.php" method="post">
        <p>Selecciona tu tipo de titular preferido:</p>
        <label><input type="radio" name="titular" value="politica" <?php if($titular == 'politica') echo 'checked'; ?>> Noticia política</label><br>
        <label><input type="radio" name="titular" value="economica" <?php if($titular == 'economica') echo 'checked'; ?>> Noticia económica</label><br>
        <label><input type="radio" name="titular" value="deportiva" <?php if($titular == 'deportiva') echo 'checked'; ?>> Noticia deportiva</label><br><br>
        <button type="submit">Configurar</button>
    </form>

    <hr>

    <?php if ($titular == 'todos' || $titular == 'politica'): ?>
        <div><h3>Noticia Política</h3><p>Congreso aprueba nuevas leyes presupuestarias.</p></div>
    <?php endif; ?>

    <?php if ($titular == 'todos' || $titular == 'economica'): ?>
        <div><h3>Noticia Económica</h3><p>Los mercados responden positivamente tras el último balance.</p></div>
    <?php endif; ?>

    <?php if ($titular == 'todos' || $titular == 'deportiva'): ?>
        <div><h3>Noticia Deportiva</h3><p>La selección nacional consigue una victoria clave.</p></div>
    <?php endif; ?>

    <hr>
    <p><a href="borrar_cookie.php">Borrar preferencia de titular</a></p>
</body>
</html>
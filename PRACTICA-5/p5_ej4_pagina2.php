<?php
// PRÁCTICA 5 - Ejercicio 4: página 2 del sitio.
// Lo primero es incluir el contador de sesión (antes de escribir cualquier texto).
include("contador_sesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página 2</title>
</head>
<body>
    <h1>Página 2</h1>
    <p>
        <a href="p5_ej4_pagina1.php">Página 1</a> |
        <a href="p5_ej4_pagina2.php">Página 2</a> |
        <a href="p5_ej4_pagina3.php">Página 3</a>
    </p>
    <p>Páginas visitadas en esta sesión: <b><?php echo $_SESSION['paginas_visitadas']; ?></b></p>
</body>
</html>

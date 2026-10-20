<?php
/*
 * PRÁCTICA 5 - Ejercicio 4: contador_sesion.php
 * Contar las páginas visitadas por un usuario durante su sesión.
 *
 * Se incluye con include al principio de CADA página del sitio, antes de
 * escribir cualquier texto (session_start() debe ejecutarse antes de enviar
 * cualquier salida al navegador).
 *
 * Cada vez que el usuario carga una página, el contador guardado en
 * $_SESSION aumenta en 1 y se conserva mientras dure la sesión (hasta cerrar
 * el navegador o destruirla con session_destroy()).
 */
session_start();

if (!isset($_SESSION['paginas_visitadas'])) {
    $_SESSION['paginas_visitadas'] = 0;
}
$_SESSION['paginas_visitadas']++;
?>

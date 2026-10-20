<?php
/*
 * PRÁCTICA 6 - Ejercicio 2: conexion.php
 *
 * Archivo común que abre la conexión con MySQL y selecciona la base de datos
 * "Capitales". Todas las páginas del ABML lo incluyen con require.
 *
 * Modificar los datos de conexión según el servidor local (en XAMPP el
 * usuario es "root" y la contraseña está vacía).
 */
$servidor = "localhost";
$usuario  = "root";
$clave    = "";
$basedatos = "Capitales";

// PHP 8.1+ lanza excepciones en mysqli por defecto; se desactivan para
// manejar los errores con "or die(mysqli_error(...))" como en el apunte.
mysqli_report(MYSQLI_REPORT_OFF);

// Abrir la conexión con el servidor
$link = mysqli_connect($servidor, $usuario, $clave)
    or die("No se pudo conectar con el servidor: " . mysqli_connect_error());

// Seleccionar la base de datos
mysqli_select_db($link, $basedatos)
    or die("No se pudo seleccionar la base de datos: " . mysqli_error($link));

// Para que los acentos se vean bien
mysqli_set_charset($link, "utf8mb4");
?>

<?php
/*
 * PRÁCTICA 4 - Ejercicio 5: contador.php
 * Analizar el ejemplo "Contador de visitas a una página web".
 *
 * ANÁLISIS:
 *  1. Define el archivo contador.dat donde se acumula el total de visitas.
 *  2. Lo abre en modo lectura ("r"), lee su contenido con fread (usando
 *     filesize como longitud) y lo cierra.
 *  3. Lo vuelve a abrir en modo escritura ("w", que lo vacía), le suma 1 al
 *     contador, lo guarda con fwrite y lo cierra.
 *  4. Muestra el total de visitas en pantalla.
 *
 * A TENER EN CUENTA:
 *  - contador.dat tiene que existir, con un valor inicial (por ej. 0) y con
 *    permisos de lectura y escritura. Si está vacío, filesize devuelve 0 y
 *    fread falla.
 *  - El enunciado usa la etiqueta corta, que requiere short_open_tag
 *    habilitado. Es más seguro usar la etiqueta completa, como acá.
 *  - Cuenta cada carga de la página (no visitantes únicos) y puede haber
 *    problemas si dos usuarios acceden a la vez (se podría usar flock).
 */

// Archivo para acumular el numero de visitas
$archivo = "contador.dat";
// Abrir el archivo para lectura
$abrir = fopen($archivo, "r");
// Leer el contenido del archivo
$cont = fread($abrir, filesize($archivo));
// Cerrar el archivo
fclose($abrir);
// Abrir nuevamente el archivo para escritura
$abrir = fopen($archivo, "w");
// Agregar 1 visita
$cont = $cont + 1;
// Guardar la modificación
$guardar = fwrite($abrir, $cont);
// Cerrar el archivo
fclose($abrir);
// Mostrar el total de visitas
echo "<font face='arial' size='3'>Cantidad de visitas:".$cont."</font>";
?>

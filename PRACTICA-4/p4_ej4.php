<?php
/*
 * PRÁCTICA 4 - Ejercicio 4
 * Si el archivo datos.php contiene $color = 'blanco'; y $flor = 'clavel';
 * indicar las salidas que produce el siguiente código. Justificar.
 *
 * (1) El primer echo se ejecuta ANTES del include, cuando $flor y $color
 *     todavía no existen. Se interpolan como vacías (PHP además emite un
 *     warning de "variable indefinida"). Imprime: "El  " y un salto de línea.
 *
 * include 'datos.php' ejecuta ese archivo en este punto del script y las
 * variables quedan definidas en el mismo ámbito.
 *
 * (2) El segundo echo se ejecuta DESPUÉS del include, ahora las variables
 *     existen. Imprime: " El clavel blanco".
 *
 * SALIDA:
 *   El
 *    El clavel blanco
 * (En el navegador el \n se ve como un espacio: "El El clavel blanco")
 */
echo "El $flor $color \n";
include 'datos.php';
echo " El $flor $color";
?>

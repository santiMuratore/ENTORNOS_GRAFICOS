<?php
/*
 * PRÁCTICA 4 - Ejercicio 1
 * Identificar en el código: variables y su tipo, operadores, funciones y
 * parámetros, estructuras de control y cuál es la salida por pantalla.
 *
 * ---------------------------------------------------------------------
 * VARIABLES Y SU TIPO
 *   $a = TRUE   -> boolean
 *   $b = "xyz"  -> string
 *   $c = 'xyz'  -> string
 *   $d = 12     -> integer
 *   $f, $g      -> integer (resultado de cálculos)
 *   $i          -> parámetro de doble(); variable local de la función (integer)
 *
 * OPERADORES
 *   =          asignación
 *   +=         asignación compuesta ($d += 4 y $f += 10)
 *   *          aritmético (multiplicación)
 *   ++         incremento (preincremento ++$d y postincremento $d++)
 *   ? :        ternario
 *
 * FUNCIONES Y PARÁMETROS
 *   doble($i)       definida por el usuario, 1 parámetro, devuelve $i*2
 *   gettype($var)   propia del lenguaje, devuelve el tipo de la variable
 *   is_int($var)    propia del lenguaje, true si es integer
 *   is_string($var) propia del lenguaje, true si es string
 *
 * ESTRUCTURAS DE CONTROL
 *   if (is_int($d))     -> true, entonces $d = 12 + 4 = 16
 *   if (is_string($a))  -> false ($a es boolean), no imprime nada
 *   $d = $a ? ++$d : $d*3 -> $a es true, entonces ++$d => $d = 17
 *
 * EJECUCIÓN PASO A PASO
 *   gettype($a..$d) imprime: boolean string string integer
 *   $d = 17
 *   $f = doble($d++)  -> se llama doble(17) = 34 y después $d pasa a 18
 *   $g = $f += 10     -> $f = 44 y $g = 44
 *   echo $a, $b, $c, $d, $f, $g -> 1 xyz xyz 18 44 44  (true se imprime como 1)
 *
 * SALIDA POR PANTALLA:
 *   booleanstringstringinteger1xyzxyz184444
 * ---------------------------------------------------------------------
 */

function doble($i) {
    return $i*2;
}
$a = TRUE;
$b = "xyz";
$c = 'xyz';
$d = 12;
echo gettype($a);
echo gettype($b);
echo gettype($c);
echo gettype($d);
if (is_int($d)) {
    $d += 4;
}
if (is_string($a)) {
    echo "Cadena: $a";
}
$d = $a ? ++$d : $d*3;
$f = doble($d++);
$g = $f += 10;
echo $a, $b, $c, $d, $f , $g;
?>

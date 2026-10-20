<?php
/*
 * PRÁCTICA 4 (arrays, funciones) - Ejercicio 2
 * En cada caso, indicar las salidas correspondientes.
 *
 * a) Salida: bar1
 *    $matriz["x"] es "bar" y $matriz[12] es true, que se imprime como 1.
 *
 * b) Salida: 5942
 *    $matriz["unamatriz"][6] = 5, [13] = 9 y ["a"] = 42.
 *
 * c) No produce salida (no hay echo).
 *    Evolución: [5=>1, 12=>2] -> se agrega [13=>56] (siguiente índice entero)
 *    -> se agrega ["x"=>42] -> unset($matriz[5]) elimina la clave 5
 *    -> unset($matriz) destruye la variable completa.
 */

// a)
echo "a) ";
$matriz = array("x" => "bar", 12 => true);
echo $matriz["x"];
echo $matriz[12];
echo "<br>";

// b)
echo "b) ";
$matriz = array("unamatriz" => array(6 => 5, 13 => 9, "a" => 42));
echo $matriz["unamatriz"][6];
echo $matriz["unamatriz"][13];
echo $matriz["unamatriz"]["a"];
echo "<br>";

// c)
echo "c) (sin salida)";
$matriz = array(5 => 1, 12 => 2);
$matriz[] = 56;
$matriz["x"] = 42;
unset($matriz[5]);
unset($matriz);
?>

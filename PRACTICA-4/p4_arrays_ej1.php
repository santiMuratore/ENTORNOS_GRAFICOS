<?php
/*
 * PRÁCTICA 4 (arrays, funciones) - Ejercicio 1
 * Indicar si los siguientes códigos son equivalentes.
 *
 * SON EQUIVALENTES. En ambos casos el valor 4 se agrega sin clave, y PHP le
 * asigna el siguiente índice entero disponible; como no hay claves enteras
 * previas, es el 0.
 * Resultado en los dos casos:
 *   ['color'=>'rojo','sabor'=>'dulce','forma'=>'redonda','nombre'=>'manzana', 0=>4]
 */

// Código 1
$a = array( 'color' => 'rojo',
            'sabor' => 'dulce',
            'forma' => 'redonda',
            'nombre' => 'manzana',
            4
          );

// Código 2
$b['color']  = 'rojo';
$b['sabor']  = 'dulce';
$b['forma']  = 'redonda';
$b['nombre'] = 'manzana';
$b[]         = 4;

// Comprobación
echo "<pre>";
print_r($a);
print_r($b);
echo "¿Son iguales? ";
var_dump($a === $b);
echo "</pre>";
?>

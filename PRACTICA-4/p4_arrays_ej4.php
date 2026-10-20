<?php
/*
 * PRÁCTICA 4 (arrays, funciones) - Ejercicio 4
 * Analizar la función y escribir un script para probar su funcionamiento.
 *
 * ANÁLISIS: la función valida un nombre de usuario en dos pasos:
 *  1. Longitud: debe tener entre 3 y 20 caracteres; si no, informa que no es
 *     válido y devuelve false.
 *  2. Caracteres: recorre el string y verifica con strpos que cada carácter
 *     esté en la lista de permitidos (letras mayúsculas y minúsculas, dígitos,
 *     guion "-" y guion bajo "_"). Si encuentra uno no permitido, informa que
 *     no es válido y devuelve false.
 *  Si pasa ambas validaciones, informa que es válido y devuelve true.
 *
 * Nota: la cadena $permitidos tiene que estar en una sola línea.
 */
function comprobar_nombre_usuario($nombre_usuario){
    // compruebo que el tamaño del string sea válido.
    if (strlen($nombre_usuario) < 3 || strlen($nombre_usuario) > 20){
        echo $nombre_usuario . " no es válido<br>";
        return false;
    }

    // compruebo que los caracteres sean los permitidos
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
    for ($i = 0; $i < strlen($nombre_usuario); $i++){
        if (strpos($permitidos, substr($nombre_usuario, $i, 1)) === false){
            echo $nombre_usuario . " no es válido<br>";
            return false;
        }
    }
    echo $nombre_usuario . " es válido<br>";
    return true;
}

// SCRIPT DE PRUEBA
// Resultados esperados: válido, inválido, válido, inválido, inválido,
// inválido, válido.
$pruebas = array(
    "juan_perez",                  // válido
    "ab",                          // inválido: muy corto
    "usuario-123",                 // válido
    "nombre con espacios",         // inválido: espacios
    "pérez",                       // inválido: carácter 'é'
    "estenombretienemasdeveinte",  // inválido: muy largo
    "Ana_2026"                     // válido
);

foreach ($pruebas as $nombre) {
    $resultado = comprobar_nombre_usuario($nombre);
    echo "Retorna: " . ($resultado ? "true" : "false") . "<br><br>";
}
?>

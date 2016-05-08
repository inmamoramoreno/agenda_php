<?php

/**
 * Funcion para leer el contenido entero del archivo
 * @return array Array de elementos leidos
 */
function readArchivo()
{
    $archivo = fopen("../data/datos.txt", "r");
    $lineas = array();

    while (!feof($archivo)) {
        $linea = fgets($archivo);
        if (!empty($linea)) {
            array_push($lineas, $linea);
        }
    }

    fclose($archivo);

    return $lineas;
}

/**
 * Funcion para añadir un array al archivo entero
 * @param $lineas
 */
function writeArchivo($lineas)
{

    borrarArchivo();

    $archivo = fopen("../data/datos.txt", "a");

    foreach ($lineas as $linea) {
        fwrite($archivo, $linea);
    }
    fclose($archivo);
}

/**
 * Funcion para borrar el contenido del archivo por completo
 */
function borrarArchivo()
{
    $archivo = fopen("../data/datos.txt", "w");
    fwrite($archivo, "");
    fclose($archivo);
}

/**
 * Funcion para escribir una linea en archivo
 * @param $linea
 */
function writeLinea($linea)
{
    $archivo = fopen("../data/datos.txt", "a");
    fwrite($archivo, $linea . "\n");
    fclose($archivo);
}

?>
<?php


require "globales.php";
require "menu.php";
require "listar.php";

function buscarContent()
{
    $encontrados = buscar();
    mostrarLista($encontrados, false);
}


/**
 * Funcion de busqueda en el archivo, devuelve el array de lineas que contienen la
 * cadena buscada por formulario
 * @return array
 */
function buscar()
{
    $encontrados = [];

    if (isset($_POST["buscar"])) {

        $texto = $_POST["busqueda"];

        if (strcmp($texto, "") == 0) {
            print "Por favor escriba algo";
        } else {

            $lineas = readArchivo();

            foreach ($lineas as $linea) {
                if (strstr($linea, $texto) != false) {
                    array_push($encontrados, $linea);
                }
            }
        }
    }
    return $encontrados;
}

//======================================================================

cabecera();
menu();

require "../forms/buscar_form.php";

buscarContent();
pie();

?>
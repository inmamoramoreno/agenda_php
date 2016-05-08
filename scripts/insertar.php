<?php

require "globales.php";
require "menu.php";
require "archivo.php";
require "validaciones.php";

//Nombres de campos de formulario
define("FIELD_EMPRESA", "EMPRESA");
define("FIELD_DIRECCION", "DIRECCION");
define("FIELD_NOMBRE", "NOMBRE");
define("FIELD_TELEFONO", "TELEFONO");
define("FIELD_DNI", "DNI");
define("FIELD_CORREO", "CORREO");
define("FIELD_ESPECIALIDAD", "ESPECIALIDAD");
define("FIELD_ESPECIALIDAD_1_VALUE", "Informática");
define("FIELD_ESPECIALIDAD_2_VALUE", "Química");


define("NAVIGATE_TO_AGENDA","Location:agenda.php");
define("NAVIGATE_TO_INSERTAR","Location:insertar.php");

/**
 * Funcion encargada de insertar los datos en el archivo validandolos previamente
 */
function insertar()
{

    if (isset($_POST["guardar"])) {

        if (validar()) {

            $linea = "";
            $linea = addToLinea($linea, FIELD_DNI);//para el id

            $linea = addToLinea($linea, FIELD_EMPRESA);
            $linea = addToLinea($linea, FIELD_DIRECCION);
            $linea = addToLinea($linea, FIELD_NOMBRE);
            $linea = addToLinea($linea, FIELD_TELEFONO);
            $linea = addToLinea($linea, FIELD_DNI);
            $linea = addToLinea($linea, FIELD_CORREO);
            $linea = addToLinea($linea, FIELD_ESPECIALIDAD);

            writeLinea($linea);

            //vuelve a la pantalla de agenda
            cleanSessionValidationData();
            header(NAVIGATE_TO_AGENDA);

        }else{
            header(NAVIGATE_TO_INSERTAR);
        }
    }
}


/**
 * Funcion que añade a un String un atributo del POST si viene relleno
 * @param $linea
 * @param $atributo
 * @return string
 */
function addToLinea($linea, $atributo)
{

    if (isset($_POST[$atributo])) {
        $linea = $linea . str_replace("\n","",$_POST[$atributo]) . ":";
    }

    return $linea;
}

//======================================================================
//Impresion
cabecera();
menu();
require "../forms/insertar_form.php";
pie();

//======================================================================
//Ejecucion
insertar();

?>
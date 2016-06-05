<?php

require dirname(__FILE__)."/../../controller/InsertarController.php";

$insertarInstance = new InsertarController();
//1. imprimo la pantalla ()
$insertarInstance->render();

$insertarInstance->insertar();

//
//
///**
// * Funcion encargada de insertar los datos en el archivo validandolos previamente
// */
//function insertar()
//{
//
//    if (isset($_POST["guardar"])) {
//
//        if (validar()) {
//
//            $linea = "";
//            $linea = addToLinea($linea, FIELD_DNI);//para el id
//
//            $linea = addToLinea($linea, FIELD_EMPRESA);
//            $linea = addToLinea($linea, FIELD_DIRECCION);
//            $linea = addToLinea($linea, FIELD_NOMBRE);
//            $linea = addToLinea($linea, FIELD_TELEFONO);
//            $linea = addToLinea($linea, FIELD_DNI);
//            $linea = addToLinea($linea, FIELD_CORREO);
//            $linea = addToLinea($linea, FIELD_ESPECIALIDAD);
//
//            writeLinea($linea);
//
//            //vuelve a la pantalla de agenda
//            cleanSessionValidationData();
//            header(NAVIGATE_TO_AGENDA);
//
//        }else{
//            header(NAVIGATE_TO_INSERTAR);
//        }
//    }
//}
//
//
///**
// * Funcion que añade a un String un atributo del POST si viene relleno
// * @param $linea
// * @param $atributo
// * @return string
// */
//function addToLinea($linea, $atributo)
//{
//
//    if (isset($_POST[$atributo])) {
//        $linea = $linea . str_replace("\n","",$_POST[$atributo]) . ":";
//    }
//
//    return $linea;
//}
//
////======================================================================
////Impresion
//cabecera();
//menu();
//require "../forms/insertar_form.php";
//pie();
//
////======================================================================
////Ejecucion
//insertar();

?>
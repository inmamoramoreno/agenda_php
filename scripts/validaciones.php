<?php

//Nombres de arrays auxiliares en SESSION
define("VALIDATION_MSG_ARRAY", "VALIDATION_ARRAY");
define("VALIDATION_DATA_ARRAY", "VALIDATION_DATA_ARRAY");

//Mensajes de error de validación
define("VAL_ERROR_NOMBRE", "Cadena de texto no válida (sólo se permiten letras, debe ser de al menos 3 caracteres y comenzar en mayúsculas)");
define("VAL_ERROR_TELEFONO", "Teléfono no válido");
define("VAL_ERROR_DNI", "DNI no válido");
define("VAL_ERROR_CORREO", "Email no válido");
define("VAL_ERROR_BLANK_FIELD", "Campo requerido vacío");

/**
 * Funcion para guardar en sesion un mensaje de error para mostrarlo en pantalla
 * @param $campo
 * @param $msg
 */
function insertValidationError($campo, $msg)
{

    if (!array_key_exists(VALIDATION_MSG_ARRAY, $_SESSION)) {
        $_SESSION[VALIDATION_MSG_ARRAY] = array();
    }
    $_SESSION[VALIDATION_MSG_ARRAY][$campo] = $msg;
}

/**
 * Funcion para guardar un valor de un campo en sesión para no perderlo después de un POST
 * @param $campo
 * @param $msg
 */
function insertValueInSession($campo, $msg)
{

    if (!array_key_exists(VALIDATION_DATA_ARRAY, $_SESSION)) {
        $_SESSION[VALIDATION_DATA_ARRAY] = array();
    }

    $_SESSION[VALIDATION_DATA_ARRAY][$campo] = $msg;
}

/**
 * Funcion parar mostrar un mensaje de error en la pantalla de insercion
 * @param $campo
 */
function showValidationError($campo)
{
    if (array_key_exists(VALIDATION_MSG_ARRAY, $_SESSION)
        && array_key_exists($campo, $_SESSION[VALIDATION_MSG_ARRAY])
    ) {
        print "<div class='four columns mensaje-error'>" .
            $_SESSION[VALIDATION_MSG_ARRAY][$campo] .
            "</div>";
    }
}

/**
 * Funcion para mostrar un dato (almacenado en sesion) en la pantalla de inserción
 * @param $campo
 */
function showValueInSession($campo)
{
    if (array_key_exists(VALIDATION_DATA_ARRAY, $_SESSION)
        && array_key_exists($campo, $_SESSION[VALIDATION_DATA_ARRAY])
    ) {
        print $_SESSION[VALIDATION_DATA_ARRAY][$campo];
    }
}

/**
 * Funcion para vaciar los arrays temporales de sesion
 */
function cleanSessionValidationData()
{
    $_SESSION[VALIDATION_MSG_ARRAY] = array();
    $_SESSION[VALIDATION_DATA_ARRAY] = array();
}

/**
 * Funcion general para validar el formulario de creacion de nueva persona
 * @return bool|int|void
 */
function validar()
{
    $valido = true;

    cleanSessionValidationData();

    $valido &= genericValidator(FIELD_EMPRESA, $_POST[FIELD_EMPRESA], "");
    $valido &= genericValidator(FIELD_DIRECCION, $_POST[FIELD_DIRECCION], "");
    $valido &= genericValidator(FIELD_NOMBRE, $_POST[FIELD_NOMBRE], VAL_ERROR_NOMBRE);
    $valido &= genericValidator(FIELD_TELEFONO, $_POST[FIELD_TELEFONO], VAL_ERROR_TELEFONO);
    $valido &= genericValidator(FIELD_DNI, $_POST[FIELD_DNI], VAL_ERROR_DNI);
    $valido &= genericValidator(FIELD_CORREO, $_POST[FIELD_CORREO], VAL_ERROR_CORREO);
    //$valido &= genericValidator(FIELD_ESPECIALIDAD, $_POST[FIELD_ESPECIALIDAD], "");

    return $valido;
}

/**
 * Funcion que valida si un campo es vacio
 * @param $campo
 * @param $cadena
 * @return bool
 */
function validarTextoVacio($campo, $cadena)
{
    insertValueInSession($campo, $cadena);

    if (is_null($cadena) || empty($cadena)) {
        insertValidationError($campo, VAL_ERROR_BLANK_FIELD);
        $valid = false;
    } else {
        $valid = true;
    }
    return $valid;
}

/**
 * Funcion encargada de validar un campo
 * @param $campo
 * @param $valor
 * @param $mensajeError
 * @return bool|int
 */
function genericValidator($campo, $valor, $mensajeError)
{
    $valid = validarTextoVacio($campo, $valor);
    if ($valid) {
        $valid = concreteValidator($campo, $valor);
        if (!$valid) {
            insertValidationError($campo, $mensajeError);
        }
    }
    return $valid;
}

/**
 * Funcion encargada de validar datos especificos
 * @param $campo
 * @param $valor
 * @return bool|int
 */
function concreteValidator($campo, $valor)
{
    $valid = true;

    switch ($campo) {
        case FIELD_NOMBRE: {

            $pattern = '/^[A-Z][a-zñÑáéíóúÁÉÍÓÚÄËÏÖÜäëïöüàèìòùÀÈÌÔÙ, ]{2,}$/';
            $valid = preg_match($pattern, $valor);

            break;
        }
        case FIELD_TELEFONO: {

            $valid = preg_match('/^[9|8|6|7][0-9]{8}$/', $valor);

            break;
        }
        case FIELD_DNI: {

            $letra = substr($valor, -1);
            $numeros = substr($valor, 0, -1);

            $valid = substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra
                && strlen($letra) == 1
                && strlen($numeros) == 8;
            break;
        }
        case FIELD_CORREO: {

            $pattern = '/^[A-z0-9_\-.]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/';
            $valid = preg_match($pattern, $valor);

            break;
        }
    }
    return $valid;
}

?>
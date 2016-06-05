<?php

/**
 * Class ValidacionService
 */
class ValidacionService
{

    /**
     * Funcion general para validar el formulario de creacion de nuevo registro
     * @param $recordDto
     * @return bool|int
     */
    public function validar($recordDto)
    {
        $valido = true;

        $this->cleanSessionValidationData();

        $valido &= $this->genericValidator(IFields::FIELD_EMPRESA, $recordDto->getEmpresa(), "");
        $valido &= $this->genericValidator(IFields::FIELD_DIRECCION, $recordDto->getDireccion(), "");
        $valido &= $this->genericValidator(IFields::FIELD_NOMBRE, $recordDto->getNombre(), IMessages::VAL_ERROR_NOMBRE);
        $valido &= $this->genericValidator(IFields::FIELD_TELEFONO, $recordDto->getTelefono(), IMessages::VAL_ERROR_TELEFONO);
        $valido &= $this->genericValidator(IFields::FIELD_DNI, $recordDto->getDNI(), IMessages::VAL_ERROR_DNI);
        $valido &= $this->genericValidator(IFields::FIELD_CORREO, $recordDto->getCorreo(), IMessages::VAL_ERROR_CORREO);

        return $valido;
    }

    /**
     * Funcion para vaciar los arrays temporales de sesion
     */
    public function cleanSessionValidationData()
    {
        $_SESSION[IFields::VALIDATION_MSG_ARRAY] = array();
        $_SESSION[IFields::VALIDATION_DATA_ARRAY] = array();
    }

    /**
     * Funcion para guardar en sesion un mensaje de error para mostrarlo en pantalla
     * @param $campo
     * @param $msg
     */
    private function insertValidationError($campo, $msg)
    {

        if (!array_key_exists(IFields::VALIDATION_MSG_ARRAY, $_SESSION)) {
            $_SESSION[IFields::VALIDATION_MSG_ARRAY] = array();
        }
        $_SESSION[IFields::VALIDATION_MSG_ARRAY][$campo] = $msg;
    }

    /**
     * Funcion para guardar un valor de un campo en sesión para no perderlo después de un POST
     * @param $campo
     * @param $msg
     */
    private  function insertValueInSession($campo, $msg)
    {

        if (!array_key_exists(IFields::VALIDATION_DATA_ARRAY, $_SESSION)) {
            $_SESSION[IFields::VALIDATION_DATA_ARRAY] = array();
        }

        $_SESSION[IFields::VALIDATION_DATA_ARRAY][$campo] = $msg;
    }

    /**
     * Funcion que valida si un campo es vacio
     * @param $campo
     * @param $cadena
     * @return bool
     */
    private function validarTextoVacio($campo, $cadena)
    {
        $this->insertValueInSession($campo, $cadena);

        if (is_null($cadena) || empty($cadena)) {
            $this->insertValidationError($campo, IMessages::VAL_ERROR_BLANK_FIELD);
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
    private function genericValidator($campo, $valor, $mensajeError)
    {
        $valid = $this->validarTextoVacio($campo, $valor);
        if ($valid) {
            $valid = $this->concreteValidator($campo, $valor);
            if (!$valid) {
                $this->insertValidationError($campo, $mensajeError);
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
    private function concreteValidator($campo, $valor)
    {
        $valid = true;

        switch ($campo) {
            case IFields::FIELD_NOMBRE: {

                $pattern = '/^[A-Z][a-zñÑáéíóúÁÉÍÓÚÄËÏÖÜäëïöüàèìòùÀÈÌÔÙ, ]{2,}$/';
                $valid = preg_match($pattern, $valor);

                break;
            }
            case IFields::FIELD_TELEFONO: {

                $valid = preg_match('/^[9|8|6|7][0-9]{8}$/', $valor);

                break;
            }
            case IFields::FIELD_DNI: {

                $letra = substr($valor, -1);
                $numeros = substr($valor, 0, -1);

                $valid = substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra
                    && strlen($letra) == 1
                    && strlen($numeros) == 8;
                break;
            }
            case IFields::FIELD_CORREO: {

                $pattern = '/^[A-z0-9_\-.]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/';
                $valid = preg_match($pattern, $valor);

                break;
            }
        }
        return $valid;
    }





}
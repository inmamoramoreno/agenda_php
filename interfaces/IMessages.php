<?php

/**
 * Created by PhpStorm.
 * User: neome
 * Date: 05/06/2016
 * Time: 16:42
 */
interface IMessages
{
    //----------------------------------------------------------------
    //Mensajes de Login
    const LOGIN_ERROR = "Usuario no registrado";
    //----------------------------------------------------------------
    //Mensajes de Logout
    const LOGOUT_DISCONNECT = "Desconectar";
    const LOGOUT_EXIT = "¿Está seguro de querer salir?";
    //----------------------------------------------------------------
    //Mensajes de Buscar
    const SEARCH_TITLE = "Buscar una persona";
    const SEARCH_PROMPT = "Introduce una cadena para buscar:";
    const SEARCH_EMPTY_TEXT = "Por favor escriba algo";
    const SEARCH_NO_RESULT = "No se han encontrado elementos";
    //----------------------------------------------------------------
    //Mensajes de Validacion
    const VAL_ERROR_NOMBRE = "Cadena de texto no válida (sólo se permiten letras, debe ser de al menos 3 caracteres y comenzar en mayúsculas)";
    const VAL_ERROR_TELEFONO = "Teléfono no válido";
    const VAL_ERROR_DNI = "DNI no válido";
    const VAL_ERROR_CORREO = "Email no válido";
    const VAL_ERROR_BLANK_FIELD = "Campo requerido vacío";


    //----------------------------------------------------------------
    //Mensajes de Mysql
    const MYSQL_CONNECTION_ERROR = "Error: No puede conectarse a la base de datos ";
    const MYSQL_ERROR = "Error en la consulta";

}
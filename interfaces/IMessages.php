<?php

/**
 * Interface IMessages
 */
interface IMessages
{
    //----------------------------------------------------------------
    //Mensajes de Login
    const LOGIN_TITLE = "Acceso Usuarios";
    const LOGIN_FIELD_USER = "Usuario:";
    const LOGIN_FIELD_PASS = "Password:";
    const LOGIN_BUTTON = "Login";
    const LOGIN_ERROR = "Usuario no registrado";
    //----------------------------------------------------------------
    //Mensajes de Agenda
    const AGENDA_TITLE = "Agenda";
    //----------------------------------------------------------------
    //Elementos de menu
    const MENU_ADD = "Añadir";
    const MENU_LIST = "Listar";
    const MENU_SEARCH = "Buscar";
    const MENU_DELETE = "Borrar todo";
    const MENU_LOGOUT = "Desconectar";
    //----------------------------------------------------------------
    //Mensajes de Logout
    const LOGOUT_DISCONNECT = "Desconectar";
    const LOGOUT_EXIT = "¿Está seguro de querer salir?";
    const LOGOUT_YES = "SÍ";
    const LOGOUT_NO = "NO";
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
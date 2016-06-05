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
    //Mensajes de Mysql
    const MYSQL_CONNECTION_ERROR = "Error: No puede conectarse a la base de datos ";
    const MYSQL_ERROR = "Error en la consulta";

}
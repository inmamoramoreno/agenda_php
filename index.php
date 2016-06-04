<?php

require "dao/UsuarioDao.php";
require "scripts/globales.php";
require "scripts/validaciones.php";

define("PATH_LOGIN", "data/usuario.txt");

define("FIELD_USER", "usuario");
define("FIELD_PASSWORD", "password");
define("COLUMN_USER", "NOMBRE");
define("COLUMN_PASSWORD", "PASSWORD");

define("NAVIGATE_TO_AGENDA", "Location:scripts/agenda.php");

define("LOGIN_ERROR", "Usuario no registrado");

/**
 * Funcion encargada de validar al usuario y navegar a agenda.php si es correcto
 */
function login()
{
    if (isset($_POST["ok"])) {
        $usuario = $_POST[FIELD_USER];
        $password = $_POST[FIELD_PASSWORD];

        $usuarioDao = new UsuarioDao;
        $registrado = $usuarioDao->usuarioRegistrado($usuario, $password);
        $usuarioDao->close();

        if ($registrado) {
            $_SESSION[FIELD_USER] = $usuario;
            header(NAVIGATE_TO_AGENDA);
        } else {
            echo LOGIN_ERROR;
        }
    }
}

//======================================================================
//Impresion

cabecera();
require "forms/index_form.php";
pie();

//======================================================================
//Ejecucion

login();

?>
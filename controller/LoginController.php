<?php

require "CommonController.php";
require dirname(__FILE__)."/../dao/UsuarioDao.php";

define("FIELD_USER", "usuario");
define("FIELD_PASSWORD", "password");
define("COLUMN_USER", "NOMBRE");
define("COLUMN_PASSWORD", "PASSWORD");

define("NAVIGATE_TO_AGENDA", "Location:view/pages/agenda.php");

define("LOGIN_ERROR", "Usuario no registrado");

/**
 * Class LoginController
 */
class LoginController extends CommonController
{
    /**
     * Funcion encargada de validar al usuario y navegar a agenda.php si es correcto
     */
    public function login()
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


    /**
     * Metodo para mostrar el contenido HTML del login
     */
    public function renderInternal()
    {
        print "
        <div>
            <div class='cabecera'>
                <h2>Acceso Usuarios</h2>
            </div>

            <form id=\"index-form\" method=\"post\">

                <div class=\"row\">
                    <div class=\"two columns\"><label for=\"usuario\">Usuario:</label></div>
                    <div class=\"six columns\">
                        <input id=\"usuario\" name=\"".FIELD_USER."\" type=\"text\"
                               class=\"u-full-width\">
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"two columns\"><label for=\"password\">Password:</label></div>
                    <div class=\"six columns\">
                        <input id=\"password\" name=\"".FIELD_PASSWORD."\" type=\"password\"
                               class=\"u-full-width\">
                    </div>
                </div>

                <input type=\"submit\" value=\"Login\" name=\"ok\" class=\"button-primary\">
            </form>
        </div>";
    }
}
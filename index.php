<?php

require "scripts/globales.php";
require "scripts/validaciones.php";

define("PATH_LOGIN","data/usuario.txt");

define("FIELD_USER","usuario");
define("FIELD_PASSWORD","password");
define("NAVIGATE_TO_AGENDA","Location:scripts/agenda.php");

define("LOGIN_ERROR","Usuario no registrado");

function login()
{
    if (isset($_POST["ok"])) {
        $usuario = $_POST[FIELD_USER];
        $password = $_POST[FIELD_PASSWORD];

        $archivo = fopen(PATH_LOGIN, "r");
        $encontrado = false;
        while (!feof($archivo)) {
            $linea = fgets($archivo);
            $vector = explode(":", $linea);
            if (strcmp($usuario, $vector[0]) == 0 && strcmp($password, $vector[1]) == 0) {
                $encontrado = true;
                break;
            }
        }
        fclose($archivo);
        if ($encontrado) {
            $_SESSION[FIELD_USER] = $usuario;
            header(NAVIGATE_TO_AGENDA);
        } else {
            echo LOGIN_ERROR;
        }
    }
}

//======================================================================

cabecera();
require "forms/index_form.php";
pie();
login();

?>
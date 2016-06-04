<?php

require "globales.php";
require "menu.php";

/**
 * Funcion encargada de desconectar al usuario
 */
function logout()
{
    if ($_POST != array()) {
        if (isset($_POST["logout-si"])) {
            session_destroy();
            global $db;
            $db = null;
            header('Location:../index.php');
        }else {
            //vuelve a la pantalla de agenda
            header('Location:agenda.php');
        }
    }
}

//======================================================================
//Impresion

cabecera();
menu();
require "../forms/logout_form.php";
pie();

//======================================================================
//Ejecucion

logout();

?>
<?php

require "globales.php";
require "menu.php";

function logoutContent()
{
    if ($_POST != array()) {
        if (isset($_POST["logout-si"])) {
            session_destroy();
            header('Location:../index.php');
        }else {
            //vuelve a la pantalla de agenda
            header('Location:agenda.php');
        }
    }
}

//======================================================================

cabecera();
menu();

require "../forms/logout_form.php";

logoutContent();
pie();

?>
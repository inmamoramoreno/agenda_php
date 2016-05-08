<?php

require "globales.php";
require "menu.php";
require "archivo.php";

function borrarTodoContent()
{
    if ($_POST != array()) {
        if (isset($_POST["borrar-todo-si"])) {
            borrarArchivo();
        }
        //vuelve a la pantalla de agenda
        header('Location:agenda.php');
    }
}

//======================================================================

cabecera();
menu();

require "../forms/borrar_todo_form.php";

borrarTodoContent();
pie();

?>
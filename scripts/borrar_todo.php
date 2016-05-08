<?php

require "globales.php";
require "menu.php";
require "archivo.php";

/**
 * Funcion encargada de borrar el archivo si se le da a que SÍ en el formulario
 */
function borrarTodo()
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
//Impresion
cabecera();
menu();
require "../forms/borrar_todo_form.php";
pie();

//======================================================================
//Ejecucion
borrarTodo();

?>
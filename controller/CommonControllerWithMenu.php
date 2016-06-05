<?php

require "CommonController.php";

/**
 * Created by PhpStorm.
 * User: neome
 * Date: 05/06/2016
 * Time: 13:56
 */
abstract class CommonControllerWithMenu extends CommonController
{
    /**
     * Metodo publico para renderizar HTML en pantalla
     */
    public function renderMenu()
    {
        /*Si no hay usuario en sesion, debemos forzar a ir a index para que se conecte de nuevo
        (esto puede suceder cuando hay varias pestañas abiertas de la aplicacion y una de ellas
        cierra sesión)
        */
        if (strcmp($_SESSION['usuario'], "")==0) {
            header('Location:../index.php');
        } else {

            print "<div>
    <div class='cabecera'>
        <h2>Agenda " . $_SESSION['usuario'] . "</h2>
    </div>
        <nav class='barra-navegacion'>
            <ul>
                <li> <a href='view/pages/insertar.php'>Añadir</a></li>
                <li> <a href='view/pages/agenda.php'>Listar</a></li>
                <li> <a href='view/pages/buscar.php'>Buscar</a></li>
                <li> <a href='view/pages/borrar_todo.php'>Borrar todo</a></li>
                <li> <a href='view/pages/logout.php'>Desconectar</a></li>
            </ul>
        </nav>
    </div>";
        }
    }

    /**
     * Metodo generico para imprimir todas las paginas
     */
    public function render(){
        $this->cabecera();
        $this->renderMenu();
        $this->renderInternal();
        $this->pie();
    }
}
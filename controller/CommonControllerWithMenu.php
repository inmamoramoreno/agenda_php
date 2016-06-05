<?php

require "CommonController.php";
require dirname(__FILE__) . "/../dto/UsuarioDto.php";

/**
 * Class CommonControllerWithMenu
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
        if (is_null($_SESSION[IFields::FIELD_USUARIO])) {
            header(INavigationPaths::NAVIGATE_TO_LOGIN);
        } else {

            print "<div>
    <div class='cabecera'>
        <h2>Agenda " . $_SESSION[IFields::FIELD_USUARIO]->getUsuario() . "</h2>
    </div>
        <nav class='barra-navegacion'>
            <ul>
                <li> <a href='view/pages/insertar.php'>" . IMessages::MENU_ADD . "</a></li>
                <li> <a href='view/pages/agenda.php'>" . IMessages::MENU_LIST . "</a></li>
                <li> <a href='view/pages/buscar.php'>" . IMessages::MENU_SEARCH . "</a></li>
                <li> <a href='view/pages/borrar_todo.php'>" . IMessages::MENU_DELETE . "</a></li>
                <li> <a href='view/pages/logout.php'>" . IMessages::MENU_LOGOUT . "</a></li>
            </ul>
        </nav>
    </div>";
        }
    }

    /**
     * Metodo generico para imprimir todas las paginas
     */
    public function render()
    {
        $this->cabecera();
        $this->renderMenu();
        $this->renderInternal();
        $this->pie();
    }
}
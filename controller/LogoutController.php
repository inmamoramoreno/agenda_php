<?php

require "CommonControllerWithMenu.php";

/**
 * Class LogoutController
 */
class LogoutController extends CommonControllerWithMenu
{

    /**
     * Metodo de desconexion
     */
    public function logout()
    {
        if ($_POST != array()) {
            if (isset($_POST["logout-si"])) {
                session_destroy();
                header(INavigationPaths::NAVIGATE_TO_LOGIN);
            } else {
                //vuelve a la pantalla de agenda
                header(INavigationPaths::NAVIGATE_TO_AGENDA);
            }
        }
    }

    /**
     * Metodo especifico de cada pagina para mostrar su contenido
     * @return mixed
     */
    public function renderInternal()
    {
        print "
        <div>

            <h4>" . IMessages::LOGOUT_DISCONNECT . "</h4>

            <form id=\"desconectar-form\" method=\"post\" action=\"\">

                <div class=\"row mensaje-confirmacion\">" .
            IMessages::LOGOUT_EXIT .
            "</div>
                <div class=\"row\">
                    <input type=\"submit\" value=\"" . IMessages::LOGOUT_YES . "\" name=\"logout-si\" class=\"button-primary\">
                    <input type=\"submit\" value=\"" . IMessages::LOGOUT_NO . "\" name=\"logout-no\" class=\"button\">
                </div>
            </form>

        </div>";
    }
}
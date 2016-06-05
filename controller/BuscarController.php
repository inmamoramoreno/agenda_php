<?php

require "AgendaController.php";

/**
 * Created by PhpStorm.
 * User: neome
 * Date: 05/06/2016
 * Time: 18:33
 */
class BuscarController extends AgendaController
{
    /**
     * @return mixed
     */
    public function buscar()
    {
        $records = array();

        if (isset($_POST["buscar"])) {

            $texto = $_POST["busqueda"];

            if (strcmp($texto, "") == 0) {
                print IMessages::SEARCH_EMPTY_TEXT;
            } else {

                $records = $this->getAgendaService()->buscar($texto);

                $this->cabecera();
                if (empty($records)) {
                    print IMessages::SEARCH_NO_RESULT;
                } else {
                    $this->mostrarLista($records, false);
                }
                $this->pie();
            }
        }
    }

    /*
     * Metodo especifico de cada pagina para mostrar su contenido
     * @return mixed
     */
    public function renderInternal()
    {
        print "<div>

    <h5>".IMessages::SEARCH_TITLE."</h5>

    <form id=\"buscar-form\" method=\"post\" action=\"\">

        <div class=\"row\">
            <div class=\"four columns\"><label for=\"busqueda\">".IMessages::SEARCH_PROMPT."</label></div>
            <div class=\"six columns\"><input id=\"busqueda\" name=\"busqueda\" type=\"text\" class=\"u-full-width\">
            </div>
            <div class=\"two columns\"><input type=\"submit\" value=\"Buscar\" name=\"buscar\" class='button-primary u-full-width'>
            </div>
        </div>

    </form>
</div>";
    }
}
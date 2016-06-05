<?php

require "AgendaController.php";

/**
 * Class BuscarController
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
                $this->cabecera();
                print IMessages::SEARCH_EMPTY_TEXT;
                $this->pie();
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
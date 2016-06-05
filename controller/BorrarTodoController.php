<?php

require "CommonControllerWithMenu.php";
require dirname(__FILE__) . "/../service/AgendaService.php";

/**
 * Class BorrarTodoController
 */
class BorrarTodoController extends CommonControllerWithMenu
{
    private $agendaService;

    /**
     * BorrarTodoController constructor.
     */
    public function __construct()
    {
        $this->setAgendaService(new AgendaService());
    }

    /**
     * Metodo encargado de llamar al servicio de agenda para borrar
     */
    public function borrarTodo()
    {
        if ($_POST != array()) {
            if (isset($_POST["borrar-todo-si"])) {
                $this->getAgendaService()->deleteAll();
            }
            //vuelve a la pantalla de agenda
            header(INavigationPaths::NAVIGATE_TO_AGENDA);
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

    <h4>Borrar todo</h4>

    <form id=\"borrar-todo-form\" method=\"post\" action=\"\">

        <div class=\"row mensaje-error mensaje-confirmacion\">
            ¿Está seguro de querer borrar todo? Esta operación no se puede deshacer.
        </div>
        <div class=\"row\">
            <input type=\"submit\" value=\"SÍ\" name=\"borrar-todo-si\" class=\"button-primary\">
            <input type=\"submit\" value=\"NO\" name=\"borrar-todo-no\" class=\"button\">
        </div>
    </form>
</div>";
    }

    /**
     * @return mixed
     */
    public function getAgendaService()
    {
        return $this->agendaService;
    }

    /**
     * @param mixed $agendaService
     */
    public function setAgendaService($agendaService)
    {
        $this->agendaService = $agendaService;
    }
}
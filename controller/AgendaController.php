<?php

require "CommonControllerWithMenu.php";
require dirname(__FILE__) . "/../service/AgendaService.php";

/**
 * Class AgendaController
 */
class AgendaController extends CommonControllerWithMenu
{

    private $agendaService;

    /**
     * AgendaController constructor.
     */
    public function __construct()
    {
        $this->setAgendaService(new AgendaService());
    }

    /**
     * Metodo especifico de cada pagina para mostrar su contenido
     * @return mixed
     */
    public function renderInternal()
    {
        $records = $this->getAgendaService()->listar();
        $this->mostrarLista($records, true);
    }

    /**
     * Funcion encargada de imprimir la tabla en HTML
     * @param $records
     * @param $mostrarEliminar
     */
    protected function mostrarLista($records, $mostrarEliminar)
    {
        print "<form method='post' action=''>";
        if ($records != array()) {
            print "<table>
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Dirección</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>DNI</th>
                    <th>Correo</th>
                    <th>Especialidad</th>";
            if ($mostrarEliminar) {
                print   "<th> </th>";
            }

            print   "</tr>
            </thead>
            <tbody>";

            foreach ($records as $r) {

                print "<tr>\n";
                print $r->toString();
                //Imprimo el check para seleccionar para eliminar
                if ($mostrarEliminar) {
                    print "
                        <td>
                            <input type='checkbox' name='id_" . $r->getId() . "'>
                        </td>
                    </tr>";
                }
            }
            print "</tbody>
        </table>";

            if ($mostrarEliminar) {
                print "<input type='submit' value='Eliminar' name='eliminar' class='button-primary'>";
            }
            print "</form>";

            if (sizeof($records) == 1) {
                print "Se ha encontrado " . sizeof($records) . " elemento</br>";
            } else {
                print "Se han encontrado " . sizeof($records) . " elementos</br>";
            }
        }
    }

    public function deleteRecord()
    {
        if (isset($_POST["eliminar"])) {

            //Ejemplo: id_5 --> 5 y se almacena en $id
            foreach ($_POST as $key => $value) {
                if (strstr($key, 'id_')) {
                    $id = str_replace('id_', '', $key);
                    $this->getAgendaService()->deleteRecord($id);
                }
            }
            //vuelve a la pantalla de agenda (recargar)
            header(INavigationPaths::NAVIGATE_TO_AGENDA);
        }
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
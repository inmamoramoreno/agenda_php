<?php

require "CommonControllerWithMenu.php";

require dirname(__FILE__) . "/../service/AgendaService.php";

//Nombres de campos de formulario
define("FIELD_EMPRESA", "EMPRESA");
define("FIELD_DIRECCION", "DIRECCION");
define("FIELD_NOMBRE", "NOMBRE");
define("FIELD_TELEFONO", "TELEFONO");
define("FIELD_DNI", "DNI");
define("FIELD_CORREO", "CORREO");
define("FIELD_ESPECIALIDAD", "ESPECIALIDAD");
define("FIELD_ESPECIALIDAD_1_VALUE", "Informática");
define("FIELD_ESPECIALIDAD_2_VALUE", "Química");


define("NAVIGATE_TO_AGENDA", "Location:agenda.php");
define("NAVIGATE_TO_INSERTAR", "Location:insertar.php");

class InsertarController extends CommonControllerWithMenu
{
    private $record;
    private $agendaService;


    /**
     * InsertarController constructor.
     */
    public function __construct()
    {
        $this->setRecord(new Record());
        $this->setAgendaService(new AgendaService());
    }

    /**
     * Metodo encargado de llamar al servicio de agenda para guardar el registro
     */
    public function insertar()
    {
        if (isset($_POST["guardar"])) {

            //validar()
            if (true) {

                //rellenar el dto
                $this->generateRecord();

                $this->getAgendaService()->guardarRecord($this->getRecord());
                //vuelve a la pantalla de agenda
                //cleanSessionValidationData();
                $this->setRecord(new Record());
                header(NAVIGATE_TO_AGENDA);
            } else {
                header(NAVIGATE_TO_INSERTAR);
            }
        }
    }

    /**
     * Metodo encargado de obtener el valor de un atributo del objeto POST
     * @param $atributo
     * @return string
     */
    private function getAttr($atributo)
    {
        $valor = "";
        if (isset($_POST[$atributo])) {
            $valor = $_POST[$atributo];
        }

        return $valor;
    }

    /**
     * Metodo encargado de generar un dtocon los datos de pantalla
     */
    private function generateRecord(){

        $this->getRecord()->setEmpresa($this->getAttr(FIELD_EMPRESA));
        $this->getRecord()->setDireccion($this->getAttr(FIELD_DIRECCION));
        $this->getRecord()->setNombre($this->getAttr(FIELD_NOMBRE));
        $this->getRecord()->setTelefono($this->getAttr(FIELD_TELEFONO));
        $this->getRecord()->setDNI($this->getAttr(FIELD_DNI));
        $this->getRecord()->setCorreo($this->getAttr(FIELD_CORREO));
        $this->getRecord()->setEspecialidad($this->getAttr(FIELD_ESPECIALIDAD));
    }


    /**
     * Metodo especifico de cada pagina para mostrar su contenido
     * @return mixed
     */
    public function renderInternal()
    {
        print "
<div>
    <h4>Insertar nueva persona</h4>

    <form id=\"insertar-form\" method=\"post\" action=\"\" novalidate>

        <div class=\"row\">
            <div class=\"two columns\"><label for=\"empresa\">Empresa:</label></div>
            <div class=\"six columns\">
                <input id=\"empresa\" name=\"" . FIELD_EMPRESA . "\" type=\"text\"
                       class=\"u-full-width\" value=\"" . $this->getRecord()->getEmpresa() . "\">
            </div>

</div>

<div class=\"row\">
    <div class=\"two columns\"><label for=\"direccion\">Dirección:</label></div>
    <div class=\"six columns\">
                <textarea class=\"u-full-width\" id=\"direccion\"
                          name=\"" . FIELD_DIRECCION . "\">" .
            $this->getRecord()->getDireccion() . "</textarea>
    </div>

</div>

<div class=\"row\">
    <div class=\"two columns\"><label for=\"nombre\">Nombre:</label></div>
    <div class=\"six columns\">
        <input id=\"nombre\" name=\"" . FIELD_NOMBRE . "\" type=\"text\"
               class=\"u-full-width\" value=\"" . $this->getRecord()->getNombre() . "\">
    </div>

</div>

<div class=\"row\">
    <div class=\"two columns\"><label for=\"telefono\">Teléfono:</label></div>
    <div class=\"six columns\">
        <input id=\"telefono\" name=\"" . FIELD_TELEFONO . "\" type=\"text\"
               class=\"u-full-width\" value=\"" . $this->getRecord()->getTelefono() . "\">
    </div>

</div>

<div class=\"row\">
    <div class=\"two columns\"><label for=\"dni\">DNI:</label></div>
    <div class=\"six columns\">
        <input id=\"dni\" name=\"" . FIELD_DNI . "\" type=\"password\"
               class=\"u-full-width\" value=\"" . $this->getRecord()->getDNI() . "\">
    </div>

</div>

<div class=\"row\">
    <div class=\"two columns\"><label for=\"correo\">Correo:</label></div>
    <div class=\"six columns\">
        <input id=\"correo\" name=\"" . FIELD_CORREO . "\" type=\"email\"
               class=\"u-full-width\" value=\"" . $this->getRecord()->getCorreo() . "\">
    </div>

</div>

<div class=\"row\">
    <div class=\"two columns\"><label>Introduce el Sector:</label></div>
    <div class=\"six columns\">
        <div class=\"row\">
            <label>
                <input id=\"esp1\" type=\"radio\" name=\"" . FIELD_ESPECIALIDAD . "\"
                       value=\"" . FIELD_ESPECIALIDAD_1_VALUE . "\">
                <span class=\"label-body\">" . FIELD_ESPECIALIDAD_1_VALUE . "</span>
            </label>
        </div>
        <div class=\"row\">
            <label>
                <input id=\"esp2\" type=\"radio\" name=\"" . FIELD_ESPECIALIDAD . "\"
                       value=\"" . FIELD_ESPECIALIDAD_2_VALUE . "\">
                <span class=\"label-body\">" . FIELD_ESPECIALIDAD_2_VALUE . "</span>
            </label>
        </div>
    </div>

</div>
<input type=\"submit\" value=\"Insertar\" name=\"guardar\" class=\"button-primary\">
</form>
</div>";
    }

    /**
     * @return mixed
     */
    public function getRecord()
    {
        return $this->record;
    }

    /**
     * @param mixed $record
     */
    public function setRecord($record)
    {
        $this->record = $record;
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
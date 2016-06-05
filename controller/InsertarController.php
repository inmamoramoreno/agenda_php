<?php

require "CommonControllerWithMenu.php";
require dirname(__FILE__) . "/../service/AgendaService.php";
require dirname(__FILE__) . "/../service/ValidacionService.php";

class InsertarController extends CommonControllerWithMenu
{
    private $record;
    private $agendaService;
    private $validacionService;

    /**
     * InsertarController constructor.
     */
    public function __construct()
    {
        $this->setRecord(new Record());
        $this->setAgendaService(new AgendaService());
        $this->setValidacionService(new ValidacionService());
    }

    /**
     * Metodo encargado de llamar al servicio de agenda para guardar el registro
     */
    public function insertar()
    {
        if (isset($_POST["guardar"])) {

            //rellenar el dto
            $this->generateRecord();

            $valido = $this->getValidacionService()->validar($this->getRecord());

            if ($valido) {
                $this->getAgendaService()->guardarRecord($this->getRecord());
                //vuelve a la pantalla de agenda
                //cleanSessionValidationData();
                $this->setRecord(new Record());
                header(INavigationPaths::NAVIGATE_TO_AGENDA);
            } else {
                header(INavigationPaths::NAVIGATE_TO_INSERTAR);
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
    private function generateRecord()
    {

        $this->getRecord()->setEmpresa($this->getAttr(IFields::FIELD_EMPRESA));
        $this->getRecord()->setDireccion($this->getAttr(IFields::FIELD_DIRECCION));
        $this->getRecord()->setNombre($this->getAttr(IFields::FIELD_NOMBRE));
        $this->getRecord()->setTelefono($this->getAttr(IFields::FIELD_TELEFONO));
        $this->getRecord()->setDNI($this->getAttr(IFields::FIELD_DNI));
        $this->getRecord()->setCorreo($this->getAttr(IFields::FIELD_CORREO));
        $this->getRecord()->setEspecialidad($this->getAttr(IFields::FIELD_ESPECIALIDAD));
    }

    /**
     * Funcion parar mostrar un mensaje de error en la pantalla de insercion
     * @param $campo
     * @return string
     */
    function showValidationError($campo)
    {
        $msgError = "";
        if (array_key_exists(IFields::VALIDATION_MSG_ARRAY, $_SESSION)
            && array_key_exists($campo, $_SESSION[IFields::VALIDATION_MSG_ARRAY])
        ) {
            $msgError = "<div class='four columns mensaje-error'>" .
                $_SESSION[IFields::VALIDATION_MSG_ARRAY][$campo] .
                "</div>";
        }
        return $msgError;
    }

    /**
     * Funcion para mostrar un dato (almacenado en sesion) en la pantalla de inserción
     * @param $campo
     * @return string
     */
    function showValueInSession($campo)
    {
        $msgValue = "";
        if (array_key_exists(IFields::VALIDATION_DATA_ARRAY, $_SESSION)
            && array_key_exists($campo, $_SESSION[IFields::VALIDATION_DATA_ARRAY])
        ) {
            $msgValue = $_SESSION[IFields::VALIDATION_DATA_ARRAY][$campo];
        }
        return $msgValue;
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
                <input id=\"empresa\" name=\"" . IFields::FIELD_EMPRESA . "\" type=\"text\"
                       class=\"u-full-width\" value=\"" . $this->showValueInSession(IFields::FIELD_EMPRESA) . "\">
            </div>" .
            $this->showValidationError(IFields::FIELD_EMPRESA) . "
</div>

<div class=\"row\">
    <div class=\"two columns\"><label for=\"direccion\">Dirección:</label></div>
    <div class=\"six columns\">
                <textarea class=\"u-full-width\" id=\"direccion\"
                          name=\"" . IFields::FIELD_DIRECCION . "\">" .
            $this->showValueInSession(IFields::FIELD_DIRECCION) . "</textarea>
    </div>" .
            $this->showValidationError(IFields::FIELD_DIRECCION) . "
</div>

<div class=\"row\">
    <div class=\"two columns\"><label for=\"nombre\">Nombre:</label></div>
    <div class=\"six columns\">
        <input id=\"nombre\" name=\"" . IFields:: FIELD_NOMBRE . "\" type=\"text\"
               class=\"u-full-width\" value=\"" . $this->showValueInSession(IFields::FIELD_NOMBRE) . "\">
    </div>".
    $this->showValidationError(IFields::FIELD_NOMBRE) ."
</div>

<div class=\"row\">
    <div class=\"two columns\"><label for=\"telefono\">Teléfono:</label></div>
    <div class=\"six columns\">
        <input id=\"telefono\" name=\"" . IFields::FIELD_TELEFONO . "\" type=\"text\"
               class=\"u-full-width\" value=\"" . $this->showValueInSession(IFields::FIELD_TELEFONO) . "\">
    </div>".
            $this->showValidationError(IFields::FIELD_TELEFONO) ."
</div>

<div class=\"row\">
    <div class=\"two columns\"><label for=\"dni\">DNI:</label></div>
    <div class=\"six columns\">
        <input id=\"dni\" name=\"" . IFields::FIELD_DNI . "\" type=\"password\"
               class=\"u-full-width\" value=\"" .$this->showValueInSession(IFields::FIELD_DNI). "\">
    </div>".
            $this->showValidationError(IFields::FIELD_DNI) ."
</div>

<div class=\"row\">
    <div class=\"two columns\"><label for=\"correo\">Correo:</label></div>
    <div class=\"six columns\">
        <input id=\"correo\" name=\"" . IFields::FIELD_CORREO . "\" type=\"email\"
               class=\"u-full-width\" value=\"" . $this->showValueInSession(IFields::FIELD_CORREO) . "\">
    </div>".
            $this->showValidationError(IFields::FIELD_CORREO) ."
</div>

<div class=\"row\">
    <div class=\"two columns\"><label>Introduce el Sector:</label></div>
    <div class=\"six columns\">
        <div class=\"row\">
            <label>
                <input id=\"esp1\" type=\"radio\" name=\"" . IFields::FIELD_ESPECIALIDAD . "\"
                       value=\"" . IFields::FIELD_ESPECIALIDAD_1_VALUE . "\">
                <span class=\"label-body\">" . IFields::FIELD_ESPECIALIDAD_1_VALUE . "</span>
            </label>
        </div>
        <div class=\"row\">
            <label>
                <input id=\"esp2\" type=\"radio\" name=\"" . IFields::FIELD_ESPECIALIDAD . "\"
                       value=\"" . IFields::FIELD_ESPECIALIDAD_2_VALUE . "\">
                <span class=\"label-body\">" . IFields::FIELD_ESPECIALIDAD_2_VALUE . "</span>
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

    /**
     * @return mixed
     */
    public function getValidacionService()
    {
        return $this->validacionService;
    }

    /**
     * @param mixed $validacionService
     */
    public function setValidacionService($validacionService)
    {
        $this->validacionService = $validacionService;
    }
}
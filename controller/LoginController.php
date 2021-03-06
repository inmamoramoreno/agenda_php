<?php


require "CommonController.php";
require dirname(__FILE__) . "/../service/UsuarioService.php";

/**
 * Class LoginController
 */
class LoginController extends CommonController
{

    private $usuarioService;

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->setUsuarioService(new UsuarioService());
    }

    /**
     * Funcion encargada de validar al usuario y navegar a agenda.php si es correcto
     */
    public function login()
    {
        if (isset($_POST["ok"])) {

            $usuarioDto = $this->generateUsuarioDto();
            $usuarioDto = $this->getUsuarioService()->buscarUsuario($usuarioDto);

            if ($usuarioDto != false) {
                $_SESSION[IFields::FIELD_USUARIO] = $usuarioDto;
                header(INavigationPaths::NAVIGATE_TO_AGENDA_FROM_LOGIN);
            } else {
                $this->cabecera();
                print IMessages::LOGIN_ERROR;
                $this->pie();
            }
        }
    }

    /**
     * Metodo encargado de construir un UsuarioDto
     * @return UsuarioDto
     */
    private function generateUsuarioDto()
    {

        $usuarioDto = new UsuarioDto();

        $usuarioDto->setUsuario($_POST[IFields::FIELD_USUARIO]);
        $usuarioDto->setPassword($_POST[IFields::FIELD_PASSWORD]);

        return $usuarioDto;
    }

    /**
     * Metodo para mostrar el contenido HTML del login
     */
    public function renderInternal()
    {
        print "
        <div>
            <div class='cabecera'>
                <h2>".IMessages::LOGIN_TITLE."</h2>
            </div>

            <form id=\"index-form\" method=\"post\">

                <div class=\"row\">
                    <div class=\"two columns\"><label for=\"usuario\">".IMessages::LOGIN_FIELD_USER."</label></div>
                    <div class=\"six columns\">
                        <input id=\"usuario\" name=\"" . IFields::FIELD_USUARIO . "\" type=\"text\"
                               class=\"u-full-width\">
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"two columns\"><label for=\"password\">".IMessages::LOGIN_FIELD_PASS."</label></div>
                    <div class=\"six columns\">
                        <input id=\"password\" name=\"" . IFields::FIELD_PASSWORD . "\" type=\"password\"
                               class=\"u-full-width\">
                    </div>
                </div>

                <input type=\"submit\" value=\"".IMessages::LOGIN_BUTTON."\" name=\"ok\" class=\"button-primary\">
            </form>
        </div>";
    }

    /**
     * @return mixed
     */
    public function getUsuarioService()
    {
        return $this->usuarioService;
    }

    /**
     * @param mixed $usuarioService
     */
    public function setUsuarioService($usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }


}
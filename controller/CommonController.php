<?php

require dirname(__FILE__) . "/../interfaces/INavigationPaths.php";
require dirname(__FILE__) . "/../interfaces/IFields.php";
require dirname(__FILE__) . "/../interfaces/IMessages.php";

/**
 * Class CommonController
 */
abstract class CommonController
{
    /**
     * Funcion cabecera utilizable en todos los PHP para generar el inicio del HTML
     */
    protected function cabecera()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }

        print "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <base href='/'>
            <meta charset='UTF-8'>
            <title>Agenda</title>
            <link rel='stylesheet' href='view/css/skeleton/normalize.css'>
            <link rel='stylesheet' href='view/css/skeleton/skeleton.css'>
            <link rel='stylesheet' href='view/css/agenda.css'>
        </head>
        <body>

        <div class='container'>";
    }

    /**
     * Funcion pie utilizable en todos los PHP para generar el fin del HTML
     */
    protected function pie()
    {
        print "</div>
        </body>
        </html>";
    }

    /**
     * Metodo generico para imprimir todas las paginas
     */
    public function render(){
        $this->cabecera();
        $this->renderInternal();
        $this->pie();
    }

    /**
     * Metodo especifico de cada pagina para mostrar su contenido
     * @return mixed
     */
    public abstract function renderInternal();
}
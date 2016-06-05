<?php

/**
 * Created by PhpStorm.
 * User: neome
 * Date: 05/06/2016
 * Time: 12:09
 */
abstract class CommonController
{
    /**
     * Funcion cabecera utilizable en todos los PHP para generar el inicio del HTML
     */
    private function cabecera()
    {
        session_start();
        //Uso de la global
        global $usuarioDao;

        if ($usuarioDao != null) {
            $usuarioDao = new UsuarioDao;
        }
        global $agendaDao;

        if ($agendaDao != null) {
            $agendaDao = new AgendaDao;
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
    private function pie()
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
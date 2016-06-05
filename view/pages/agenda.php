<?php

require dirname(__FILE__)."/../../controller/AgendaController.php";

$agendaInstance = new AgendaController();
//1. imprimo la pantalla (internamente llama a listar)
$agendaInstance->render();

?>
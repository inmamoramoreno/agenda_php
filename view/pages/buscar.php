<?php

require dirname(__FILE__) . "/../../controller/BuscarController.php";

$buscarInstance = new BuscarController();
//1. imprimo la pantalla
$buscarInstance->render();
//2. Ejecuto buscar
$buscarInstance->buscar();

?>
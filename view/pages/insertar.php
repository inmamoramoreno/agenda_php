<?php

require dirname(__FILE__)."/../../controller/InsertarController.php";

$insertarInstance = new InsertarController();
//1. imprimo la pantalla
$insertarInstance->render();
//2. Ejecuto insertar
$insertarInstance->insertar();

?>
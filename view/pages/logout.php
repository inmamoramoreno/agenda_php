<?php

require dirname(__FILE__)."/../../controller/LogoutController.php";

$logoutInstance = new LogoutController();
//1. imprimo la pantalla
$logoutInstance->render();
//2. Ejecuto logout
$logoutInstance->logout();

?>
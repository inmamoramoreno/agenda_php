<?php

require "controller/LoginController.php";

$loginInstance = new LoginController;
//1. imprimo la pantalla
$loginInstance->render();
//2. Ejecuto login
$loginInstance->login();

?>
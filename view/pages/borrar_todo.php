<?php

require dirname(__FILE__)."/../../controller/BorrarTodoController.php";

$borrarTodoInstance = new BorrarTodoController();
//1. imprimo la pantalla ()
$borrarTodoInstance->render();
//2. Ejecuto Borrar
$borrarTodoInstance->borrarTodo();

?>
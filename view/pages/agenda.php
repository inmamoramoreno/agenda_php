<?php

require dirname(__FILE__)."/../../controller/AgendaController.php";

$agendaInstance = new AgendaController();
//1. imprimo la pantalla (internamente llama a listar)
$agendaInstance->render();



//
///**
// * Funcion encargada de eliminar del archivo a todas las personas seleccionadas
// */
//function eliminar()
//{
//    if (isset($_POST["eliminar"])) {
//
//        //1. Obtenemos los id para borrar del archivo desde el $_POST
//        $idsToDelete = array();
//
//        //Ejemplo: id_84071663Q --> 84071663Q y se almacena en $x
//        foreach ($_POST as $key => $value) {
//            if (strstr($key, 'id_')) {
//                $x = str_replace('id_', '', $key);
//                array_push($idsToDelete, $x);
//            }
//        }
//
//        //2. Leemos el archivo completo
//        $lineasDeArchivo = readArchivo();
//
//        //3. filtrar las lineas para escribir las que no se borran
//        $lineasDeArchivoFiltered = array();
//
//        foreach ($lineasDeArchivo as $linea) {
//            if (!esLineaParaBorrar($linea, $idsToDelete)) {
//                array_push($lineasDeArchivoFiltered, $linea);
//            }
//        }
//
//        //4.Escribir las que no se borran
//        writeArchivo($lineasDeArchivoFiltered);
//
//        //vuelve a la pantalla de agenda (recargar)
//        header('Location:agenda.php');
//    }
//}
//
///**
// * Funcion encargada de calcular si una linea debe ser borrada o no (en funcion de su id)
// * @param $linea
// * @param $idsToDelete
// * @return bool
// */
//function esLineaParaBorrar($linea, $idsToDelete)
//{
//    $borrar = false;
//
//    $trozos = explode(":", $linea);
//    $id = $trozos[0];
//
//    //Itero por los id que se van a borrar para localizar si el id de la linea pasada
//    //por param está dentro de este conjunto o no.
//    //si está, quiere decir que es para borrar (devuelvo true) si no se devuelve false
//    foreach ($idsToDelete as $id_i) {
//        if (strcmp($id_i, $id) == 0) {
//            $borrar = true;
//            break;
//        }
//    }
//    return $borrar;
//}
//
////======================================================================
////Impresion
//
//cabecera();
//menu();
//listarContent(true);
//pie();
//
////======================================================================
////Ejecucion
//eliminar();

?>
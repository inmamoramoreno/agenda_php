<?php

require "globales.php";
require "menu.php";
require "listar.php";

function agendaContent()
{
/*
    $archivo = fopen("../data/datos.txt", "r");

    print "<form method='post' action=''>";

    print "<table class='u-full-width'>
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Dirección</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>DNI</th>
                    <th>Correo</th>
                    <th>Especialidad</th>
                    <th></th><!--Es para el check de borrado-->
                </tr>
            </thead>
            <tbody>";

    while (!feof($archivo)) {
        $linea = fgets($archivo);
        if (!empty($linea)) {

            $persona = explode(":", $linea);

            $indice = array_shift($persona);

            print "<tr>\n";
            foreach ($persona as &$campo) {
                print "<td>" . $campo . "</td>";
            }

            $maxColumns = 7;

            for ($i = sizeof($persona); $i < $maxColumns; $i++) {
                print "<td> </td>";
            }

            print "<td>
                    <input type='checkbox' name='id_" . $indice . "'>
                </td>
            </tr>";
        }
    }

    print "</tbody>
        </table>";
    fclose($archivo);

*/
    listarContent(true);

    print "<input type='submit' value='Eliminar' name='eliminar' class='button-primary'>";
    print "</form>";
}



function eliminar()
{
    if (isset($_POST["eliminar"])) {

        //1. Obtenemos los id para borrar del archivo desde el $_POST
        $idsToDelete = [];

        foreach ($_POST as $key => $value) {
            if (strstr($key, 'id_')) {
                $x = str_replace('id_', '', $key);
                array_push($idsToDelete, $x);
            }
        }

        print "LINEAS PARA ELIMINAR: ";

        foreach ($idsToDelete as $id) {
            print $id . " ";
        }

        //2. Leemos el archivo completo
        $lineasDeArchivo = readArchivo();

        //3. filtrar las lineas para escribir las que no se borran
        $lineasDeArchivoFiltered = [];

        foreach ($lineasDeArchivo as $linea) {
            if (!esLineaParaBorrar($linea, $idsToDelete)) {
                array_push($lineasDeArchivoFiltered, $linea);
            }
        }

        //4.Escribir las que no se borran
        foreach ($lineasDeArchivoFiltered as $linea) {
            print "ARCHIVO FINAL: " . $linea . "\n";
        }

        writeArchivo($lineasDeArchivoFiltered);

        //vuelve a la pantalla de agenda(recargar)
        header('Location:agenda.php');
    }
}

function esLineaParaBorrar($linea, $idsToDelete)
{

    $borrar = false;

    $trozos = explode(":", $linea);
    $id = $trozos[0];

    foreach ($idsToDelete as $id_i) {
        print "[compare ##" . $id_i . "##" . $id . "##]";
        if (strcmp($id_i, $id) == 0) {
            $borrar = true;
            break;
        }
    }
    return $borrar;
}

//======================================================================

cabecera();
menu();
listarContent(true);
eliminar();
pie();

?>
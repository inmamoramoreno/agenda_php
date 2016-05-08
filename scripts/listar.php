<?php

require "archivo.php";

define("NUM_FIELDS", 7);

function listarContent($mostrarEliminar)
{
    $leidos = readArchivo();
    mostrarLista($leidos, $mostrarEliminar);
}

function mostrarLista($leidos, $mostrarEliminar)
{
    print "<form method='post' action=''>";
    if ($leidos != array()) {
        print "<table>
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Dirección</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>DNI</th>
                    <th>Correo</th>
                    <th>Especialidad</th>";
        if ($mostrarEliminar) {
            print   "<th> </th>";
        }

        print   "</tr>
            </thead>
            <tbody>";

        foreach ($leidos as $linea) {
            $persona = explode(":", $linea);

            $indice = array_shift($persona);

            print "<tr>\n";
            $n = 0;
            foreach ($persona as &$campo) {
                $n++;
                if ($n <= NUM_FIELDS) {
                    print "<td>" . $campo . "</td>";
                }
            }

            if ($mostrarEliminar) {
                print "<td>
                    <input type='checkbox' name='id_" . $indice . "'>
                </td>
            </tr>";
            }

        }
        print "</tbody>
        </table>";

        if ($mostrarEliminar) {
            print "<input type='submit' value='Eliminar' name='eliminar' class='button-primary'>";
        }
        print "</form>";

        if (sizeof($leidos) == 1) {
            print "Se ha encontrado " . sizeof($leidos) . " elemento</br>";
        } else {
            print "Se han encontrado " . sizeof($leidos) . " elementos</br>";
        }
    }
}

?>
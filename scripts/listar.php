<?php

require "archivo.php";

define("NUM_FIELDS", 7);

/**
 * Funcion encargada de mostrar la lista de usuarios completa
 * @param $mostrarEliminar Boolean para controlar que se muestre elboton de eliminar
 */
function listarContent($mostrarEliminar)
{
    $leidos = readArchivo();
    mostrarLista($leidos, $mostrarEliminar);
}

/**
 * Funcion encargada de imprimir la tabla en HTML
 * @param $leidos
 * @param $mostrarEliminar
 */
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

            //Elimino el ultimo elemento que siempre es vacio
            array_pop($persona);

            //Almaceno el indice para poder usarlo en el check de eliminar
            $indice = array_shift($persona);

            print "<tr>\n";

            foreach ($persona as $campo) {
                print "<td>" . $campo . "</td>";
            }

            //Relleno con celdas vacias para personas que no tengan todos los datos rellenos
            //evitando asi que se descuadre la tabla
            $n = sizeof($persona);
            while ($n < NUM_FIELDS) {
                print "<td></td>";
                $n++;
            }

            //Imprimo el check para seleccionar para eliminar
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
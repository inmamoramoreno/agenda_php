<?php

/**
 * Funcion encargada de imprimir el menu en todas las paginas cuando se esta logado
 */
function menu()
{
    /*Si no hay usuario en sesion, debemos forzar a ir a index para que se conecte de nuevo
    (esto puede suceder cuando hay varias pestañas abiertas de la aplicacion y una de ellas
    cierra sesión)
    */
    if (strcmp($_SESSION['usuario'], "")==0) {
        header('Location:../index.php');
    } else {

        print "<div>
    <div class='cabecera'>
        <h2>Agenda " . $_SESSION['usuario'] . "</h2>
    </div>
        <nav class='barra-navegacion'>
            <ul>
                <li> <a href='scripts/insertar.php'>Añadir</a></li>
                <li> <a href='scripts/agenda.php'>Listar</a></li>
                <li> <a href='scripts/buscar.php'>Buscar</a></li>
                <li> <a href='scripts/borrar_todo.php'>Borrar todo</a></li>
                <li> <a href='scripts/logout.php'>Desconectar</a></li>
            </ul>
        </nav>
    </div>";
    }
}

?>
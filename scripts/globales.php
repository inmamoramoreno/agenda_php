<?php

/**
 * Funcion cabecera utilizable en todos los PHP para generar el inicio del HTML
 */
function cabecera()
{
    session_start();

    print "<!DOCTYPE html>
        <html lang='en'>
<head>
    <base href='/'>
    <meta charset='UTF-8'>
    <title>Agenda</title>
    <link rel='stylesheet' href='css/skeleton/normalize.css'>
    <link rel='stylesheet' href='css/skeleton/skeleton.css'>
    <link rel='stylesheet' href='css/agenda.css'>
</head>
<body>

<div class='container'>";
}

/**
 * Funcion pie utilizable en todos los PHP para generar el fin del HTML
 */
function pie()
{
    print "</div>


</body>
</html>";
}

?>
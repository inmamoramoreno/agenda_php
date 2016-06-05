<?php

/**
 * Created by PhpStorm.
 * User: neome
 * Date: 05/06/2016
 * Time: 17:12
 */
interface IQueries
{
    //----------------------------------------------------------------
    //Consultas de DATOS_FORMULARIO
    const INSERT_DATOS_FORMULARIO = "insert into datos_formulario".
            "(EMPRESA,DIRECCION,NOMBRE,TELEFONO,DNI,CORREO,ESPECIALIDAD) VALUES(";
    const READ_DATOS_FORMULARIO = "select * from DATOS_FORMULARIO";
    const DELETE_DATOS_FORMULARIO = "delete from DATOS_FORMULARIO";
}
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
            "(EMPRESA,DIRECCION,NOMBRE,TELEFONO,DNI,CORREO,ESPECIALIDAD,USUARIO_ID) VALUES(";
    const SELECT_DATOS_FORMULARIO = "select * from DATOS_FORMULARIO WHERE USUARIO_ID = ";
    const DELETE_DATOS_FORMULARIO = "delete from DATOS_FORMULARIO WHERE USUARIO_ID = ";
    const DELETE_DATOS_FORMULARIO_ONE_RECORD = "delete from DATOS_FORMULARIO WHERE ID=";
}
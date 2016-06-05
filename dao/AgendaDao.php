<?php

require "GenericDao.php";


/**
 * Empresa
Direccion
Nombre
Teléfono
DNI
correo
Especialidad
 */

define("READ_ALL", "select * from DATOS_FORMULARIO");
define("DELETE_ALL", "delete from datos_formulario");

//Columnas
define("EMPRESA", "EMPRESA");
define("DIRECCION", "DIRECCION");
define("NOMBRE", "NOMBRE");
define("TELEFONO", "TELEFONO");
define("DNI", "DNI");
define("CORREO", "CORREO");
define("ESPECIALIDAD", "ESPECIALIDAD");

/**
 * Created by PhpStorm.
 * User: neome
 * Date: 04/06/2016
 * Time: 20:35
 */
class AgendaDao extends GenericDao
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return PDOStatement
     */
    public function listar()
    {
        return $this->getDb()->query(READ_ALL);
    }

    /**
     * Metodo para guardar un record
     * @param $record
     */
    public function guardarRecord($record)
    {
        $queryInsert = $record->generateInsert();
        $this->getDb()->query($queryInsert);
    }

    /**
     * Metodo para borrar toda la tabla datos_formulario
     */
    public function deleteAll()
    {
        $this->getDb()->query(DELETE_ALL);
    }

    /**
     * Metodo para borrar un registro dado su id
     * @param $id
     */
    public function deleteRecord($id)
    {

    }

}
<?php

require "GenericDao.php";

/**
 * Class AgendaDao
 */
class AgendaDao extends GenericDao
{
    /**
     * @return PDOStatement
     */
    public function listar()
    {
        return $this->getDb()->query(IQueries::READ_DATOS_FORMULARIO);
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
        $query = IQueries::DELETE_DATOS_FORMULARIO;
        $this->getDb()->query($query);
    }

    /**
     * Metodo para borrar un registro dado su id
     * @param $id
     */
    public function deleteRecord($id)
    {

    }

}
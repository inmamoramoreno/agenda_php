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
        $querySelect = IQueries::SELECT_DATOS_FORMULARIO . $_SESSION[IFields::FIELD_USUARIO]->getId();
        $res = $this->getDb()->query($querySelect);
        return $res;
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
        $query = IQueries::DELETE_DATOS_FORMULARIO . $_SESSION[IFields::FIELD_USUARIO]->getId();
        $this->getDb()->query($query);
    }

    /**
     * Metodo para borrar un registro dado su id
     * @param $id
     */
    public function deleteRecord($id)
    {
        $query = IQueries::DELETE_DATOS_FORMULARIO_ONE_RECORD . $id;
        $this->getDb()->query($query);
    }

    /**
     * Metodo encargado de realizar una busqueda en BD
     * @param $texto
     * @return mixed
     */
    public function buscar($texto)
    {
        $query = $this->generateSelectQuery($texto);

        $resultado = $this->getDb()->query($query);

        return $resultado;
    }

    /**
     * Metodo privado auxiliar para generar la query de busqueda por todos los campos
     * @param $texto
     * @return string
     */
    private function generateSelectQuery($texto)
    {
        $query = IQueries::SELECT_DATOS_FORMULARIO . " " .
            $_SESSION[IFields::FIELD_USUARIO]->getId(). "AND (".
            IFields::FIELD_EMPRESA . " LIKE '%" . $texto . "%' OR " .
            IFields::FIELD_DIRECCION . " LIKE '%" . $texto . "%' OR " .
            IFields::FIELD_NOMBRE . " LIKE '%" . $texto . "%' OR " .
            IFields::FIELD_DNI . " LIKE '%" . $texto . "%' OR " .
            IFields::FIELD_CORREO . " LIKE '%" . $texto . "%')";
        return $query;
    }

}
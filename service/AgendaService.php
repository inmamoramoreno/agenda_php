<?php

require dirname(__FILE__) . "/../dao/AgendaDao.php";
require dirname(__FILE__) . "/../dto/RecordDto.php";

/**
 * Class Agenda
 */
class AgendaService
{

    private $agendaDao;

    /**
     * AgendaService constructor.
     */
    public function __construct()
    {
        $this->setAgendaDao(new AgendaDao());

    }

    /**
     * Funcion encargada de leer todos los registros en BD y devolverlos
     * @return array
     */
    public function listar()
    {
        $this->getAgendaDao()->open();
        $rows = $this->getAgendaDao()->listar();
        $this->getAgendaDao()->close();

        $lista = array();
        if ($rows != false) {
            $lista = array();
            foreach ($rows as $row) {
                array_push($lista, $this->map($row));
            }
        }
        return $lista;
    }

    /**
     * Metodo para transformar un array leido en un dto
     * @param $row
     * @return mixed
     */
    private function map($row)
    {
        $dto = new Record;
        $dto->setId($row[IFields::FIELD_ID]);
        $dto->setEmpresa($row[IFields::FIELD_EMPRESA]);
        $dto->setDireccion($row[IFields::FIELD_DIRECCION]);
        $dto->setNombre($row[IFields::FIELD_NOMBRE]);
        $dto->setTelefono($row[IFields::FIELD_TELEFONO]);
        $dto->setDNI($row[IFields::FIELD_DNI]);
        $dto->setCorreo($row[IFields::FIELD_CORREO]);
        $dto->setEspecialidad($row[IFields::FIELD_ESPECIALIDAD]);

        return $dto;
    }

    /**
     * Metodo encargado de guardar un registro en BD
     * @param $record
     */
    public function guardarRecord($record)
    {

        $this->getAgendaDao()->open();
        $this->getAgendaDao()->guardarRecord($record);
        $this->getAgendaDao()->close();
    }

    /**
     * Metodo para borrar toda la tabla datos_formulario
     */
    public function deleteAll()
    {
        $this->getAgendaDao()->open();
        $this->getAgendaDao()->deleteAll();
        $this->getAgendaDao()->close();
    }

    /**
     * Metodo para borrar un registro
     * @param $id
     */
    public function deleteRecord($id)
    {
        $this->getAgendaDao()->open();
        $this->getAgendaDao()->deleteRecord($id);
        $this->getAgendaDao()->close();
    }

    /**
     * Metodo encargado de realizar una busqueda en BD
     * @param $texto
     * @return array
     */
    public function buscar($texto)
    {
        $this->getAgendaDao()->open();
        $rows = $this->getAgendaDao()->buscar($texto);
        $this->getAgendaDao()->close();

        $lista = array();
        if ($rows != false) {
            $lista = array();
            foreach ($rows as $row) {
                array_push($lista, $this->map($row));
            }
        }
        return $lista;
    }

    /**
     * @return mixed
     */
    public function getAgendaDao()
    {
        return $this->agendaDao;
    }

    /**
     * @param mixed $agendaDao
     */
    public function setAgendaDao($agendaDao)
    {
        $this->agendaDao = $agendaDao;
    }
}
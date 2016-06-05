<?php

require dirname(__FILE__) . "/../dao/AgendaDao.php";
require dirname(__FILE__) . "/../dto/Record.php";

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

        $rows = $this->getAgendaDao()->listar();

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

        $dto->setEmpresa($row[EMPRESA]);
        $dto->setDireccion($row[DIRECCION]);
        $dto->setNombre($row[NOMBRE]);
        $dto->setTelefono($row[TELEFONO]);
        $dto->setDNI($row[DNI]);
        $dto->setCorreo($row[CORREO]);
        $dto->setEspecialidad($row[ESPECIALIDAD]);

        return $dto;
    }

    /**
     * Metodo encargado de guardar un registro en BD
     * @param $record
     */
    public function guardarRecord($record){
        $this->getAgendaDao()->guardarRecord($record);
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
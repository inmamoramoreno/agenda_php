<?php

/**
 * Class Record
 */
class Record
{
    private $id;
    private $empresa;
    private $direccion;
    private $nombre;
    private $telefono;
    private $DNI;
    private $correo;
    private $especialidad;

    /**
     * Record constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * @param mixed $empresa
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getDNI()
    {
        return $this->DNI;
    }

    /**
     * @param mixed $DNI
     */
    public function setDNI($DNI)
    {
        $this->DNI = $DNI;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * @param mixed $especialidad
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
    }

    /**
     * Conversion del dto a String para renderizarlo en pantalla
     */
    public function toString()
    {
        return
            "<td>".$this->getEmpresa()."</td>".
            "<td>".$this->getDireccion()."</td>".
            "<td>".$this->getNombre()."</td>".
            "<td>".$this->getTelefono()."</td>".
            "<td>".$this->getDNI()."</td>".
            "<td>".$this->getCorreo()."</td>".
            "<td>".$this->getEspecialidad()."</td>";
    }

    /**
     * Metodo encargado de generar la sentencia INSERT del record
     * @return string
     */
    public function generateInsert(){
        return IQueries::INSERT_DATOS_FORMULARIO.
        "'".$this->getEmpresa().     "',".
        "'".$this->getDireccion().   "',".
        "'".$this->getNombre().      "',".
        "'".$this->getTelefono().    "',".
        "'".$this->getDNI().         "',".
        "'".$this->getCorreo().      "',".
        "'".$this->getEspecialidad()."')";
    }
}
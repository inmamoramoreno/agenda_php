<?php

require dirname(__FILE__) . "/../dao/UsuarioDao.php";
require dirname(__FILE__) . "/../dto/UsuarioDto.php";

/**
 * Class UsuarioService
 */
class UsuarioService
{
    private $usuarioDao;

    /**
     * UsuarioService constructor.
     * @param $usuarioDao
     */
    public function __construct()
    {
        $this->setUsuarioDao(new UsuarioDao());
    }

    /**
     * Metodo encargado de comprobar que un usuario esta registrado
     * @param $usuarioDto
     * @return mixed
     */
    public function usuarioRegistrado($usuarioDto){

        $this->getUsuarioDao()->open();

        $registrado=$this->getUsuarioDao()->usuarioRegistrado(
            $usuarioDto->getUsuario(), $usuarioDto->getPassword());

        $this->getUsuarioDao()->close();

        return $registrado;
    }


    /**
     * @return mixed
     */
    public function getUsuarioDao()
    {
        return $this->usuarioDao;
    }

    /**
     * @param mixed $usuarioDao
     */
    public function setUsuarioDao($usuarioDao)
    {
        $this->usuarioDao = $usuarioDao;
    }
}
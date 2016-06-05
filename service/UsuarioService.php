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
    public function buscarUsuario($usuarioDto)
    {

        $this->getUsuarioDao()->open();

        $resultado = $this->getUsuarioDao()->buscarUsuario(
            $usuarioDto->getUsuario(), $usuarioDto->getPassword());

        $this->getUsuarioDao()->close();

        $usuarioDto = false;

        if ($resultado != false) {
            $usuarioDto = $this->map($resultado->fetch());
        }
        return $usuarioDto;
    }

    private function map($resultado)
    {
        $usuarioDto = new UsuarioDto();
        $usuarioDto->setId($resultado[IFields::FIELD_ID]);
        $usuarioDto->setUsuario($resultado[IFields::FIELD_USUARIO]);
        $usuarioDto->setPassword($resultado[IFields::FIELD_PASSWORD]);

        return $usuarioDto;
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
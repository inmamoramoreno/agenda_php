<?php

require "GenericDao.php";

/**
 * Class UsuarioDao
 */
class UsuarioDao extends GenericDao
{

    /**
     * UsuarioDao constructor. Llama al constructor padre
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Metodo encargado de comprobar que un usuario esta registrado
     * consultando a la BD si existe o no
     * @param $usuario
     * @param $password
     * @return bool
     */
    public function buscarUsuario($usuario, $password)
    {
        //String con la query
        $query = "select * from datos_usuario " .
            "where usuario = '" . $usuario . "' and password = '" . $password . "'";

        $resultados = $this->getDb()->query($query);

        return $resultados;

//        $registrado = false;
//
//        if (!$resultados) {
//            print MYSQL_ERROR;
//        } else {
//            $filas = $resultados->fetchAll();
//
//            $encontrados = sizeof($filas);
//
//            if ($encontrados == 1) {
//                $registrado = true;
//            } else {
//                $registrado = false;
//            }
//        }
//        return $registrado;
    }
}
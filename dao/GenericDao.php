<?php

define("MYSQL_HOST", "mysql:host=localhost;dbname=agenda");
define("MYSQL_USUARIO", "root");
define("MYSQL_PASSWORD", "");
define("MYSQL_ERROR", "Error en la consulta");

/**
 * Class GenericDao
 */
class GenericDao
{
    protected $db;

    /**
     * GenericDao constructor.
     */
    public function __construct()
    {
        try {
            $this->db = new PDO(MYSQL_HOST, MYSQL_USUARIO, MYSQL_PASSWORD);
            $this->db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $this->db->exec("set names utf8mb4");
        } catch (PDOException $e) {
            echo "<p>Error: No puede conectarse a la base de datos </p>\n\n";
            echo "<p>Error: " . $e->getMessage() . " </p>\n\n";
            exit();
        }
    }

    public function getDb()
    {
        return $this->db;
    }

    /**
     * Metodo para cerrar la conexion
     */
    public function close()
    {
        $this->db = null;
    }
}
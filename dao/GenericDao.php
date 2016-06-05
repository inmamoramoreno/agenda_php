<?php

require "config/IMySqlConfig.php";

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

    }

    public function getDb()
    {
        return $this->db;
    }

    public function open()
    {
        try {
            $this->db = new PDO(IMySqlConfig::MYSQL_HOST,
                IMySqlConfig::MYSQL_USUARIO, IMySqlConfig::MYSQL_PASSWORD);

            $this->db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $this->db->exec("set names utf8mb4");
        } catch (PDOException $e) {
            echo "<p>" . IMessages::MYSQL_CONNECTION_ERROR . "</p>\n\n";
            echo "<p>Error: " . $e->getMessage() . " </p>\n\n";
            exit();
        }
    }

    /**
     * Metodo para cerrar la conexion
     */
    public function close()
    {
        $this->db = null;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: musa
 * Date: 07/05/2017
 * Time: 01:04
 */
class DB
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "1292453";
    private $dbname = "travelo";
    private $connection;

    function __construct()
    {
            $this -> connection = new mysqli(
            $this -> servername,
            $this -> username,
            $this -> password,
            $this -> dbname
        );

        if ($this->connection->connect_error)
        {
            die("Connection error! : " . $this->connection->connect_error);
        }

        $this->connection->set_charset("utf8");

    }

    function __destruct()
    {
        $this->connection->close();
    }
    private static $cont = null;
    public static function connect()
    {
        // One connection through whole application
        if ( null == self::$cont )
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$servername.";"."dbname=".self::$dbname, self::$username, self::$password);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }



    public function getDataTable($query)
    {
        $result = $this->connection->query($query);
        return $result;
    }

    public function executeQuery($query)
    {
        return ($this->connection->query($query) == TRUE);
    }


}
<?php


class Database
{
    private $db = null;
    private $dbStatement = null;
    private $driver = 'mysql';
    private $host = '127.0.0.1';
    private $dbname = 'currency-api';
    private $dbuser = 'root';
    private $dbpassword = '';
    private $error = null;

    public function __construct($attr = null)
    {
        if(is_array($attr)) {
            if (key_exists('username', $attr))
                $this->dbuser = $attr['username'];

            if (key_exists('password', $attr))
                $this->dbpassword = $attr['password'];

            if (key_exists('name', $attr))
                $this->dbname = $attr['name'];

            if (key_exists('host', $attr))
                $this->host = $attr['host'];

            if (key_exists('driver', $attr))
                $this->driver = $attr['driver'];
        } elseif (is_string($attr)) {
            $this->dbname = $attr;
        }
    }

    public function setDatabasename($name)
    {
        $this->dbname = $name;
    }

    public function setUsername($name)
    {
        $this->dbuser = $name;
    }

    public function setPassword($pw)
    {
        $this->dbpassword = $pw;
    }

    public function connect($name = '', $user = '', $password = '')
    {
        $result = true;

        if(!empty($name))
            $this->dbname = $name;

        if(!empty($user))
            $this->dbuser = $user;

        if(!empty($password))
            $this->dbpassword = $password;

        try {
            $this->db = new PDO("{$this->driver}:host={$this->host};dbname={$this->dbname}", $this->dbuser, $this->dbpassword);
        } catch(PDOException $e) {
            $result = false;
            $this->error = $e;
            echo($e);
        }

        return $result;
    }

    public function query($sql, array $args = [])
    {
        if(is_null($this->db)) {
            if($this->connect()) {
                return false;
            }
        }

        $this->dbStatement = $this->db->prepare($sql);
        $this->dbStatement->execute($args);

        return true;
    }

    public function getRow()
    {
        if(!is_null($this->dbStatement)) {
            return $this->dbStatement->fetch();
        }

        return [];
    }

    public function getRows()
    {
        if(!is_null($this->dbStatement)) {
            return $this->dbStatement->fetchAll();
        }

        return [];
    }

    public function getError()
    {
        return $this->error;
    }

    public function getErrorMessage()
    {
        return $this->error->getMessage();
    }

    public function find($table, $column, $value)
    {
        $sql = "SELECT * FROM $table WHERE $column = :$column";
        $args = [ ":$column" => $value ];

        $this->query($sql, $args);

        return $this->getRow();
    }
}
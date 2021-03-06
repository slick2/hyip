<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
class Database
{

    private static $_instance = null;
    private $servername = DB_SERVER;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $db = DB_NAME;
    private $conn;
    public $result;

    private function __construct()
    {
        try
        {
            $this->conn = new mysqli($this->servername, $this->username, $this->password);
            $this->conn->set_charset("utf8");
            $this->conn->select_db($this->db);
        }
        catch (Exception $e)
        {
            echo "Произошла ошибка:" . $e->getMessage();
        }
    }

    static public function getInstance()
    {
        if (is_null(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function getInsertId()
    {
        return $this->conn->insert_id;
    }

    public function query($query)
    {
        $result = $this->conn->query($query);
        $results = array();
        if ($result && !is_bool($result))
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                $results[] = ($row);
            }
            $this->result = $results;
        }
        echo $this->conn->error;
        return self::$_instance;
    }

    public function close()
    {
        $this->conn->close();
    }

    public function fetchNumRows()
    {
        return count($this->result);
    }

    public function fetchSingleRow()
    {
        if(isset($this->result[0])){
            return $this->result[0];
        }
        else return array();
        
    }

    public function fetchAll()
    {
        return $this->result;
    }

    public function quote($arg)
    {
        return $this->conn->real_escape_string($arg);
    }
    public function getCurrentPercent(){
        $query = "SELECT `amount` FROM `hyip_percents` where `name`='business_day'";
        return self::query($query)->result[0]['amount'];
    }

}

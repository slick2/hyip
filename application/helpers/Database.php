<?php
require_once 'db.php';
class Database extends DB
{
    public $result;
    private $password;
    private $username;
    private $servername;
    private $db;
    private function __construct()
    {
        $this->password = DB_PASS;
        $this->username = DB_USER;
        $this->servername = DB_SERVER;
        $this->db = DB_NAME;
        parent::__construct();  
    }
}

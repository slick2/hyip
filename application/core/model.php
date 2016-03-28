<?php

class Model
{

    public $mysqli;

    public function __construct()
    {
        $this->mysqli = Database::getInstance();
    }

    public function get_one_message($action,$language='russian')
    {

        $mes = $this->mysqli->query("SELECT tag,russian FROM hyip_translations WHERE tag='$action'")->fetchSingleRow();
        return $mes[$language];
    }

    public function get_messages($action,$auth=false,$language='russian')
    {
        if($auth)
        {
            $mes = $this->mysqli->query("SELECT tag,russian FROM hyip_translations WHERE tag LIKE '$action%' OR tag LIKE 'auth%'")->fetchAll();
        }
        else
        {
            $mes = $this->mysqli->query("SELECT tag,russian FROM hyip_translations WHERE tag LIKE '$action%'")->fetchAll();
        }
        
        $data = array();
        foreach ($mes as $value)
        {
            $data[$value['tag']] = $value[$language];
        }
        return $data;
    }

}

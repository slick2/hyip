<?php

class Model
{

    public $mysqli;

    public function __construct()
    {
        $this->mysqli = Database::getInstance();
    }
    
    public function get_percents()
    {
        $res = $this->mysqli->query("SELECT name,amount FROM hyip_percents")->fetchAll();
        $data = [];
        foreach ($res as $val)
        {
            $data[$val['name']] = $val['amount'];
        }
        return $data;
    }

    public function get_one_message($action,$language='russian')
    {

        $mes = $this->mysqli->query("SELECT tag,$language FROM hyip_translations WHERE tag='$action'")->fetchSingleRow();
        return $mes[$language];
    }
    public function get_upper_messages($action,$language='russian')
    {
        $mes = $this->mysqli->query("SELECT tag,UPPER($language) FROM hyip_translations WHERE tag LIKE '$action%'")->fetchAll();
        $data = array();
        foreach ($mes as $value)
        {
            $data[$value['tag']] = $value["UPPER($language)"];
        }
        return $data;
    }

    public function get_messages($action,$auth=false,$language='russian')
    {
        if($auth)
        {
            $mes = $this->mysqli->query("SELECT tag,`$language` FROM hyip_translations WHERE tag LIKE '$action%' OR tag LIKE 'auth%'")->fetchAll();
        }
        else
        {
            $mes = $this->mysqli->query("SELECT tag,`$language` FROM hyip_translations WHERE tag LIKE '$action%'")->fetchAll();
        }
        
        $data = array();
        foreach ($mes as $value)
        {
            $data[$value['tag']] = $value[$language];
        }
        return $data;
    }

}

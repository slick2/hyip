<?php

class Model_Pay extends Model
{
    public function succeed_order()
    {
        $mysqli = Database::getInstance();
        $uid = Session::get('id');
        $ord = $mysqli->query("");
    }
}
<?php

class Model_Referral extends Model
{

    public function get_data()
    {
        $mysqli = Database::getInstance();
        //$mysqli = $GLOBALS['mysqli'];
        $uid = Session::get('id');

        $money = 0;
        $parent = $mysqli->query("SELECT parent_id FROM hyip_users WHERE id=$uid")->fetchSingleRow()['parent_id'];
        if($parent != NULL)
        {
            $parent = $mysqli->query("SELECT full_name FROM hyip_users WHERE id=$parent")->fetchSingleRow()['full_name'];
        }
        $numrows = $mysqli->query("SELECT id FROM hyip_users WHERE parent_id=$uid")->fetchNumRows();
        $qmoney = $mysqli->query("SELECT cash FROM hyip_cash WHERE user_id IN (SELECT id FROM hyip_users WHERE parent_id=$uid) ")->fetchAll();
        $active = $mysqli->query("SELECT id FROM hyip_cash WHERE user_id IN (SELECT id FROM hyip_users WHERE parent_id=$uid) GROUP BY user_id")->fetchNumRows();
        foreach ($qmoney as $row)
        {
            $money += $row['cash'];
        }
        $qpers = $mysqli->query("SELECT percents FROM hyip_users WHERE id=$uid");
        $pers = $qpers->fetchSingleRow()['percents'];

        $data = array(
            'parent' => $parent,
            'numrows' => $numrows,
            'active' => $active,
            'money' => $money,
            'pers' => $pers,
            'uid' => $uid
        );
        
        return $data;
    }

}

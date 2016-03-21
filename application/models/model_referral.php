<?php

class Model_Referral extends Model
{

    public function get_data()
    {
        $mysqli = Database::getInstance();
        //$mysqli = $GLOBALS['mysqli'];
        $uid = Session::get('id');

        $money = 0;
        $numrows = $mysqli->query("SELECT id FROM hyip_users WHERE parent_id=$uid")->fetchNumRows();
        $qmoney = $mysqli->query("SELECT cash FROM hyip_cash WHERE user_id IN (SELECT id FROM hyip_users WHERE parent_id=$uid) ")->fetchAll();
        $active = $mysqli->query("SELECT id FROM hyip_cash WHERE user_id IN (SELECT id FROM hyip_users WHERE parent_id=$uid) GROUP BY user_id")->fetchNumRows();
        /*
        while ($row = $qmoney->fetch_assoc())
        {
            $money += $row['cash'];
        }
         */
        foreach ($qmoney as $row)
        {
            $money += $row['cash'];
        }
        $qpers = $mysqli->query("SELECT percents FROM hyip_users WHERE id=$uid");
        $pers = $qpers->fetchSingleRow()['percents'];

        $data = array(
            'numrows' => $numrows,
            'active' => $active,
            'money' => $money,
            'pers' => $pers,
            'uid' => $uid
        );
        
        return $data;
    }

}

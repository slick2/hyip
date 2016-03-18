<?php

class Model_Referral extends Model
{

    public function get_data()
    {
        $mysqli = $GLOBALS['mysqli'];
        $uid = Session::get('id');

        $money = 0;
        $qrefs = $mysqli->query("SELECT id FROM hyip_users WHERE parent_id=$uid");
        $qmoney = $mysqli->query("SELECT cash FROM hyip_cash WHERE user_id IN (SELECT id FROM hyip_users WHERE parent_id=$uid) ");
        $qactive = $mysqli->query("SELECT id FROM hyip_cash WHERE user_id IN (SELECT id FROM hyip_users WHERE parent_id=$uid) GROUP BY user_id");
        while ($row = $qmoney->fetch_assoc())
        {
            $money += $row['cash'];
        }
        $numrows = $qrefs->num_rows;
        $active = $qactive->num_rows;
        $qpers = $mysqli->query("SELECT percents FROM hyip_users WHERE id=$uid");
        $pers = $qpers->fetch_assoc()['percents'];

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

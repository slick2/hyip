<?php

class Model_Referral extends Model
{
    public function user_accounts()
    {
        $uid = Session::get('id');
        $qq = $this->mysqli->query("SELECT DISTINCT hsys.name AS name, hp.account AS account
FROM hyip_payaccounts AS hp
INNER JOIN hyip_cash AS hc ON (hp.id=hc.payaccount_id)
INNER JOIN hyip_paysystems AS hsys ON (hsys.id=hp.paysystem_id)
WHERE hc.user_id=$uid")->fetchNumRows();
        return $qq;
    }

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

        $data = array(
            'parent' => $parent,
            'numrows' => $numrows,
            'active' => $active,
            'money' => $money,
            'uid' => $uid
        );
        
        return $data;
    }

}

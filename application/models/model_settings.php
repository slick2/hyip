<?php

class Model_Settings extends Model
{
    public function get_data()
    {
        $data = array();
        $mysqli = $GLOBALS['mysqli'];
        $uid = Session::get('id');
        $qq = $mysqli->query("SELECT DISTINCT hsys.name AS name, hsys.image AS image, hp.currency AS currency, hp.account AS account
FROM hyip_payaccounts AS hp
INNER JOIN hyip_cash AS hc ON (hp.id=hc.payaccount_id)
INNER JOIN hyip_paysystems AS hsys ON (hsys.id=hp.paysystem_id)
WHERE hc.user_id=$uid");
        while ($row = $qq->fetch_assoc())
        {
            $data[] = array(
                'image' => $row['image'],
                'currency' => $row['currency'],
                'name' => $row['name'],
                'account' => $row['account']
            );
        }
        return $data;
    }

}

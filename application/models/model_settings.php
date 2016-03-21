<?php

class Model_Settings extends Model
{

    public function update_user()
    {
        //$mysqli = $GLOBALS['mysqli'];
        $mysqli = Database::getInstance();
        $uid = Session::get('id');
        $smail = Session::get('email');
        if (!empty($_POST['full_name']))
        {
            $full_name = $mysqli->quote($_POST['full_name']);
            $query = $mysqli->query("UPDATE hyip_users SET full_name='$full_name' WHERE email='$smail'");
        }
        if (!empty($_POST['email']))
        {
            $email = $mysqli->quote($_POST['email']);
            $query = $mysqli->query("UPDATE hyip_users SET email='$email' WHERE email='$smail'");
        }
        if (!empty($_POST['password']) && !empty($_POST['password_confirm']) && !empty($_POST['password_old']))
        {
            $password = $mysqli->quote($_POST['password']);
            $confirm = $mysqli->quote($_POST['password_confirm']);
            $old = $mysqli->quote($_POST['password_old']);
            $old_hash = $mysqli->query("SELECT password FROM hyip_users WHERE id=$uid");
            if ($password == $confirm && password_verify($old, $old_hash))
            {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = $mysqli->query("UPDATE hyip_users SET password='$password' WHERE email='$smail'");
            }
        }
    }

    public function get_data()
    {
        $data = array();
        $mysqli = Database::getInstance();
        //$mysqli = $GLOBALS['mysqli'];
        $uid = Session::get('id');
        $qq = $mysqli->query("SELECT DISTINCT hsys.name AS name, hsys.image AS image, hp.currency AS currency, hp.account AS account
FROM hyip_payaccounts AS hp
INNER JOIN hyip_cash AS hc ON (hp.id=hc.payaccount_id)
INNER JOIN hyip_paysystems AS hsys ON (hsys.id=hp.paysystem_id)
WHERE hc.user_id=$uid")->fetchAll();
        foreach ($qq as $row)
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

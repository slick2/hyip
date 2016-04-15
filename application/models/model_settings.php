<?php

class Model_Settings extends Model
{

    public function update_safety()
    {
        $uid = Session::get('id');
        $track_ip = $this->mysqli->quote($_POST['ip']);
        $track_browser = $this->mysqli->quote($_POST['browser']);
        $istrack_db = $this->mysqli->query("SELECT ip_track,browser_track FROM hyip_users WHERE id=$uid")->fetchSingleRow();
        $track_ip_db = intval($istrack_db["ip_track"]);
        $track_browser_db = intval($istrack_db["browser_track"]);
        $track_ip = $track_ip == "on" ? 1 : 0;
        $track_browser = $track_browser == "on" ? 1 : 0;
        if($track_ip != $track_ip_db)
        {
            $this->mysqli->query("UPDATE hyip_users SET ip_track=$track_ip WHERE id=$uid");
        }
        if($track_browser != $track_browser_db)
        {
            $this->mysqli->query("UPDATE hyip_users SET browser_track=$track_browser WHERE id=$uid");
        }
    }


    public function update_user()
    {
        $uid = Session::get('id');
        $smail = Session::get('email');
        $systems = $this->mysqli->query("SELECT name FROM hyip_paysystems")->fetchAll();
        foreach ($systems as $val)
        {
            
            $v =str_replace(' ', '_', $val['name']);
            //var_dump($_POST[$v]);
            if(!empty($_POST[$v]))
            {
              
              //var_dump($systems);
              $name = Database::getInstance()->quote($_POST[$v]);
              $system = str_replace('_', ' ', Database::getInstance()->quote($val['name']));
              //$query = "UPDATE hyip_payaccounts SET account='{$name}' WHERE id IN (SELECT payaccount_id FROM hyip_cash WHERE user_id=$uid) AND paysystem_id IN (SELECT id FROM hyip_paysystems WHERE name='{$val['name']}')";
              $query = "update hyip_payaccounts hp 

inner join hyip_paysystems hpay ON (hpay.id=hp.paysystem_id)
set hp.account='{$name}'
where hpay.name='$system' AND hp.user_id=$uid;";
//              echo '<pre>';
//              var_dump($_POST);
//              var_dump("UPDATE hyip_payaccounts SET account='{$_POST[$v]}' WHERE id IN (SELECT payaccount_id FROM hyip_cash WHERE user_id=$uid) AND paysystem_id IN (SELECT id FROM hyip_paysystems WHERE name='{$val['name']}') ");
//              echo '</pre>';
                $res = $this->mysqli->query("UPDATE hyip_payaccounts SET account='{$_POST[$v]}' WHERE id IN (SELECT payaccount_id FROM hyip_cash WHERE user_id=$uid) AND paysystem_id IN (SELECT id FROM hyip_paysystems WHERE name='{$val['name']}') ");
            }
        }
        if (!empty($_POST['full_name']))
        {
            $full_name = $this->mysqli->quote($_POST['full_name']);
            $query = $this->mysqli->query("UPDATE hyip_users SET full_name='$full_name' WHERE email='$smail'");
            $_SESSION['session_name']=$_POST['full_name'];
        }
        if (!empty($_POST['email']))
        {
            $email = $this->mysqli->quote($_POST['email']);
            $query = $this->mysqli->query("UPDATE hyip_users SET email='$email' WHERE email='$smail'");
            $_SESSION['email'] = $_POST['email'];
            $smail = Session::get('email');
        }
        if (!empty($_POST['password']) && !empty($_POST['password_confirm']) && !empty($_POST['password_old']))
        {
            $password = $this->mysqli->quote($_POST['password']);
            $confirm = $this->mysqli->quote($_POST['password_confirm']);
            $old = $this->mysqli->quote($_POST['password_old']);
            $old_hash = $this->mysqli->query("SELECT password FROM hyip_users WHERE id=$uid")->result[0]['password'];
            if ($password == $confirm && password_verify($old, $old_hash))
            {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = $this->mysqli->query("UPDATE hyip_users SET password='$password' WHERE email='$smail'");
            }
        }
    }

    public function get_data()
    {
        $data = array();
        $mysqli = Database::getInstance();
        $uid = Session::get('id');
        $qq = $this->mysqli->query("SELECT DISTINCT hsys.name AS name, hp.account AS account, hu.browser_track as track, hu.ip_track as iptrack
FROM hyip_payaccounts AS hp
INNER JOIN hyip_cash AS hc ON (hp.id=hc.payaccount_id)
INNER JOIN hyip_paysystems AS hsys ON (hsys.id=hp.paysystem_id)
INNER JOIN hyip_users as hu ON (hu.id=hc.user_id)
WHERE hc.user_id=$uid")->fetchAll();
        //var_dump($qq);
        $systems = $this->mysqli->query("SELECT name FROM hyip_paysystems")->fetchAll();
        foreach ($qq as $row)
        {   
            $data[$row['name']] = $row['account'];
        }
        $data['systems'] = $systems;
        $data['iptrack'] = @$qq[0]['iptrack'];
        $data['btrack'] = @$qq[0]['track'];
        return $data;
    }

}

<?php

class Model_Admin extends Model
{
    public function set_percents()
    {
        $business = (double)$this->mysqli->quote($_POST['business_day']);
        $holiday = (double)$this->mysqli->quote($_POST['holiday']);
        $ref1 = (double)$this->mysqli->quote($_POST['referral_first']);
        $ref2 = (double)$this->mysqli->quote($_POST['referral_second']);
        $data = ['business_day' => $business,'holiday'=>$holiday, 'referral_first'=> $ref1,'referral_second'=>$ref2];
        foreach ($data as $key=>$val)
        {
            $r = $this->mysqli->query("UPDATE hyip_percents SET amount=$val WHERE name='$key'");
        }
    }

    public function set_string($id,$key,$value)
    {
        $res = $this->mysqli->query("UPDATE hyip_translations SET $key='$value' WHERE id=$id");
    }
    public function get_strings()
    {
        $st = $this->mysqli->query("SELECT id,tag,russian,english,chinese,vietnamese FROM hyip_translations")->fetchAll();
        return $st;
    }

    public function get_systems()
    {
        $data = array();
        $qsyst = $this->mysqli->query("SELECT name FROM hyip_paysystems")->fetchAll();

        foreach ($qsyst as $srow)
        {
            $data[] = $srow['name'];
        }
        return $data;
    }
    
    public function toggle($system,$activity,$id)
    {
        switch (strtolower($system))
        {
            case 'payeer':
                $qadd = $this->mysqli->query("UPDATE hyip_payeer SET active=$activity WHERE out_acc='$id'");
                break;
            case 'perfectmoney':
                $qadd = $this->mysqli->query("UPDATE hyip_perfectmoney SET active=$activity WHERE in_acc='$id'");
                break;
            case 'advcash':
                $qadd = $this->mysqli->query("UPDATE hyip_advcash SET active=$activity WHERE in_acc='$id'");
                break;
        }
    }

    public function add_account()
    {
        $system = $this->mysqli->quote($_POST['paysystem']);
        
        switch ($system)
        {
            case 'Payeer':
                $first = $this->mysqli->quote($_POST['payeer_shop']);
                $second = $this->mysqli->quote($_POST['payeer_key']);
                $third = $this->mysqli->quote($_POST['payeer_acc']);
                $fourth = $this->mysqli->quote($_POST['payeer_api_id']);
                $fifth = $this->mysqli->quote($_POST['payeer_api_key']);
                $qadd = $this->mysqli->query("INSERT INTO hyip_payeer (in_shop,in_key,out_acc,out_api_id,out_api_key,active) VALUES('$first','$second','$third','$fourth','$fifth',1)");
                break;
            case 'PerfectMoney':
                $first = $this->mysqli->quote($_POST['perfectmoney_acc']);
                $second = $this->mysqli->quote($_POST['perfectmoney_name']);
                $third = $this->mysqli->quote($_POST['perfectmoney_id']);
                $fourth = $this->mysqli->quote($_POST['perfectmoney_pass']);
                $qadd = $this->mysqli->query("INSERT INTO hyip_perfectmoney (in_acc,in_name,out_id,out_pass,active) VALUES('$first','$second','$third','$fourth',1)");
                break;
            case 'Advcash':
                $first = $this->mysqli->quote($_POST['advcash_email']);
                $second = $this->mysqli->quote($_POST['advcash_sci']);
                $third = $this->mysqli->quote($_POST['advcash_sign']);
                $fourth = $this->mysqli->quote($_POST['advcash_api']);
                $fifth = $this->mysqli->quote($_POST['advcash_key']);
                $qadd = $this->mysqli->query("INSERT INTO hyip_advcash (in_acc,in_name,in_sign,out_api_name,out_key,active) VALUES('$first','$second','$third','$fourth','$fifth',1)");
                break;
        }
    }


    public function get_accounts()
    {
        
        $qpayeer = $this->mysqli->query("SELECT in_shop,in_key,out_acc,out_api_id,out_api_key,active FROM hyip_payeer")->fetchAll();
        $qperfectmoney = $this->mysqli->query("SELECT in_acc,in_name,out_id,out_pass,active FROM hyip_perfectmoney")->fetchAll();
        $qadvcash = $this->mysqli->query("SELECT in_acc,in_name,in_sign,out_api_name,out_key,active FROM hyip_advcash")->fetchAll();
        $qbitcoin = $this->mysqli->query("SELECT token,secret_key FROM hyip_bitcoin")->fetchAll();
        $data = [
            'payeer' => $qpayeer,
            'perfectmoney' => $qperfectmoney,
            'advcash' => $qadvcash,
            'bitcoin' => $qbitcoin
            ];
        return $data;
    }
    public function getUsersList(){
        $db = Database::getInstance();
        $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
        $perPage = 10;
        $query = "SELECT count(id) as userscount from hyip_users";
        $usersCount = $db->query($query)->result[0]['userscount'];
        $offset = ($page - 1)*$perPage;
        $query = "SELECT id, full_name, email, role, active  FROM `hyip_users`  order by id limit $offset,$perPage";
        $users = $db->query($query)->result;
        return array('count'=>$usersCount, 'users'=>$users, 'page'=>$page);
    }

}

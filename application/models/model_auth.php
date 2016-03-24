<?php

class Model_Auth extends Model
{

    public function add_user($full_name, $email, $password, $active, $role, $parent_id = NULL, $percents)
    {
        $mysqli = Database::getInstance();
        $password = password_hash($password, PASSWORD_DEFAULT);
        $ip = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $sql = "INSERT INTO hyip_users (full_name, email, password, active, role, parent_id, percents,last_ip,last_browser) VALUES('$full_name','$email', '$password', '$active','$role',$parent_id,'$percents','$ip','$browser')";
        $result = $mysqli->query($sql)->result;
        return $result;
    }

    public function activate_user($email)
    {
        $mysqli = Database::getInstance();
        $res = $mysqli->query("UPDATE hyip_users SET active = TRUE WHERE email='$email'")->fetchAll();
        return $res;
    }

    public function get_num_users($email)
    {
        $mysqli = Database::getInstance();
        $query = $mysqli->query("SELECT id FROM hyip_users WHERE email='$email'")->fetchNumRows();
        return $query;
    }
    
    public function set_last_login($id)
    {
        $mysqli = Database::getInstance();
        $ip = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        
        $get = $mysqli->query("SELECT last_ip,ip_track,last_browser,browser_track FROM hyip_users WHERE id=$id")->fetchSingleRow();
        if($get['ip_track'] === '1' && $get['last_ip'] != $ip)
        {
            return 'ip';
        }
        if($get['browser_track'] === '1' && $get['last_browser'] != $browser )
        {
            return 'browser';
        }
        $change = $mysqli->query("UPDATE hyip_users SET last_ip='$ip',last_browser='$browser' WHERE id=$id");
        return 'ok';
    }

    public function get_user_by_mail($email)
    {
        $mysqli = Database::getInstance();
        $query = $mysqli->query("SELECT email,password,active,role,full_name,id,last_ip,last_browser FROM hyip_users WHERE email='$email'")->fetchAll();
        $res = array();
        $nr = $mysqli->query("SELECT id FROM hyip_users WHERE email='$email'")->fetchNumRows();
        if ($nr != 0)
        {
            foreach ($query as $row)
            {
                $res[] = array(
                    'email' => $row['email'],
                    'password' => $row['password'],
                    'active' => $row['active'],
                    'role' => $row['role'],
                    'full_name' => $row['full_name'],
                    'id' => $row['id'],
                    'last_ip' => $row['last_ip'],
                    'last_browser' => $row['last_browser']
                );
            }
        }
        return array(
            $nr,
            $res
        );
    }

}

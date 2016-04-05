<?php

class Model_Auth extends Model
{

    public function set_password($email, $pass)
    {
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $this->mysqli->query("UPDATE hyip_users SET passwod='$password' WHERE email='$email'");
    }

    public function generate_password($length = 8)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++)
        {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }

    public function add_user($full_name, $email, $password, $active, $role, $parent_id = NULL, $percents)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $ip = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $sql = "INSERT INTO hyip_users (full_name, email, password, active, role, parent_id, percents,last_ip,last_browser) VALUES('$full_name','$email', '$password', '$active','$role',$parent_id,'$percents','$ip','$browser')";
        $result = $this->mysqli->query($sql);
        return true;
    }

    public function activate_user($email)
    {
        $res = $this->mysqli->query("UPDATE hyip_users SET active = TRUE WHERE email='$email'")->fetchAll();
        return $res;
    }

    public function get_num_users($email)
    {
        $query = $this->mysqli->query("SELECT id FROM hyip_users WHERE email='$email'")->fetchNumRows();
        return $query;
    }

    public function set_last_login($id)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];

        $get = $this->mysqli->query("SELECT last_ip,ip_track,last_browser,browser_track FROM hyip_users WHERE id=$id")->fetchSingleRow();
        if ($get['ip_track'] === '1' && $get['last_ip'] != $ip)
        {
            return 'ip';
        }
        if ($get['browser_track'] === '1' && $get['last_browser'] != $browser)
        {
            return 'browser';
        }
        $change = $this->mysqli->query("UPDATE hyip_users SET last_ip='$ip',last_browser='$browser' WHERE id=$id");
        return 'ok';
    }

    public function set_last_login_forced($id)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $change = $this->mysqli->query("UPDATE hyip_users SET last_ip='$ip',last_browser='$browser' WHERE id=$id");
    }

    public function get_username_by_id($id)
    {
        $name = $this->mysqli->query("SELECT full_name FROM hyip_users WHERE id=$id")->fetchSingleRow();
        return $name['full_name'];
    }

    public function get_user_by_mail($email)
    {
        $query = $this->mysqli->query("SELECT email,password,active,role,full_name,id,last_ip,last_browser FROM hyip_users WHERE email='$email'")->fetchAll();
        $res = array();
        $nr = $this->mysqli->query("SELECT id FROM hyip_users WHERE email='$email'")->fetchNumRows();
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

<?php

class Model_Auth extends Model
{

    public function add_user($full_name, $email, $password, $active, $role, $parent_id = NULL, $percents)
    {
        $mysqli = Database::getInstance();
        $sql = "INSERT INTO hyip_users (full_name, email, password, active, role, parent_id, percents) VALUES('$full_name','$email', '$password', '$active','$role',$parent_id,'$percents')";
        $result = $mysqli->query($sql)->fetchAll();
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

    public function get_user_by_mail($email)
    {
        $mysqli = Database::getInstance();
        $query = $mysqli->query("SELECT email,password,active,role,full_name,id FROM hyip_users WHERE email='$email'")->fetchAll();
        $res = array();
        $nr = $mysqli->query("SELECT email,password,active,role,full_name,id FROM hyip_users WHERE email='$email'")->fetchNumRows();
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
                    'id' => $row['id']
                );
            }
        }
        return array(
            $nr,
            $res
        );
    }

}

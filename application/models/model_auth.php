<?php

class Model_Auth extends Model
{

    public function add_user($full_name, $email, $password, $active, $role, $parent_id, $percents)
    {
        $mysqli = $GLOBALS['mysqli'];
        $sql = "INSERT INTO hyip_users (full_name, email, password, active, role, parent_id, percents) VALUES('$full_name','$email', '$password', '$active','$role',NULL,'$percents')";
        $result = $mysqli->query($sql);
        echo $mysqli->error;
        return $result;
    }

    public function update_user()
    {
        $mysqli = $GLOBALS['mysqli'];
    }

    public function activate_user($email)
    {
        $mysqli = $GLOBALS['mysqli'];
        $res = $mysqli->query("UPDATE hyip_users SET active = TRUE WHERE email='" . $email . "'");
        return $res;
    }

    public function get_num_users($email)
    {
        $mysqli = $GLOBALS['mysqli'];
        $query = $mysqli->query("SELECT id FROM hyip_users WHERE email='" . $email . "'");
        $numrows = $query->num_rows;
        return $numrows;
    }

    public function get_user_by_mail($email)
    {
        $mysqli = $GLOBALS['mysqli'];
        $query = $mysqli->query("SELECT email,password,active,role,full_name,id FROM hyip_users WHERE email='" . $email . "'");
        $res = array();
        $nr = $query->num_rows;
        if ($nr != 0)
        {
            while ($row = $query->fetch_assoc())
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

?>
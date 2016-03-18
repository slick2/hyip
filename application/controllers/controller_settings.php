<?php

class Controller_Settings extends Controller
{

    function __construct()
    {
        $this->model = new Model_Settings();
        $this->view = new View();
    }

    function action_index()
    {
        $mysqli = $GLOBALS['mysqli'];
        $uid = Session::get('id');
        $smail = Session::get('email');
        if (isset($_POST["change"]))
        {
            if (!empty($_POST['full_name']))
            {
                $full_name = $mysqli->real_escape_string($_POST['full_name']);
                $query = $mysqli->query("UPDATE hyip_users SET full_name='" . $full_name . "' WHERE email='" . $smail . "'");
            }
            if (!empty($_POST['email']))
            {
                $email = $mysqli->real_escape_string($_POST['email']);
                $query = $mysqli->query("UPDATE hyip_users SET email='" . $email . "' WHERE email='" . $smail . "'");
            }
            if (!empty($_POST['password']) && !empty($_POST['password_confirm']) && !empty($_POST['password_old']))
            {
                $password = $mysqli->real_escape_string($_POST['password']);
                $confirm = $mysqli->real_escape_string($_POST['password_confirm']);
                $old = $mysqli->real_escape_string($_POST['password_old']);
                $old_hash = $mysqli->query("SELECT password FROM hyip_users WHERE id=$uid");
                if ($password == $confirm && password_verify($old, $old_hash))
                {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $query = $mysqli->query("UPDATE hyip_users SET password='" . $password . "' WHERE email='" . $smail . "'");
                }
            }
            echo "<span>Данные успешно изменены!</span>";
        }

        if (Session::get('email') !== false)
        {
            $data = $this->model->get_data();
            $this->view->generate('settings_view.php', 'template_view.php', $data);
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }

}

?>
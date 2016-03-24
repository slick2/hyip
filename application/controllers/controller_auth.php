<?php

class Controller_Auth extends Controller
{

    function __construct()
    {
        $this->model = new Model_Auth();
        $this->view = new View();
    }

    function action_register()
    {
        $refid = 'NULL';
        $data = array();
        if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repeat_password']))
        {
            if ($_POST['repeat_password'] == $_POST['password'])
            {
                $mysqli = Database::getInstance();
                $full_name = $mysqli->quote($_POST['full_name']);
                $email = $mysqli->quote($_POST['email']);
                $password = $mysqli->quote($_POST['password']);
                $numrows = $this->model->get_num_users($email);
                if ($numrows == 0)
                {
                    if (isset($_GET['ref']))
                    {
                        $refid = $mysqli->quote($_GET['ref']);
                    }
                    $result = $this->model->add_user($full_name, $email, $password, FALSE, 'user', $refid, 0);
                    if ($result)
                    {
                        $message = "Регистрация прошла успешно. Письмо для активации отправлено на ваш e-mail.";
                        if (mail($email, "Вы зарегистрировались на сайте", "Для активации перейдите по ссылке http://money.rscx.ru/hyip/activate?email=" . $email))
                        {
                            echo "e-mail отправлен успешно";
                        }
                    }
                    else
                    {
                        $message = "Ошибка записи в базу данных!";
                    }
                }
                else
                {
                    $message = "Этот e-mail уже занят!";
                }
            }
            else
            {
                $message = "Пароли не совпадают!";
            }
        }
        else
        {
            $message = "Заполните необходимые поля!";
        }
        $data['message'] = $message;
        $this->view->generate('register_view.php', 'empty_view.php', $data);
    }

    function action_logout()
    {
        Session::destroy();
        header("Location: /auth");
    }

    function action_activate()
    {
        $email = $mysqli->quote($_GET['email']);
        $res = $this->model->activate_user($email);
        header("Location: private");
    }

    function action_index()
    {
        if (!empty($_POST['email']) && !empty($_POST['password']))
        {
            $mysqli = Database::getInstance();
            $message = "OK";
            $email = $mysqli->quote($_POST['email']);
            $password = $mysqli->quote($_POST['password']);
            $rs = $this->model->get_user_by_mail($email);
            if ($rs[0] != 0)
            {
                foreach ($rs[1] as $row)
                {
                    $dbemail = $row['email'];
                    $dbpassword = $row['password'];
                    $active = $row['active'];
                    $role = $row['role'];
                    $fullname = $row['full_name'];
                    $id = $row['id'];
                }
                if ($email == $dbemail && password_verify($password, $dbpassword))
                {
                    if ($active == 0)
                    {
                        $message = "Your account is not activated";
                    }
                    else
                    {
                        $safety = $this->model->set_last_login($id);
                        if ($safety == 'ok')
                        {
                            Session::set('email', $email);
                            Session::set('name', $fullname);
                            Session::set('role', $role);
                            Session::set('id', $id);
                            switch ($role)
                            {
                                case 'user':
                                    header("Location: private");
                                    break;
                                case 'admin':
                                    header("Location: admin");
                                    break;
                                default:
                                    echo 'Произошла ошибка входа';
                            }
                        }
                        else
                        {
                            switch ($safety)
                            {
                                case 'ip':
                                    $message = "Ваш ip-адрес изменился с последнего входа";
                                    break;
                                case 'browser':
                                    $message = "Ваш браузер изменился с последнего входа";
                            }
                        }
                    }
                }
                else
                {
                    $message = 'Неправильный email или пароль. Повторите попытку.';
                }
            }
            else
            {
                $message = 'Неправильное имя или пароль. Повторите попытку.';
            }
        }
        else
        {
            $message = "Заполните все поля.";
        }
        $data = array();
        $data['message'] = $message;
        $this->view->generate('login_view.php', 'empty_view.php', $data);
    }

}

<?php

class Controller_Auth extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Auth();
    }

    function action_register()
    {
        $text = $this->model->get_messages('register',true);
        $refid = 'NULL';
        $data = array();
        $message="";
        if (isset($_POST['register']))
        {
            if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repeat_password']))
            {
                if ($_POST['repeat_password'] == $_POST['password'])
                {
                    $full_name = $this->model->mysqli->quote($_POST['full_name']);
                    $email = $this->model->mysqli->quote($_POST['email']);
                    $password = $this->model->mysqli->quote($_POST['password']);
                    $numrows = $this->model->get_num_users($email);
                    if ($numrows == 0)
                    {
                        if (isset($_GET['ref']))
                        {
                            $refid = $this->model->mysqli->quote($_GET['ref']);
                        }
                        $result = $this->model->add_user($full_name, $email, $password, FALSE, 'user', $refid, 0);
                        if ($result)
                        {
                            $message = 'register_message_ok';
                            if (mail($email, $text['register_activate_email_title'], "{$text['register_activate_email_text']} https://pa.itinvestproject.com/hyip/activate?email=" . $email))
                            {
                                $message = 'register_message_mailsend_ok';
                            }
                            else
                            {
                                $message = 'register_message_mailsend_error';
                            }
                        }
                        else
                        {
                            $message = 'register_message_dberror';
                        }
                    }
                    else
                    {
                        $message = 'register_message_email';
                    }
                }
                else
                {
                    $message = 'register_message_passwords_notmatch';
                }
            }
            else
            {
                $message = 'auth_message_emptyfields';
            }
        }
        $data['message'] = $message;
        $data['text'] = $text;
        $this->view->generate('register_view.php', 'empty_view.php', $data);
    }

    function action_logout()
    {
        Session::destroy();
        header("Location: /auth");
    }

    function action_activate()
    {
        $email = $this->model->mysqli->quote($_GET['email']);
        $res = $this->model->activate_user($email);
        header("Location: private");
    }

    function action_index()
    {
        $text = $this->model->get_messages('login',true);
        $leftmenu = $this->model->get_messages('leftmenu');
        $topmenu = $this->model->get_upper_messages('topmenu');
        $ref = $this->model->get_one_message('reflink');
        if (!empty($_POST['email']) && !empty($_POST['password']))
        {
            $message = "OK";
            $email = $this->model->mysqli->quote($_POST['email']);
            $password = $this->model->mysqli->quote($_POST['password']);
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
                        $message = 'login_message_activate';
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
                            Session::set('leftmenu', $leftmenu);
                            Session::set('reflink',$ref);
                            Session::set('topmenu', $topmenu);
                            switch ($role)
                            {
                                case 'user':
                                    header("Location: private");
                                    break;
                                case 'admin':
                                    header("Location: admin");
                                    break;
                                default:
                                    $message = 'login_message_error';
                            }
                        }
                        else
                        {
                            switch ($safety)
                            {
                                case 'ip':
                                    $message = 'login_message_ipchange';
                                    break;
                                case 'browser':
                                    $message = 'login_message_browserchange';
                                    break;
                            }
                        }
                    }
                }
                else
                {
                    $message = 'login_message_incorrect';
                }
            }
            else
            {
                $message = 'login_message_incorrect';
            }
        }
        else
        {
            $message = 'auth_message_emptyfields';
        }
        $data = array();
        $data['message'] = $message;
        $data['text'] = $text;
        $this->view->generate('login_view.php', 'empty_view.php', $data);
    }

}

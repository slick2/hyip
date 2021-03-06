<?php

class Controller_Auth extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Auth();
    }
    
    function action_restore()
    {
        $text = $this->model->get_messages('login', true);
        $register = $this->model->get_messages('register', true);
	$message = "";
	$data = array();
        
        if(isset($_POST['restore']))
        {
            if(!empty($_POST['email']) )
            {
                $mail = $this->model->mysqli->quote($_POST['email']);
                $newpass = $this->model->generate_password();
                $emailRestore = $this->model->get_messages('password_restore_message')['password_restore_message'];
                $emailRestoreTitle = $this->model->get_messages('restore_mail_header')['restore_mail_header'];
                $this->model->set_password($mail,$newpass);
                    $headers = "From: office@itinvestproject.com\r\n";
                    $headers .= "Reply-To: office@itinvestproject.com\r\n";
                    $headers .= "Return-Path: office@itinvestproject.com\r\n";
                if(mail($mail, $emailRestoreTitle, $emailRestore. $newpass, $headers))
                {
                    header("Location: auth");
                }
                else
                {
                    $message = 'register_message_mailsend_error';
                }
            }
            else
            {
                $message = 'auth_message_emptyfields';
            }
        }
        $data['message'] = $message;
        $data['text'] = $text;
        $data['register'] = $register;
        $this->view->generate('restore_view.php', 'empty_view.php',$data);
        
    }
    function action_register()
    {
        $text = $this->model->get_messages('register', true);
        $ref = $this->model->get_one_message('ref_inviteyou');
        $refid = 'NULL';
        $data = array();
        $message = "";
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
                        $emailBody = $this->model->get_messages('register_activate_email_body')['register_activate_email_body'];
                        $emailFooter = $this->model->get_messages('register_activate_email_footer')['register_activate_email_footer'];
                        if ($result)
                        {
                            $message = 'register_message_ok';
                            $headers = "From: office@itinvestproject.com\r\n";
                            $headers .= "Reply-To: office@itinvestproject.com\r\n";
                            $headers .= "Return-Path: office@itinvestproject.com\r\n";
                            if (mail($email, $text['register_activate_email_title'], $emailBody.
"https://pa.itinvestproject.com/activate?email=$email".$emailFooter, $headers))
                            //
                            {
                                if(@$result['active']==0){
                                    Session::set('activated', 0);
                                }
                                $message = 'register_message_mailsend_ok';
                                $text = $this->model->get_messages('login', true);
                                $leftmenu = $this->model->get_messages('leftmenu');
                                $topmenu = $this->model->get_messages('topmenu');
                                $ref = $this->model->get_one_message('reflink');                            
                                Session::set('email', $email);
                                Session::set('name', $full_name);
                                Session::set('role', 'user');
                                Session::set('id', $result['id']);
                                Session::set('leftmenu', $leftmenu);
                                Session::set('reflink', $ref);
                                Session::set('topmenu', $topmenu);
                                header('Location: /private');                                
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
        if (isset($_GET['ref']))
        {
            $rid = $this->model->mysqli->quote($_GET['ref']);
            $name = $this->model->get_username_by_id($rid);
            $data['referrer'] = $name;
        }
        $data['message'] = $message;
        $data['text'] = $text;
        $data['text']['refyou'] = $ref;
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
        if(isset($_GET['email'])){
            $email = $this->model->mysqli->quote($_GET['email']);
            $res = $this->model->activate_user($email);
            header("Location: private");
        }
        $text = $this->model->get_messages('login', true);
        $leftmenu = $this->model->get_messages('leftmenu');
        $topmenu = $this->model->get_messages('topmenu');        
        $alertNotActive = $this->model->get_messages('not_active')['not_active'];
        Session::set('not_active', $alertNotActive);
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
                    $isBanned = (bool) $row['banned'];
                    //var_dump($row); exit;
                }
                if ($email == $dbemail && password_verify($password, $dbpassword))
                {
                    //if ($active == 0)
                    if ($active < 0)
                    {
                        $message = 'login_message_activate';
                    }
                    else
                    {
                        if (isset($_GET['verify']) && password_verify($email, $_GET['verify']))
                        {
                            $this->model->set_last_login_forced($id);
                        }
                        $safety = $this->model->set_last_login($id);
                        $errmoney = $this->model->get_error_money($id);
                        if ($safety == 'ok')
                        {
                            Session::set('email', $email);
                            Session::set('name', $fullname);
                            Session::set('role', $role);
                            Session::set('id', $id);
                            Session::set('leftmenu', $leftmenu);
                            Session::set('reflink', $ref);
                            Session::set('topmenu', $topmenu);
                            Session::set('isBanned', $isBanned);
                            Session::set('errmoney', $errmoney);
                            if($isBanned){
                                header("Location: /");
                            }
                            if($active == 0){                                
                                Session::set('activated', 0);
                            }
                            else {
                                Session::set('activated', 1);
                            }
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
                            $headers = "From: office@itinvestproject.com\r\n";
                            $headers .= "Reply-To: office@itinvestproject.com\r\n";
                            $headers .= "Return-Path: office@itinvestproject.com\r\n";
                            switch ($safety)
                            {
                                case 'ip':
                                    $message = 'login_message_ipchange';
                                    $mailOperaton = $this->model->get_messages('email_enter_operation')['email_enter_operation'];
                                    mail($email,$mailOperaton.password_hash($email, PASSWORD_DEFAULT), $headers);
                                    break;
                                case 'browser':
                                    $message = 'login_message_browserchange';
                                    mail($email,$mailOperaton.password_hash($email, PASSWORD_DEFAULT),$headers);
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

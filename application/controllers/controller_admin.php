<?php
class Controller_Admin extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Admin();
        
    }
    
    function action_translation()
    {
        if (Session::get('email') && Session::get('role') == 'admin')
        {
            if(isset($_POST['id']))
            {
                
                if(!empty($_POST['russian']))
                {
                    $this->model->set_string($_POST['id'],'russian',$_POST['russian']);
                }
                if(!empty($_POST['english']))
                {
                    $this->model->set_string($_POST['id'],'english',$_POST['english']);
                }
                if(!empty($_POST['chinese']))
                {
                    $this->model->set_string($_POST['id'],'chinese',$_POST['chinese']);
                }
                if(!empty($_POST['vietnamese']))
                {
                    $this->model->set_string($_POST['id'],'vietnamese',$_POST['vietnamese']);
                }
            }
            elseif(isset($_POST['translate']))
            {
                foreach ($_POST as $key=>$value)
                {
                    $args = explode('_', $key);
                    if(isset($args[1]) && !empty($value) && $args[1] != 'submit')
                    {
                        $tid = intval($args[0]);
                        $lang = $args[1];
                        $this->model->set_string($tid,$lang,$value);
                    }
                }
            }

            $data = $this->model->get_strings();
            $this->view->generate('translation_view.php', 'template_view.php', $data);
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }
            

    function action_index()
    {
        if (Session::get('email') && Session::get('role') == 'admin')
        {
            
            if(isset($_POST['proc']))
            {
                $this->model->set_percents();
            }
            if(isset($_POST['toggle']))
            {
                $toggle = $this->model->mysqli->quote($_POST['toggle']);
                $system = $this->model->mysqli->quote($_POST['system']);
                $id = $this->model->mysqli->quote($_POST['id']);
                $this->model->toggle($system,$toggle,$id);
            }
            if(isset($_POST['admadd']))
            {
                $this->model->add_account();
            }
            if(isset($_POST['admchange']))
            {
                $this->model->change_account();
            }
            $data_acc = $this->model->get_accounts();
            $data_syst = $this->model->get_systems();
            $data_perc = $this->model->get_percents();
            $data = array(
                'systems' => $data_syst,
                'accounts' => $data_acc,
                'percents' => $data_perc
            );
            $this->view->generate('admin_view.php', 'template_view.php', $data);
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }

}
<?php

class Controller_Deposits extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Deposits();
        
    }

    function action_index()
    {
        if (Session::get('email') !== false)
        {
            $text = $this->model->get_messages('deposits');
            $text['system'] = $this->model->get_one_message('private_system');
            $text['sum'] = $this->model->get_one_message('private_sum');
            $td = $this->model->get_pager(10);
            $data = array(
                'deposits' => $this->model->get_all_deposits($text['deposits_pay_notyet']),
                'page' => $td['page'],
                'start' => $td['start'],
                'total' => $td['total'],
                'text' => $text
            );
            $this->view->generate('deposits_view.php', 'template_view.php', $data);
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }

    function action_add()
    {
        if (Session::get('email') !== false)
        {            
            $data = array();
            $data['activeSystems'] = $this->model->getActiveSysyems(); 
            $data['text'] = $this->model->get_messages('newdeposit');
            if (isset($_POST['addcash']))
            {
                if (!empty($_POST['sum']) && !empty($_POST['moneyadd']))
                {
                    $data['all'] = $this->model->add_deposit();
                    $name = 'get_in_'.strtolower($data['all']['syst']);
                    $data['account'] = $this->model->$name();
                    $this->view->generate('payhub_view.php', 'template_view.php', $data);
                }
                else
                {
                    $data['newdeposit'] = $this->model->get_one_message('private_create_deposit');
                    $data['all']  = array('message' => $data['text']['newdeposit_empty_field']);
                    $data['systems'] = $this->model->get_paysystems();
                    $this->view->generate('newdeposit_view.php', 'template_view.php', $data);
                }
            }
            else
            {
                $data['newdeposit'] = $this->model->get_one_message('private_create_deposit');
                $data['systems'] = $this->model->get_paysystems();
                $this->view->generate('newdeposit_view.php', 'template_view.php',$data);
            }
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }
    function action_calcpublic()
    {
            $data = array();
            $data['activeSystems'] = $this->model->getActiveSysyems(); 
            $data['text'] = $this->model->get_messages('newdeposit');



                    $data['newdeposit'] = $this->model->get_one_message('private_create_deposit');
                    $data['all']  = array('message' => $data['text']['newdeposit_empty_field']);
                    $data['systems'] = $this->model->get_paysystems();
                    $this->view->generate('calcdeposit_view.php', 'templateempty_view.php', $data);
    }
}

?>

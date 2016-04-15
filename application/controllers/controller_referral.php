<?php

class Controller_Referral extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Referral();
    }

    function action_links()
    {
        if (Session::get('email') !== false)
        {
            $data['text'] = $this->model->get_messages('ref');
            $this->view->generate('reflinks_view.php', 'template_view.php', $data);
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }

    function action_index()
    {
        if (Session::get('email') !== false)
        {
            /*
            if (isset($_POST['outperc']))
            {
                if($this->model->user_accounts() < 4)
                {
                    echo "Для вывода денег вы дожны иметь аккаунты на всех платежных системах!";
                }
                else
                {
                    
                }
            }*/
            $data['ref_warning_header'] = $this->model->get_messages('referal_warning_header')['referal_warning_header'];
            $data['ref_warning_text'] = $this->model->get_messages('referal_warning_text')['referal_warning_text'];            
            $data['all'] = $this->model->get_data();
            $data['accounts'] = $this->model->user_accounts();
            $data['text'] = $this->model->get_messages('ref');
            $this->view->generate('referral_view.php', 'template_view.php', $data);
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }
}
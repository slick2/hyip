<?php

class Controller_Private extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Orders();        
    }

    function action_index()
    {
        if (Session::get('email'))
        {
            $data['text'] = $this->model->get_messages('private');
            $data['alldata'] = $this->model->get_data($data['text']);
            $data['text']['money_export'] = $this->model->get_messages('money_export')['money_export'];            
            $this->view->generate('private_view.php', 'template_view.php', $data);
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }

}

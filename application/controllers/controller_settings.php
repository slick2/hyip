<?php

class Controller_Settings extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Settings();
        
    }

    function action_index()
    {              
        $text = $this->model->get_messages('settings');
        if (isset($_POST["change"]))
        {
            $this->model->update_user();
            $message = $text['settings_data_changed'];
        }
       
        if(isset ($_POST["safety"]))
        {
            $this->model->update_safety();
            $message = $text['settings_data_changed'];
        }

        if (Session::get('email') !== false)
        {
            $data = array();
            $data['systems'] = $this->model->get_data();
            //var_dump($data);
            $data['text'] = $text;
            if(isset($message))
            {
                $data['message'] = $message;
            }
            //var_dump($data);
            $this->view->generate('settings_view.php', 'template_view.php', $data);
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }

}
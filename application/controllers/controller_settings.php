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
        elseif(isset ($_POST["safety"]))
        {
            $this->model->update_safety();
            $message = $text['settings_data_changed'];
        }

        if (Session::get('email') !== false)
        {
            $data = array();
            $data['systems'] = $this->model->get_data();
            $data['text'] = $text;
            if(isset($message))
            {
                $data['message'] = $message;
            }
            $this->view->generate('settings_view.php', 'template_view.php', $data);
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }

}
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
        if (isset($_POST["change"]))
        {
            $this->model->update_user();
            $message = "Данные успешно изменены!";
        }
        elseif(isset ($_POST["safety"]))
        {
            $this->model->update_safety();
            $message = "Данные успешно изменены!";
        }

        if (Session::get('email') !== false)
        {
            $data = array();
            $data['systems'] = $this->model->get_data();
            if(isset($message))
                $data['message'] = $message;
            $this->view->generate('settings_view.php', 'template_view.php', $data);
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }

}
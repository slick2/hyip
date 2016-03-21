<?php

class Controller_Settings extends Controller
{

    function __construct()
    {
        $this->model = new Model_Settings();
        $this->view = new View();
    }

    function action_index()
    {
        if (isset($_POST["change"]))
        {
            $this->model->update_user();
            $message = "<span>Данные успешно изменены!</span>";
        }

        if (Session::get('email') !== false)
        {
            $data = $this->model->get_data();
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

?>
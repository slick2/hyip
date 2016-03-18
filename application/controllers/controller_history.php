<?php

class Controller_History extends Controller
{

    function __construct()
    {
        $this->model = new Model_Orders();
        $this->view = new View();
    }

    function action_index()
    {
        if (Session::get('email') !== false)
        {
            $data = $this->model->get_data();
            $this->view->generate('history_view.php', 'template_view.php', $data);
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }

}
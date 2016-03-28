<?php
class Controller_Admin extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Admin();
        
    }

    function action_index()
    {
        if (Session::get('email') !== false)
        {
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
            $data = array(
                'systems' => $data_syst,
                'accounts' => $data_acc
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
<?php

class Controller_Deposits extends Controller
{

    function __construct()
    {
        $this->model = new Model_Deposits();
        $this->view = new View();
    }

    function action_index()
    {
        if (Session::get('email') !== false)
        {
            $td = $this->model->get_pager(10);
            $data = array(
                'first' => $this->model->get_deposit(),
                'deposits' => $this->model->get_all_deposits(),
                'page' => $td['page'],
                'start' => $td['start'],
                'total' => $td['total'],
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
            if (isset($_POST['addcash']))
            {
                if (isset($_POST['sum']) && isset($_POST['moneyadd']))
                {
                    $data = $this->model->add_deposit();
                    $this->view->generate('payhub_view.php', 'template_view.php', $data);
                }
                else
                {
                    $data = array('message' => 'Укажите сумму и платежную систему!');
                    $this->view->generate('newdeposit_view.php', 'template_view.php', $data);
                }
            }
            else
            {
                $data = $this->model->get_paysystems();
                $this->view->generate('newdeposit_view.php', 'template_view.php',$data);
            }
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }

}

?>

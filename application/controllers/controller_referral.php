<?php
class Controller_Referral extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Referral();        
    }
    function action_index()
    {
        if (Session::get('email') !== false)
        {
            $data = $this->model->get_data();
            $this->view->generate('referral_view.php', 'template_view.php', $data);
        }
        else
        {
            Session::destroy();
            header("Location:/auth");
        }
    }
}
?>
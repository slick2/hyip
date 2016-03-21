<?php

class Controller_Pay extends Controller
{
    function __construct()
    {
        //$this->model = new Model_Pay();
        $this->view = new View();
    }
    
    function action_index()
    {
        $this->view->generate('pay_view.php','template_view.php');
    }
    function action_success()
    {
        $data = "Пополнение выполнено успешно.<a href='/private'>Вернуться в личный кабинет</a>";
        $this->view->generate('pay_view.php','template_view.php',$data);
    }
    function action_fail()
    {
        $data = "Ошибка пополнения.<a href='/private'>Вернуться в личный кабинет</a>";
        $this->view->generate('pay_view.php','template_view.php',$data);
        
    }
}
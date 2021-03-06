<?php

class Controller_Pay extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Pay();        
    }
    
    function action_index()
    {
        $this->view->generate('pay_view.php','template_view.php');
    }
    function action_syidsjhxtas()
    {
        $this->model->succeed_pay();
        $data = ['message' => "Пополнение выполнено успешно.<a href='/private'>Вернуться в личный кабинет</a>"];
        $this->view->generate('pay_view.php','template_view.php',$data);
    }
    function action_fqh4k981rlb()
    {
        header('Content-Type: text/html; charset=utf-8');
        $this->model->fail_pay();
        $data = ['message' => "Ошибка пополнения.<a href='/private'>Вернуться в личный кабинет</a>"];
        $this->view->generate('pay_view.php','template_view.php',$data);  
    }
    function action_out()
    {
        require_once 'include/out.php';
    }
    function action_rates()
    {
        require_once 'include/exdaily.php';
    }
}
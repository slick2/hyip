<?php

class Route
{

    static function start()
    {    
        //var_dump($_SESSION);
        $models = array(
            'private' => 'Model_Orders', 
            'auth' => 'Model_Auth', 
            'deposits' => 'Model_Deposits', 
            'settings' => 'Model_Settings', 
            'referral' => 'Model_Referral',
            'admin' => 'Model_Admin',
            'history'=>'Model_Orders',
            'pay' => 'Model_Pay');
        $controllers = array('login' => 'auth', 'register' => 'auth', 'logout' => 'auth', 'activate' => 'auth');
        // контроллер и действие по умолчанию
        $controller_name = 'private';
        $action_name = 'index';
        if(isset($_SESSION['session_isBanned']) && !!$_SESSION['session_isBanned']){
            $db = Database::getInstance();
            $query = "select * from hyip_translations where tag='banned'";
            $message = $db->query($query)->result[0];
            $lang = (isset($_SESSION['lang'])) ? $_SESSION['lang'] : 'russian';
            $_SESSION['bannedMessage'] = $message[$lang];
            if($_SERVER['REQUEST_URI']!='/auth'){
                header('Location: /auth');
            }
        }
        $tr = explode('?', $_SERVER['REQUEST_URI']);
        $routes = explode('/', $tr[0]);

        // получаем имя контроллера
        if (!empty($routes[1]))
        {
            $controller_name = $routes[1];
        }
        // получаем имя экшена
        if (!empty($routes[2]))
        {
            $action_name = $routes[2];
        }
        if (isset($controllers[$controller_name]))
        {
            $controller_name = $controllers[$controller_name];
        }
        if (isset($models[$controller_name]))
        {
            $model_name = $models[$controller_name];
        }
        else
        {
            $model_name = "";
        }
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;
        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name) . '.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path))
        {
            include "application/models/" . $model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "application/controllers/" . $controller_file;
        if (file_exists($controller_path))
        {
            include "application/controllers/" . $controller_file;
        }
        else
        {
            Route::ErrorPage404();
        }

        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action();
        }
        else
        {
            Route::ErrorPage404();
        }
    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }

}

<?php
class Route
{
	static function start()
	{
		$models = array('private' => 'Model_Orders','auth' => 'Model_Auth','deposits' => 'Model_Deposits', 'settings' => 'Model_Settings', 'referral' => 'Model_Referral');
		$controllers = array('login' => 'auth', 'register' => 'auth', 'logout'=>'auth','activate'=>'auth');
		// контроллер и действие по умолчанию
		$controller_name = 'private';
		$action_name = 'index';

		$tr = explode('?', $_SERVER['REQUEST_URI']);
		$routes = explode('/', $tr[0]);

		// получаем имя контроллера
		if ( !empty($routes[2]) )
		{
			$controller_name = $routes[2];
		}
		// получаем имя экшена
		if ( !empty($routes[3]) )
		{
			$action_name = $routes[3];
		}
		if(isset($controllers[$controller_name]))
		{
			$controller_name = $controllers[$controller_name];
		}
		$model_name = $models[$controller_name];
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{	
			include "application/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			//Route::ErrorPage404();
		}

		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;

		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			//Route::ErrorPage404();
		}

	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}

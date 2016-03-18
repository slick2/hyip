<?php
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
require_once 'helpers/session.php';
require_once 'helpers/Database.php';
Session::init();
Route::start(); // запускаем маршрутизатор
?>

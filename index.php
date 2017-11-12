<?php
//FRONT CONTROLLER


// 1. Общие настройки
    ini_set('display_errors', 1);//отображение ошибок
    error_reporting(E_ALL);

    session_start();
// 2. Подключение файлов системы
    define('ROOT', dirname(__FILE__));//полный путь к файлу на диске, ROOT-переменная-константа, куда записался путь
    require_once (ROOT.'/components/Autoload.php');
    require_once (ROOT.'/components/Router.php');
    require_once  (ROOT.'/components/Db.php');

// 4. Вызов Router
    $router = new Router(); //создаем экземпляр класса Router
    $router->run(); //запускаем метод run
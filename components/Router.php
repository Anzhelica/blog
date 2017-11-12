<?php
class Router
{
    private $routes; // массив в котором будут храниьтся маршруты

    public function __construct() // конструктор в котором мы прочитаем и запомним маршруты
    {
        $routesPath = ROOT.'/config/routes.php';//путь с базовой директории и путь к созданому файлу с роутами
        $this->routes = include($routesPath);//присваиваем свойству $routes масив который храниться в файле routes
    }
    private function getURI()
    {
        //с помощью суперглобального массива $_SERVER по ключу REQUEST_URI мы получаем нужную строку запроса
        if (!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }
    public function run() //будет принимать управление от FRONT CONTROLLER'a анализ запроса и передача управления
    {
        //Получить строку запроса
        $uri = $this->getURI();
        //Проверить наличие такого запроса в файле routes
        //для каждого маршрута мы помещаем в $uriPattern строку запроса из routes а в переменную $path -
        // помещаем путь обработчика
        foreach ($this->routes as $uriPattern => $path)
        {
           //echo "<br>$uriPattern -> $path";
            //сравниваем $uriPattern и $uri
            //для этого передаем строку запроса $uri и данные из наших routes
            // знак ~ вместо / потому что в роутах могут быть ути со /
            if(preg_match("~$uriPattern~", $uri))
            {
                //определить какой контроллер  и екшн обрабатывает запрос
                // используя explode для того что бы разбить строку на две части
                $internalRoute = preg_replace("~$uriPattern~",$path,$uri);

                $segments = explode('/', $internalRoute);
               // print_r($segments);

                //получаем имя контроллера

                //array_shift получает значение первого эллемента в массиве и удаляет его из массива
                $controllerName = array_shift($segments).'Controller';
                //делаем первую букву в строке заглавной
                $controllerName = ucfirst($controllerName);

                //получаем action

                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;
                //Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                // проверяем существует ли такой файл на диске
                if(file_exists($controllerFile)){
                    include_once ($controllerFile);
                }
                //Создать объект и вызвать метод(екшн)
                $controllerObject = new $controllerName;

                //вызывает екшн с именем $actionName у объекта $controllerObject  при этом передает массив с
                //параметрами

                $result = call_user_func_array(array($controllerObject, $actionName),$parameters);
                if($result != null){
                    break;
                }
            }
        }

    }
}
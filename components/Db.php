<?php
class Db
{

    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        //получаем параметры соединения
        $params = include($paramsPath);
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
       
        $db->exec("set names utf8");
        //возвращаем объект класса PDO
        return $db;
    }
}
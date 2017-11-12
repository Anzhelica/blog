<?php

class Admin
{
    public static function checkA()
    {
        $userId = User::checkLogged();
        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);
        // Если роль текущего пользователя "admin", пускаем его в админпанель
        if ($user['role'] == 'admin') {
            return true;
        }
        die(header("Location:/views/acces/access.php"));
    }

    public static function checkAdmin()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        if ($user['role'] == 'admin') {
            return true;
        }

    }
}
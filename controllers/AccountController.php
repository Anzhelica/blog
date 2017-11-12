<?php
class AccountController
{
    public function actionIndex()
    {
        $result = false;
        $postsList = Posts::getPostsList();
        $category = Category::getCategoryList();
        $tags = Posts::getTagsList();
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        require_once (ROOT . '/views/account/edit.php');
        return true;
    }

    public function actionEdit()
    {
        $postsList = Posts::getPostsList();
        $category = Category::getCategoryList();
        $tags = Posts::getTagsList();
        //  идентификатор пользователя из сессии
        $userId = User::checkLogged();
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        $result = false;
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $repeat_password = $_POST['repeat_password'];
            $errors = false;

            if(!User::checkName($name)){
                $errors[] = 'Имя не должно быть короче 2-x символов';
            }
            if(!User::checkPassword($password)){
                $errors[] = 'Пароль не должен быть короче 6 символов';
            }
            if(!User::checkRepeatPassword($password,$repeat_password)){
                $errors[] = 'Пароли не совпадают';
            }
            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }
        }
        require_once(ROOT . '/views/account/edit.php');
        return true;
    }
}
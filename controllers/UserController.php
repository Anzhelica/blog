<?php

class UserController
{

    public function actionRegister()
    {
        $tags = Posts::getTagsList();
        $postsList = Posts::getPostsList();
        $category = Category::getCategoryList();
        $result = false;
        $name = '';
        $password = '';
        $repeat_password = '';
        $email = '';


        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $repeat_password = $_POST['repeat_password'];
            $email = $_POST['email'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-x символов';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 символов';
            }
            if (!User::checkRepeatPassword($password, $repeat_password)) {
                $errors[] = 'Пароли не совпадают';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }

        }
        require_once(ROOT . '/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        $tags = Posts::getTagsList();
        $postsList = Posts::getPostsList();
        $category = Category::getCategoryList();
        // Переменные для формы
        $email = false;
        $password = false;

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $errors = false;
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            $userId = User::checkUserData($email, $password);
            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                User::auth($userId);
                header("Location: /posts");
            }
        }
        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION["user"]);
        header("Location: /");
    }
}
<?php

class AdminUsersController
{
    public function actionIndex()
    {
        Admin::checkA();
        $usersList = User::getUsersList();

        require_once(ROOT . '/views/admin_users/index.php');
        return true;
    }

    public function actionDelete($id)
    {
        Admin::checkA();
        if (isset($_POST['submit'])) {
            User::deleteUsers($id);
            header("Location: /admin");
        }
        require_once(ROOT . '/views/admin_users/delete.php');
        return true;
    }

    public function actionUpdate($id)
    {
        Admin::checkA();
        $users = User::getUserById($id);
        if (isset($_POST['submit'])) {
            $role = $_POST['role'];
            User::updateUserssById($id, $role);

            header("Location: /admin/users");
        }
        require_once(ROOT . '/views/admin_users/update.php');
        return true;
    }

    public function actionCreate()
    {
        Admin::checkA();
        $result = false;
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
                header("Location: /admin/users");
            }
        }
        require_once(ROOT . '/views/admin_users/create.php');
        return true;
    }

}
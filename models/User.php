<?php
class User
{
    public static function register($name, $email, $password)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name, email, password) '
                . 'VALUES (:name, :email, :password)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);

        return $result->execute();
    }
    public static function checkName($name){
        if(strlen($name) >= 2){
            return true;
        }
        return false;
    }
    public static function checkPassword($password){
        if(strlen($password) >=6){
                return true;
        }
        return false;
    }
    public static function checkRepeatPassword($password, $repeat_password){
            if(strcmp ( $password,$repeat_password ) == 0){
                return true;
        }
        return false;
    }
    public static function checkEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email){
        $db = Db::getConnection();
        //подготовленый запрос отличается от обычного тем, что
        //не передаем прямо в запрос наш параметр а используем плейсхолдер(делается для безопасности)
        $sql = 'SELECT COUNT(*) FROM user where email = :email';

        $result = $db->prepare($sql);
        //тут плейсхолдер заменяем на наш параметр
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
//проверяем есть ли записи
        if($result->fetchColumn())
            return true;
        return false;
    }
    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if($user){
            return $user['id'];
        }
        return false;
    }
    /**
     * Запоминаем пользователя
     * @param integer $userId <p>id пользователя</p>
     */
    public static function auth($userId)
    {
       
        $_SESSION['user'] = $userId;
    }
    public static function checkLogged()
    {
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header("Location:/user/login");
    }
    public static function isGuest()
    {
       
        if(isset($_SESSION['user'])){
            return false;
        }
        return true;
    }

    public static function getUserById($id)
    {
        if($id){
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            //указываем что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }
    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();

        $sql = "UPDATE user 
        SET name = :name, password = :password 
        WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
    public static function getUsersList()
    {
        $db = Db::getConnection();
        $usersList = array();
        $result = $db->query('SELECT * '
            . 'FROM user '
            . 'ORDER BY id DESC ');
        $i = 0;
        while($row = $result->fetch()){
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['name'] = $row['name'];
            $usersList[$i]['email'] = $row['email'];
            $usersList[$i]['password'] = $row['password'];
            $usersList[$i]['role'] = $row['role'];
            $i++;
        }

        return $usersList;
    }
    public static function deleteUsers($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE from user WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function updateUserssById($id, $role)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE user
            SET 
                role=:role
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':role', $role, PDO::PARAM_STR);

        return $result->execute();
    }
}
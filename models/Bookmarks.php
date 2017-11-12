<?php
class Bookmarks
{

    public static function addPost($iduser,$id)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO likes (id_user, id_post) '
            . 'VALUES (:iduser, :id)';
        $result = $db->prepare($sql);//запрос подготавливается
        $result->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Выполняем запрос,возвращаем true/false
        return $result->execute();
    }
    public static function delPost($iduser,$id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM likes WHERE id_user = :iduser AND id_post = :id ';
        $result = $db->prepare($sql);
        $result->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function checkLikeExists($iduser, $idpost){
        $db = Db::getConnection();
        //подготовленый запрос отличается от обычного тем, что
        //не передаем прямо в запрос наш параметр а используем плейсхолдер(делается для безопасности)
        $sql = 'SELECT COUNT(*) FROM likes where id_user = :iduser AND id_post = :idpost';

        $result = $db->prepare($sql);
        //тут плейсхолдер заменяем на наш параметр
        $result->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $result->bindParam(':idpost', $idpost, PDO::PARAM_INT);
        $result->execute();
//проверяем есть ли записи
        if($result->fetchColumn())//получаем значение единственной колонки, потому что она одна
            return true;
        return false;
    }
    public static function getLikedPosts($userId)
    {
        $db = Db::getConnection();
        $likedPosts = array();
        $result = $db->query('SELECT id, title, text, tag, img_path, data '
        . 'FROM posts  inner join likes on id_post=id where id_user = '.$userId);

        $i = 0;
        //$row - строка из бд
        while($row = $result->fetch()){
            $likedPosts[$i]['id'] = $row['id'];
            $likedPosts[$i]['title'] = $row['title'];
            $likedPosts[$i]['text'] = $row['text'];
            $likedPosts[$i]['tag'] = $row['tag'];
            $likedPosts[$i]['img_path'] = $row['img_path'];
            $likedPosts[$i]['data'] = $row['data'];
            $i++;
        }
        return $likedPosts;
    }
    public static function getLikeForPost($postId)
    {
        $db = Db::getConnection();

        $result = $db->query("select count(id_user) as 'count' from likes where id_post=".$postId);
        $row =  $result->fetch();
        return $row['count'];
    }
    public static function getUserByLikes($idPost){
        $db = Db::getConnection();
        $likedUser = array();
        $result = $db->query('SELECT id, name '
            . 'FROM user  inner join likes on id_user=id where id_post = '.$idPost);

        $i = 0;
        //$row - строка из бд
        while($row = $result->fetch()){
            $likedUser[$i]['id'] = $row['id'];
            $likedUser[$i]['name'] = $row['name'];
            $i++;
        }
        return $likedUser;
    }
    public static function getDate($idUser){
        $db = Db::getConnection();

        $result = $db->query("select date as 'date' from likes where id_user=".$idUser);
        $row =  $result->fetch();
        return $row['date'];
    }
    public static function deleteLikes($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE from likes WHERE id_post=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}
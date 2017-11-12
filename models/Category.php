<?php
class Category
{

    public static function getCategoryList(){

        $db = Db::getConnection();
        $categorylist = array();
        $result = $db->query('select id, name from category ORDER by id  ASC');

        $i = 0;
        while($row=$result->fetch()){
            $categorylist[$i]['id']=$row['id'];

            $categorylist[$i]['name']=$row['name'];
            $i++;
        }
        return $categorylist;
    }
    public static function getCategoryForPosts($id){

        $db = Db::getConnection();
        $categorylist = array();
        $result = $db->query('select id, name from category inner join posts_category on id=id_category where id_posts='.$id);

        $i = 0;
        while($row=$result->fetch()){
            $categorylist[$i]['id']=$row['id'];

            $categorylist[$i]['name']=$row['name'];
            $i++;
        }
        return $categorylist;
    }
    public static function checkExistCategory($category){
        $db = Db::getConnection();
        //подготовленый запрос отличается от обычного тем, что
        //не передаем прямо в запрос наш параметр а используем плейсхолдер(делается для безопасности)
        $sql = 'SELECT COUNT(*) FROM category where name = :name';

        $result = $db->prepare($sql);
        //тут плейсхолдер заменяем на наш параметр
        $result->bindParam(':name', $category, PDO::PARAM_STR);
        $result->execute();
        //проверяем есть ли записи
        if($result->fetchColumn())
            return true;
        return false;
    }
    public static function checkExistPostsCategory($postId,$categoryId){
        $db = Db::getConnection();
        //подготовленый запрос отличается от обычного тем, что
        //не передаем прямо в запрос наш параметр а используем плейсхолдер(делается для безопасности)
        $sql = 'SELECT COUNT(*) FROM posts_category where id_posts = :PostId AND id_category = :categoryId';

        $result = $db->prepare($sql);
        //тут плейсхолдер заменяем на наш параметр
        $result->bindParam(':PostId', $postId, PDO::PARAM_INT);
        $result->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $result->execute();
        //проверяем есть ли записи
        if($result->fetchColumn())
            return true;
        return false;
    }
    public static function getCategoryId($category){
        $db = Db::getConnection();

       $sql = "select id from category where name = :name";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $category, PDO::PARAM_STR);

        $result->execute();

        $user = $result->fetch();
        if($user){
            return $user['id'];
        }
        return false;
    }
    public static function addToPostsCategory($idPosts, $idCategory){
     
        $db = Db::getConnection();

        $sql = 'INSERT INTO posts_category (id_posts, id_category) '
            . 'VALUES (:id_posts, :id_category)';
        $result = $db->prepare($sql);
        $result->bindParam(':id_posts', $idPosts, PDO::PARAM_INT);
        $result->bindParam(':id_category', $idCategory, PDO::PARAM_INT);

        return $result->execute();
    }
    public static function addToCategory($name){
        $db = Db::getConnection();

        $sql = 'INSERT INTO category (name) '
            . 'VALUES (:name)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);

        return $result->execute();
    }
    public static function deletePostsCategory($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE from posts_category WHERE id_posts=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function deleteCategoryfromCategory($idCategory)
    {
        $db = Db::getConnection();
        $sql = 'DELETE from category WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $idCategory, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function getCategoryIdFromDelete($idPosts){

        $db = Db::getConnection();
        $categorylist = array();
        $result = $db->query('select id_category from posts_category  where id_posts='.$idPosts);

        $i = 0;
        while($row=$result->fetch()){
            $categorylist[$i]['id_category']=$row['id_category'];
            $i++;
        }
        return $categorylist;
    }
    public static  function categoryForAnotherExists($idPosts,$idCategory){
        $db = Db::getConnection();
        //подготовленый запрос отличается от обычного тем, что
        //не передаем прямо в запрос наш параметр а используем плейсхолдер(делается для безопасности)
        $sql = 'SELECT COUNT(*) FROM posts_category where id_posts != :PostId AND id_category = :categoryId';

        $result = $db->prepare($sql);
        $result->bindParam(':PostId', $idPosts, PDO::PARAM_INT);
        $result->bindParam(':categoryId', $idCategory, PDO::PARAM_INT);
        $result->execute();
        //проверяем есть ли записи
        if($result->fetchColumn())
            return true;
        return false;
    }
    public static function deleteCategory($idCategory,$idPost){
        $db = Db::getConnection();
        $sql = 'DELETE from posts_category WHERE id_category = :idCetegory AND id_posts=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':idCetegory', $idCategory, PDO::PARAM_INT);
        $result->bindParam(':id', $idPost, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function getTotalCategory($categoryId){
        $db = Db::getConnection();

        $result = $db->query("select count(id_posts) as 'count' from posts_category where id_category=".$categoryId);
        $row =  $result->fetch();
        return $row['count'];
    }
}
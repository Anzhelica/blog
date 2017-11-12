<?php
class Galery
{

    public static function getCardList()
    {
        $db = Db::getConnection();
        $cardList = array();
        //
        $result = $db->query('SELECT * '
            . 'FROM gelery '
            . 'ORDER BY id DESC ');
        $i = 0;
        while($row = $result->fetch()){
            $cardList[$i]['id'] = $row['id'];
            $cardList[$i]['title'] = $row['title'];
            $cardList[$i]['content'] = $row['content'];
            $cardList[$i]['img'] = $row['img'];
            $i++;
        }

        return $cardList;
    }
    public static function add($title, $text, $img){
        $db = Db::getConnection();
        $sql = 'INSERT INTO gelery (title, content,  img) '
            . 'VALUES (:title, :text, :img)';
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':img', $img, PDO::PARAM_STR);

        return $result->execute();
    }
    public static function getImg($id){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM gelery WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        //указываем что хотим получить данные в виде массива
      //  $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }
    public static function delete($id){
        $db = Db::getConnection();
        $sql = 'DELETE from gelery WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function checkLikeExists($idUser, $idCard){
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM gelery_likes where id_cards = :idCards AND id_user = :idUser';

        $result = $db->prepare($sql);
        $result->bindParam(':idCards', $idCard, PDO::PARAM_INT);
        $result->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $result->execute();
        if($result->fetchColumn())
            return true;
        return false;
    }
    public static function addLikes($iduser,$idCards)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO gelery_likes (id_user, id_cards) '
            . 'VALUES (:iduser, :idCards)';
        $result = $db->prepare($sql);
        $result->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $result->bindParam(':idCards', $idCards, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function delLikes($iduser,$id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM gelery_likes WHERE id_user = :iduser AND id_cards = :idcards ';
        $result = $db->prepare($sql);
        $result->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $result->bindParam(':idcards', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function getLikeForCards($id)
    {
        $db = Db::getConnection();

        $result = $db->query("select count(*) as 'count' from gelery_likes where id_cards=".$id);
        $row =  $result->fetch();
        return $row['count'];
    }
    public static function getLastestLikes($id)
    {
        $db = Db::getConnection();
        $postsList = array();
        $result = $db->query('SELECT name from user u inner join gelery_likes g on u.id=g.id_user  where g.id_cards= '.$id
            . ' ORDER BY g.date DESC '
            . ' LIMIT 7');
        $i = 0;
        while($row = $result->fetch()){
            $postsList[$i]['name'] = $row['name'];
            $i++;
        }
        return $postsList;
    }
    public static function deleteLikes($id){
        $db = Db::getConnection();
        $sql = 'DELETE from gelery_likes WHERE id_cards=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function getCardsItemById($id)
    {
            $db = Db::getConnection();
            $result = $db->query('SELECT id,title,content,img   from gelery where id=' . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $postsItem = array();
            $postsItem = $result->fetch();
            return $postsItem;

        
    }
    public static function update($id, $title, $content)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE gelery
            SET 
                title=:title,
                 content = :content
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':content', $content, PDO::PARAM_STR);
        return $result->execute();
    }
    public static function updateImg($id,$img){
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE gelery
            SET 
                img = :img
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':img', $img, PDO::PARAM_STR);
        return $result->execute();
    }
}
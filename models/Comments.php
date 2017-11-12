<?php
class Comments
{

    public static function addComment($iduser,$idpost,$text)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO comments (id_user,id_posts, text) VALUES (:iduser,:idpost, :text)';
        $result = $db->prepare($sql);
        $result->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $result->bindParam(':idpost', $idpost, PDO::PARAM_INT);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        return $result->execute();
    }
    public static function showComments($id){
        $db = Db::getConnection();
        //массив для результатов
        $postsList = array();
        //
        $result = $db->query('SELECT id, id_user, id_posts, text, date '
            . 'FROM comments where id_posts= '.$id
            . ' ORDER BY date ');
        $i = 0;
        //$row - строка из бд
        while($row = $result->fetch()){
            $postsList[$i]['id'] = $row['id'];
            $postsList[$i]['id_user'] = $row['id_user'];
            $postsList[$i]['id_posts'] = $row['id_posts'];
            $postsList[$i]['text'] = $row['text'];
            $postsList[$i]['date'] = $row['date'];
            $i++;
        }

        return $postsList;
    }
    public static function getCommentsForPost($postId)
    {
        $db = Db::getConnection();

        $result = $db->query("select count(id) as 'count' from comments where id_posts=".$postId);
        $row =  $result->fetch();
        return $row['count'];
    }
    public static function getCommentsList()
    {
        $db = Db::getConnection();
        //массив для результатов
        $commentsList = array();
        //
        $result = $db->query('SELECT id, id_user, id_posts, text, date '
            . 'FROM comments '
            . 'ORDER BY date DESC ');
        $i = 0;
        //$row - строка из бд
        while($row = $result->fetch()){
            $commentsList[$i]['id'] = $row['id'];
            $commentsList[$i]['id_user'] = $row['id_user'];
            $commentsList[$i]['id_posts'] = $row['id_posts'];
            $commentsList[$i]['text'] = $row['text'];
            $commentsList[$i]['date'] = $row['date'];
            $i++;
        }

        return $commentsList;
    }
    public static function deleteComments($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE from comments WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function getCommentsById($id){

            $db = Db::getConnection();
            $result = $db->query('SELECT * from comments where id=' . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $comments= array();
            $comments = $result->fetch();
            return $comments;
        
    }

    public static function updateCommentsById($id, $idUser,$idPosts,$text)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE comments
            SET 
                id_user = :idUser, 
                id_posts = :idPosts, 
                text = :text
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $result->bindParam(':idPosts', $idPosts, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);

        return $result->execute();
    }
}
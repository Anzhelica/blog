<?php

/**
 * Created by PhpStorm.
 * User: NEO
 * Date: 19.06.2016
 * Time: 16:05
 */
class Posts
{
    const SHOW_BY_DEFAULT = 9;

    public static function getPostsItemById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();
            $result = $db->query('SELECT id, title, text, tag, img_path, data  from posts where id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $postsItem = array();
            $postsItem = $result->fetch();
            return $postsItem;

        }
    }

    public static function getPostsList()
    {
        $db = Db::getConnection();
        $postsList = array();
        //
        $result = $db->query('SELECT id, title, text, tag, img_path, data '
            . 'FROM posts '
            . 'ORDER BY data DESC '
            . 'LIMIT 5');
        $i = 0;
        //$row - строка из бд
        while ($row = $result->fetch()) {
            $postsList[$i]['id'] = $row['id'];
            $postsList[$i]['title'] = $row['title'];
            $postsList[$i]['text'] = $row['text'];
            $postsList[$i]['tag'] = $row['tag'];
            $postsList[$i]['img_path'] = $row['img_path'];
            $postsList[$i]['data'] = $row['data'];
            $i++;
        }

        return $postsList;
    }
    public static function getAllPosts()
    {
        $db = Db::getConnection();
        $postsList = array();
        $result = $db->query('SELECT id, title, text, tag, img_path, data '
            . 'FROM posts '
            . 'ORDER BY data DESC ');
        $i = 0;
        while ($row = $result->fetch()) {
            $postsList[$i]['id'] = $row['id'];
            $postsList[$i]['title'] = $row['title'];
            $postsList[$i]['text'] = $row['text'];
            $postsList[$i]['tag'] = $row['tag'];
            $postsList[$i]['img_path'] = $row['img_path'];
            $postsList[$i]['data'] = $row['data'];
            $i++;
        }
        return $postsList;
    }
    public static function getTagsList()
    {
        $db = Db::getConnection();
        $tagsList = array();
        //
        $result = $db->query('SELECT *'
            . 'FROM posts '
            . 'ORDER BY data DESC ');
        $i = 0;
        //$row - строка из бд
        while ($row = $result->fetch()) {
            $tagsList[$i]['id'] = $row['id'];
            $tagsList[$i]['tag'] = $row['tag'];
            $i++;
        }

        return $tagsList;
    }

    public static function getLatestPosts()
    {
        $db = Db::getConnection();
        $postsList = array();
        $result = $db->query('SELECT id, title, text, tag, img_path, data '
            . 'FROM posts '
            . 'ORDER BY data DESC '
            . 'LIMIT 9');
        $i = 0;
        while ($row = $result->fetch()) {
            $postsList[$i]['id'] = $row['id'];
            $postsList[$i]['title'] = $row['title'];
            $postsList[$i]['text'] = $row['text'];
            $postsList[$i]['tag'] = $row['tag'];
            $postsList[$i]['img_path'] = $row['img_path'];
            $postsList[$i]['data'] = $row['data'];
            $i++;
        }
        return $postsList;
    }

    public static function getPostsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {
            $page = intval($page);
            //отнимаем 1 так как для первой страницы смещение не требуется
            $offset = ($page - 1) * 5;
            $db = Db::getConnection();
            $posts = array();
            $result = $db->query('SELECT id, title, text, tag, img_path, data '
                . "FROM posts inner join posts_category on id_posts=id where id_category='$categoryId'"
                . 'LIMIT 5 '
                . 'OFFSET ' . $offset);
            $i = 0;
            while ($row = $result->fetch()) {
                $posts[$i]['id'] = $row['id'];
                $posts[$i]['title'] = $row['title'];
                $posts[$i]['text'] = $row['text'];
                $posts[$i]['tag'] = $row['tag'];
                $posts[$i]['img_path'] = $row['img_path'];
                $posts[$i]['data'] = $row['data'];
                $i++;
            }
            return $posts;
        }
    }

    public static function getTotalPostsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query("select count(id_category) as 'count' from posts_category where id_category=" . $categoryId);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getTotalPosts()
    {
        $db = Db::getConnection();

        $result = $db->query("select count(id) as 'count' from posts");
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getPostsListByPage($page = 1)
    {
        $page = intval($page);
        $offset = ($page - 1) * 9;
        $db = Db::getConnection();
        $posts = array();
        $result = $db->query('SELECT id, title, text, tag, img_path, data '
            . "FROM posts "
            . 'ORDER BY data DESC '
            . 'LIMIT 9 '
            . 'OFFSET ' . $offset);
        $i = 0;
        while ($row = $result->fetch()) {
            $posts[$i]['id'] = $row['id'];
            $posts[$i]['title'] = $row['title'];
            $posts[$i]['text'] = $row['text'];
            $posts[$i]['tag'] = $row['tag'];
            $posts[$i]['img_path'] = $row['img_path'];
            $posts[$i]['data'] = $row['data'];
            $i++;
        }
        return $posts;

    }

    public static function add($title, $text, $tag, $img_path)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO posts (title, text, tag, img_path) '
            . 'VALUES (:title, :text, :tag, :img_path)';
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':tag', $tag, PDO::PARAM_STR);
        $result->bindParam(':img_path', $img_path, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getPostsId($title, $text, $tag, $img_path)
    {
        $db = Db::getConnection();

        $sql = "select id from posts where title = :title  AND  text = :text AND tag = :tag AND img_path = :img_path";
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':tag', $tag, PDO::PARAM_STR);
        $result->bindParam(':img_path', $img_path, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }
        return false;
    }

    public static function deletePostsById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE from posts WHERE id=:id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updatePostsById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE posts
            SET 
                title = :title, 
                text = :text, 
                tag = :tag
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':text', $options['text'], PDO::PARAM_STR);
        $result->bindParam(':tag', $options['tag'], PDO::PARAM_STR);

        return $result->execute();
    }

    public static function updateImg($id, $img)
    {
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE posts
            SET 
                img_path = :img_path
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':img_path', $img, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getSearchPosts($search)
    {
        $db = Db::getConnection();
        $posts = array();
        $result = $db->query('SELECT id, title, text, tag, img_path, data '
            . "FROM posts where title like '%" . $search . "%' OR text like '%" . $search . "%' "
            . ' ORDER BY data DESC '
        );
        $i = 0;
        while ($row = $result->fetch()) {
            $posts[$i]['id'] = $row['id'];
            $posts[$i]['title'] = $row['title'];
            $posts[$i]['text'] = $row['text'];
            $posts[$i]['tag'] = $row['tag'];
            $posts[$i]['img_path'] = $row['img_path'];
            $posts[$i]['data'] = $row['data'];
            $i++;
        }
        return $posts;
    }
}
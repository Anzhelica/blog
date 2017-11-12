<?php

class BookmarksController
{

    public function actionAdd($id)
    {
        if (User::checkLogged()) {
            if (!Bookmarks::checkLikeExists($_SESSION["user"], $id)) {
                $result = Bookmarks::addPost($_SESSION["user"], $id);
            } else {
                $result = Bookmarks::delPost($_SESSION["user"], $id);
            }
            // возвращаем пользователя на страницу
            $referrer = $_SERVER['HTTP_REFERER'];
            header("Location: $referrer");
        }
    }

    public function actionIndex()
    {
        if (User::checkLogged()) {
            $tags = Posts::getTagsList();
            $postsList = Posts::getPostsList();
            $category = Category::getCategoryList();
            $likedPosts = Bookmarks::getLikedPosts($_SESSION["user"]);

            require_once(ROOT . '/views/bookmarks/index.php');
            return true;
        }
    }

    public function actionshow($id)
    {
        if (User::checkLogged()) {
            $tags = Posts::getTagsList();
            $postsList = Posts::getPostsList();
            $category = Category::getCategoryList();
            $userList = Bookmarks::getUserByLikes($id);

            require_once(ROOT . '/views/bookmarks/likes.php');
            return true;
        }

    }
}
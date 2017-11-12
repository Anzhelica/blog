<?php

class SearchController
{
    public function actionIndex()
    {
        $postsList = Posts::getPostsList();
        $category = Category::getCategoryList();
        $tags = Posts::getTagsList();
        $search = $_POST['search_field'];
        $search = preg_replace('|[\s]+|s', ' ', $search);
        $search = ltrim($search);
        $search = rtrim($search);
        $posts = Posts::getSearchPosts($search);

        require_once(ROOT . '/views/posts/viewSearch.php');
        return true;

    }
}
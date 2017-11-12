<?php

class CategoryController
{
    public function actionIndex()
    {
        $tags = Posts::getTagsList();
        $categories = Category::getCategoryList();
        $latestProducts = Posts::getLatestPosts();
        $tags = Posts::getTagsList();
        
        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
        $total = Category::getTotalCategory($categoryId);
        $countpages = ceil($total / 5);
        $tags = Posts::getTagsList();
        $postsList = Posts::getPostsList();
        $category = Category::getCategoryList();
        $categoryPosts = Posts::getPostsListByCategory($categoryId, $page);
        $categoryForOne = Category::getCategoryForPosts($categoryId);
        $total = Posts::getTotalPostsInCategory($categoryId);

        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }
}
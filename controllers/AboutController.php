<?php
class AboutController
{

    public function actionIndex()
    {
        $postsList = Posts::getPostsList();
        $category = Category::getCategoryList();
        $tags = Posts::getTagsList();

        require_once(ROOT . '/views/about/index.php');
        return true;
    }
}
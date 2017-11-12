<?php
class PostsController
{
    public function actionIndex($page=1)
    {
        $total = Posts::getTotalPosts($page);
        $countpages = ceil($total / 9);
        $latestPosts = Posts::getPostsListByPage($page);
        $count = 0;
        $postsList = Posts::getPostsList();
        $tags = Posts::getTagsList();
        $category = Category::getCategoryList();

        require_once (ROOT . '/views/posts/index.php');
        return true;
    }

    public function actionView($id2)
    {
        $tags = Posts::getTagsList();
        $postsList = Posts::getPostsList();
        $category = Category::getCategoryList();
        $postsItem = Posts::getPostsItemById($id2);

        $id = $postsItem['id'];
        $title = $postsItem['title'];
        $text = $postsItem['text'];
        $tag = $postsItem['tag'];
        $img = $postsItem['img_path'];
        $categoryForOne = Category::getCategoryForPosts($id);
        $comments = Comments::showComments($id2);
        $text2='';

        if (isset($_POST['submit'])) {if(User::checkLogged()) {
            $text2 = $_POST['text'];
          $result =  Comments::addComment($_SESSION['user'],$id2,$text2);
            $referrer = $_SERVER['HTTP_REFERER'];
            header("Location: $referrer");}
        }
        require_once('/views/posts/view.php');
        return true;
    }

    public function actionWrite()
    {
        if(Admin::checkAdmin()) {
            $tags = array();
            $tags = Posts::getTagsList();
            $postsList = array();
            $postsList = Posts::getPostsList();
            $category = array();
            $category = Category::getCategoryList();
            $title = '';
            $text = '';
            $tag = '';
            $img_path = '';
            $result = false;
            $category2 = array();
            if (isset($_POST['submit'])) {
                $title = $_POST['title-post'];
                $text = $_POST['text'];
                $tag = $_POST['tag'];
                $category = $_POST['category'];


                $img_path = 'template/posts-img/'; // директория для загрузки
                $img_path = $img_path . basename($_FILES['img_path']['name']);

                if (move_uploaded_file($_FILES['img_path']['tmp_name'], $img_path)) {
                    $result = Posts::add($title, $text, $tag, $_FILES['img_path']['name']);


                    for ($i = 0; $i < count($category); $i++) {
                        if (!empty($category[$i])) {
                            if (!Category::checkExistCategory($category[$i])) {
                                Category::addToCategory($category[$i]);
                            }

                            Category::addToPostsCategory(Posts::getPostsId($title, $text, $tag, $_FILES['img_path']['name']),
                                Category::getCategoryId($category[$i]));
                        }
                    }
                }
            }
            require_once(ROOT . '/views/posts/write.php');

        }
            return true;
    }

}
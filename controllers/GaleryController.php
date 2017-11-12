<?php

class GaleryController
{
    public function actionIndex()
    {
        $tags = Posts::getTagsList();
        $postsList = Posts::getPostsList();
        $category = Category::getCategoryList();
        $result = false;
        $cardList = Galery::getCardList();
        $title = '';
        $text = '';
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $text = $_POST['content'];
            $img_path = 'template/galery-img/';
            $img_path = $img_path . basename($_FILES['img']['name']);

            move_uploaded_file($_FILES['img']['tmp_name'], $img_path);
            $result = Galery::add($title, $text, $_FILES['img']['name']);
            header("Location: /galery");

        }

        require_once(ROOT . '/views/galery/index.php');
        return true;
    }

    public function actionGetImgById($id)
    {
        $postsList = Posts::getPostsList();
        $category = Category::getCategoryList();
        $result = false;
        $tags = Posts::getTagsList();
        $cardList = Galery::getCardList();
        $img = Galery::getImg($id);

        require_once(ROOT . '/views/galery/image.php');
        return true;
    }

    public function actionDelete($id)
    {
        $postsList = Posts::getPostsList();
        $category = Category::getCategoryList();
        $result = false;
        $tags = Posts::getTagsList();
        $cardList = Galery::getCardList();
        $img = Galery::getImg($id);
        $small = ROOT . '/template/galery-img/' . "{$img['img']}";
        unlink($small);
        $img = Galery::delete($id);
        Galery::deleteLikes($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");

        require_once(ROOT . '/views/galery/index.php');
        return true;
    }

    public function actionLikesAdd($id)
    {
        if (User::checkLogged()) {
            if (!Galery::checkLikeExists($_SESSION["user"], $id)) {
                $result = Galery::addLikes($_SESSION["user"], $id);
            } else {
                $result = Galery::delLikes($_SESSION["user"], $id);
            }
            $referrer = $_SERVER['HTTP_REFERER'];
            header("Location: $referrer");
        }
        require_once(ROOT . '/views/galery/index.php');
        return true;
    }
}
<?php

class AdminGaleryController
{
    public function actionIndex()
    {
        Admin::checkA();
        $cardList = array();
        $cardList = Galery::getCardList();

        require_once(ROOT . '/views/admin_galery/index.php');
        return true;
    }

    public function actionDelete($id)
    {
        Admin::checkA();
        if (isset($_POST['submit'])) {
            Galery::delete($id);
            Galery::deleteLikes($id);
            $small = ROOT . '/template/galery-img/' . "{$id}.jpg";
            unlink($small);
            header("Location: /admin");
        }
        require_once(ROOT . '/views/admin_galery/delete.php');
        return true;
    }

    public function actionUpdate($id)
    {
        Admin::checkA();
        $cardList = Galery::getCardList();
        $getById = Galery::getCardsItemById($id);
        $title = $getById['title'];
        $content = $getById['content'];
        $img = $getById['img'];
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $text = $_POST['content'];
            $result = Galery::update($id, $title, $text);
            if (is_uploaded_file($_FILES["img"]["tmp_name"])) {
                $small = ROOT . '/template/galery-img/' . $getById['img'];
                unlink($small);
                Galery::updateImg($id, $_FILES["img"]["name"]);

                move_uploaded_file($_FILES["img"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/galery-img/{$_FILES["img"]["name"]}");
            }
            header("Location: /admin");
        }
        require_once(ROOT . '/views/admin_galery/update.php');
        return true;
    }
}
<?php
class AdminController
{

    public function actionIndex()
    {
        Admin::checkA();
        require_once (ROOT . '/views/admin/index.php');
        return true;
    }
    public function actionPosts(){
        return null;
    }
    public function actionComments(){
        return null;
    }
    public function actionGalery(){
        return null;
    }
}
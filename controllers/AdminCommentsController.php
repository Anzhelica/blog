<?php
class AdminCommentsController
{
    public function actionIndex(){
        Admin::checkAdmin();
        $comments = Comments::getCommentsList();

        require_once (ROOT.'/views/admin_comments/index.php');
        return true;
    }
    public function actionCreate()
    {
        Admin::checkAdmin();
        if (isset($_POST['submit'])) {
            $idPosts = $_POST['id_posts'];
            $text = $_POST['text'];
            $errors = false;
            if (!isset($text) || empty($text)) {
                $errors[] = 'Заполните полe';
            }
            if ($errors == false) {
                Comments::addComment($_SESSION['user'],$idPosts,$text);
                header("Location: /admin/comments");
            }
        }
        require_once (ROOT.'/views/admin_comments/create.php');
        return true;
    }
    public function actionDelete($id)
    {
        Admin::checkAdmin();
        if(isset($_POST['submit'])){
            Comments::deleteComments($id);
            header("Location: /admin");
        }
        require_once (ROOT.'/views/admin_comments/delete.php');
        return true;
    }
    public function actionUpdate($id)
    {
        Admin::checkAdmin();
        $comment = Comments::getCommentsById($id);
        $category2 = array();
        if (isset($_POST['submit'])) {
           $idUser = $_POST['id_user'];
           $idPosts = $_POST['id_posts'];
           $text = $_POST['text'];
           Comments::updateCommentsById($id, $idUser,$idPosts,$text);
           header("Location: /admin/comments");
        }
        require_once(ROOT . '/views/admin_comments/update.php');
        return true;
    }
}
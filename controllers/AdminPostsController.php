<?php
class AdminPostsController
{
    public function actionIndex(){
        Admin::checkA();
        $postsList = array();
        $postsList = Posts::getAllPosts();

        require_once (ROOT.'/views/admin_posts/index.php');
        return true;
    }

    public function actionDelete($id)
    {
        Admin::checkA();
        if(isset($_POST['submit'])){
            Posts::deletePostsById($id);
            Bookmarks::deleteLikes($id);
            $listsCategoryId = Category::getCategoryIdFromDelete($id);
            for($i=0; $i<count($listsCategoryId); $i++){
                if(!Category::categoryForAnotherExists($id,$listsCategoryId[$i]['id_category']))
            Category::deleteCategoryfromCategory($listsCategoryId[$i]['id_category']);}
            Category::deletePostsCategory($id);
            header("Location: /admin");
        }
        require_once (ROOT.'/views/admin_posts/delete.php');
        return true;
    }
    public function actionUpdate($id)
    {
        Admin::checkA();
        $countCategory=0;
        $categoryForOne = Category::getCategoryForPosts($id);
        $post = Posts::getPostsItemById($id);
        if (isset($_POST['submit'])) {
            $options['title'] = $_POST['title-post'];
            $options['text'] = $_POST['text'];
            $options['tag'] = $_POST['tag'];
            $options['img_path']=$_FILES['img_path']['name'];
            $category = $_POST['category'];
            $t=0;
            $k=0;
            if (Posts::updatePostsById($id, $options)) {
                if(count($categoryForOne) > count($category)){$t=count($categoryForOne);}
                if(count($categoryForOne) <= count($category)){$t =count($category); }
                for ($i = 0; $i < $t; $i++) {
                    if($k<count($categoryForOne))
                    {
                       if( !isset($categoryForOne[$k]['name']) ||!isset($category[$i]) || $categoryForOne[$k]['name'] != $category[$i] ){
                           if(!Category::categoryForAnotherExists($id,$categoryForOne[$k]['id']));
                               Category::deleteCategoryfromCategory($categoryForOne[$k]['id']);
                           Category::deleteCategory(Category::getCategoryId($categoryForOne[$k]['name']),$id);

                       }
                    }
                    if (!empty($category[$i])) {
                        if (!Category::checkExistCategory($category[$i])) {
                            Category::addToCategory($category[$i]);
                        }
                        if(!Category::checkExistPostsCategory($id,Category::getCategoryId($category[$i])))
                        Category::addToPostsCategory($id,Category::getCategoryId($category[$i]));
                    }
                    ++$k;
                }
                if (is_uploaded_file($_FILES["img_path"]["tmp_name"])) {
                    Posts::updateImg($id, $_FILES["img_path"]["name"]);
                    move_uploaded_file($_FILES["img_path"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/posts-img/{$_FILES["img_path"]["name"]}");
                }
            }
            header("Location: /admin/posts");
        }
        
        require_once(ROOT . '/views/admin_posts/update.php');
        return true;
    }
}
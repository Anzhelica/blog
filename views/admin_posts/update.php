<link rel="stylesheet" href="/template/css/admin-style.css">
<script rel="script" src="/template/materialaze/js/materialize.min.js"></script>
<section>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active-panel"><a href="/admin">Админпанель</a></li>
                    <li class="active-panel"><a href="/admin/posts">Управление постами</a></li>
                    <li>Редактировать пост</li>
                </ol>
            </div>
        <div style="clear:both;"></div>
        <div class="posts-container">

            <h2>Редактировать пост #<?php echo $id; ?></h2>

            <br/>
<form id="main-write1" method="post" action="" enctype='multipart/form-data'>
    <label for="title">Название</label><input type="text" name="title-post" id="title" required="required" value="<?php echo $post['title']; ?>">
    <div style="clear: both"></div>
    <label for="content">Текст</label><br/><textarea id="content" required="required" name="text" ><?php echo $post['text']; ?></textarea>
    <br/>

    <label for="img">Картинка</label><input type="file" id="img" name="img_path" value="<?php echo  $post['img_path']; ?>">
    <br/>

    <img src="/template/posts-img/<?php echo $post['img_path'];?>" style="">
    <div style="clear: both"></div>
    <br/>

    <label for="teg" class="lbl-teg">тег#</label><input type="text" id="teg" name="tag"  value="<?php echo  $post['tag' ]; ?>">
    <div style="clear: both"></div>
    <label for="category" class="lbl-category">Категория</label>
    <br/>
<?php foreach ($categoryForOne as $category):?>
    <input type="text" class="category<?php if($countCategory>0) echo $countCategory;?>" name="category[]" required="required" value="<?php echo $category['name'];?>">
    <?php if($countCategory >0):?><label class="close-category">X</label><?php endif;?>
    <?php ++$countCategory;?>
   <?php endforeach;?>
    <!-- ]\-->
    <div id="add_more">
        <a id="add_more_category">Добавить еще</a>
    </div>
    <input type="submit" id="ok" name="submit"></form>
        </div>
</section>
<script rel="script" src="/template/materialaze/js/materialize.min.js"></script>
<link rel="stylesheet" href="/template/css/admin-style.css">
<script rel="script" src="/template/materialaze/js/materialize.min.js"></script>
<script src="/template/js/jquery-3.0.0.min.js"></script>
<script rel="script" src="/template/materialaze/js/materialize.min.js"></script>
<link rel="stylesheet" href="/template/css/admin-style.css">

<script rel="script" src="/template/js/code2.js"></script>
<script rel="script" src="/template/js/code3.js"></script>

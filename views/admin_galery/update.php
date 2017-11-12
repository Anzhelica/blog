<link rel="stylesheet" href="/template/css/admin-style.css">
<section>

        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="active-panel"><a href="/admin">Админпанель</a></li>
                <li class="active-panel"><a href="/admin/galery">Управление галереей</a></li>
                <li class="active">Редактировать фото</li>
            </ol>
        </div>

        <div style="clear:both;"></div>
        <div class="posts-container">

        <h2>Редактировать фото #<?php echo $id; ?></h2>
        <br/>
        <div class="col-lg-4">
            <form method="post" action="" id="main-write1"  enctype='multipart/form-data'>
                <label for="img">Картинка</label>
                <input type="file" id="img" name="img" value="<?php echo  $img; ?>">
                <img src="/template/galery-img/<?php echo $img;?>" style="">
                <br/>
                <label for="content">Название</label>
                <input type="text" class="title-img" id="content" name="title" value="<?php echo $title;?>">
                <br/>
                <label for="text">Описание</label>
                <br/>
                <textarea name="content" id="text"> <?php echo $content;?></textarea>
                <div style="clear: both"></div>
                <input type="submit" name="submit" value="OK">
            </form>
        </div>
    </div>
</section>
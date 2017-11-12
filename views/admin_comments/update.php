<link rel="stylesheet" href="/template/css/admin-style.css">
<section>

        <br/>

        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="active-panel"><a href="/admin">Админпанель</a></li>
                <li class="active-panel"><a href="/admin/comments">Управление комментариями</a></li>
                <li class="active">Редактировать пост</li>
            </ol>
        </div>

        <div style="clear:both;"></div>
        <div class="posts-container">
        <h2>Редактировать комментарий #<?php echo $id; ?></h2>

        <br/>
        <div class="comments-container">
            <form id="comments" method="post">
                <label for="id_user">Id пользователя</label>
                <input type="number" name="id_user" id="id_user" value="<?php echo $comment['id_user'];?>">
                <label for="id_posts">Id поста</label>
                <input type="number" name="id_posts" id="id_posts" value="<?php echo $comment['id_posts'];?>">
                <label for="text">Текст комментария</label>
                <textarea name="text" id="text"><?php echo $comment['text'];?></textarea>
                <input type="submit" name="submit" value="Сохранить">
            </form>
        </div>
    </div>
</section>
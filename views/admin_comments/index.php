<link rel="stylesheet" href="/template/css/admin-style.css">
<section>

        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li  class="active-panel"><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление комментариями</li>
                </ol>
            </div>
            <div style="clear:both;"></div>

            <a href="/admin/comments/create" class="add"> Добавить комментарий</a>
            <div class="posts-container">
            <h2>Список комментариев</h2>

            <br/>

            <table>
                <tr>
                    <th>ID комментария</th>
                    <th>Имя пользователя</th>
                    <th>ID поста</th>
                    <th>Текст</th>
                    <th>Дата</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?php echo $comment['id']; ?></td>
                        <td><?php echo $comment['id_user']; ?></td>
                        <td><?php echo $comment['id_posts']; ?></td>
                        <td><?php echo $comment['text']; ?></td>
                        <td><?php echo $comment['date']; ?></td>
                        <td><a href="/admin/comments/update/<?php echo $comment['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i>редактировать</a></td>
                        <td><a href="/admin/comments/delete/<?php echo $comment['id']; ?>" title="Удалить"><i class="fa fa-times"></i>удалить</a> </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>
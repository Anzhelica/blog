<link rel="stylesheet" href="/template/css/admin-style.css">
<section>

        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active-panel"><a href="/admin" >Админпанель</a></li>
                    <li class="active">Управление постами</li>
                </ol>
            </div>
            <div style="clear:both;"></div>
            <div class="posts-container">

                <h2>Список постов</h2>

                <br/>

                <table>
                    <tr>
                        <th>ID поста</th>
                        <th>Название</th>
                    <th>Тег</th>
                    <th>Текст</th>
                    <th>Дата</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($postsList as $post): ?>
                    <tr>
                        <td><?php echo $post['id']; ?></td>
                        <td><?php echo $post['title']; ?></td>
                        <td><?php echo $post['tag']; ?></td>
                        <td><p class="p"><?php echo $post['text']; ?></p></td>
                        <td><?php echo $post['data']; ?></td>
                        <td><a href="/admin/posts/update/<?php echo $post['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i>редактировать</a></td>
                        <td><a href="/admin/posts/delete/<?php echo $post['id']; ?>" title="Удалить"><i class="fa fa-times"></i>удалить</a> </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>
<script src="/template/js/code.js"></script>
<script src="/template/js/code5.js"></script>
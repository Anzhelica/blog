<link rel="stylesheet" href="/template/css/admin-style.css">
<section>
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active-panel"><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление галереей</li>
                </ol>
            </div>

            <div style="clear:both;"></div>
            <div class="posts-container">
            <h2>Список фотографий</h2>

            <br/>

            <table>
                <tr>
                    <th>ID фотографии</th>
                    <th>Название</th>
                    <th>Текст</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($cardList as $cards): ?>
                    <tr>
                        <td><?php echo $cards['id']; ?></td>
                        <td><?php echo $cards['title']; ?></td>
                        <td><?php echo $cards['content']; ?></td>
                        <td><a href="/admin/galery/update/<?php echo $cards['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i>редактировать</a></td>
                        <td><a href="/admin/galery/delete/<?php echo $cards['id']; ?>" title="Удалить"><i class="fa fa-times"></i>удалить</a> </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>
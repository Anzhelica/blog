<link rel="stylesheet" href="/template/css/admin-style.css">
<section>
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active-panel"><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление пользователями</li>
                </ol>
            </div>
            <div style="clear:both;"></div>
            <a href="/admin/users/create" class="add"> Добавить пользователя</a>
            
            <div class="posts-container">
            <h2>Список пользователей</h2>

            <br/>

            <table>
                <tr>
                    <th>ID пользователя</th>
                    <th>Имя</th>
                    <th>E-mail</th>
                    <th>Пароль</th>
                    <th>Role</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($usersList as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['password']; ?></td>
                        <td><?php if(!empty($user['role'])) echo $user['role']; else echo 'user'?></td>
                        <td><a href="/admin/users/update/<?php echo $user['id']; ?>" ><?php if(empty($user['role'])|| $user['role']=='user') echo 'назначить администратором'; else echo 'удалить из администратора'?></a></td>
                        <td><a href="/admin/users/delete/<?php echo $user['id']; ?>" title="Удалить"><i class="fa fa-times"></i>удалить</a> </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>
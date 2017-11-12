<link rel="stylesheet" href="/template/css/admin-style.css">
<section>

        <br/>

        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="active-panel"><a href="/admin">Админпанель</a></li>
                <li class="active-panel"><a href="/admin/users">Управление пользователями</a></li>
                <li class="active">Редактировать пользователя</li>
            </ol>
        </div>

        <div style="clear:both;"></div>
        <div class="posts-container">
        <h2>Редактировать пользователя #<?php echo $id; ?></h2>

        <br/>
        <form id="edit" method="post" action="" enctype='multipart/form-data'>

           <p><label for="id">id пользователя</label>
            <input id="id" type="number" name="id" class="validate" required="required" value="<?php echo $id;?>" readonly></p>
           <p><label for="last_name">Имя пользователя</label>
                    <input id="last_name" type="text" name="name" class="validate" required="required"
                           value="<?php echo $users['name'];?>" readonly></p>
<p>
            <input id="password" type="password" class="validate" name="password" required="required"
                           value="<?php echo $users['password'];?>" readonly></p>
                    <label for="password">Пароль</label>
        <p>   <label for="email">Email</label>
                    <input id="email" type="email" class="validate" name="email" required="required"
                           value="<?php echo $users['email'];?>" readonly></p>
          <p id="role"> <label for="role">Role</label>
            <select id="role" name="role">
                 <option>admin</option>
                 <option>user</option>
            </select>
            </p>

            <input type="submit" id="ok" name="submit"></form>
    </div>
</section>

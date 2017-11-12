<link rel="stylesheet" href="/template/css/admin-style.css">
<section>
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active-panel"><a href="/admin">Админпанель</a></li>
                    <li class="active-panel"><a href="/admin/users">Управление пользователями</a></li>
                    <li class="active">Добавить пользователя</li>
                </ol>
            </div>

            <div style="clear:both;"></div>
            <div class="posts-container">

            <h2>Добавить нового пользователя</h2>

            <br/>

            <?php if($result):?>
            <p>Вы зарегистрированы!</p>
            <?php else:?>
            <?php if(isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                <li> - <?php echo $error;?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <div class="col-lg-4">
                <form class="col s12" method="post" id="main-write1">
                    <div class="user">
                        <p>
                            <label for="last_name">Имя пользователя</label>
                            <input id="last_name" type="text" name="name" class="validate" required="required">
                        </p>
                        <p>
                            <label for="password">Пароль</label>
                            <input id="password" type="password" class="validate" name="password" required="required">
                        </p>
                        <p>
                            <label for="password2">Повторите пароль</label>
                            <input id="password2" type="password" class="validate" name="repeat_password" required="required">
                        </p>
                        <p>
                            <label for="email">Email</label>
                            <input id="email" type="email" class="validate" name="email" required="required">
                        </p>
                    </div>
                   <!-- <button type="submit" name="submit">ОК</button>-->
                    <input type="submit" name="submit" value="ОК">
                </form>
            </div>
        </div>
        <?php endif;?>
    </div>
</section>
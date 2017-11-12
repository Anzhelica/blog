<?php include ROOT . '/views/layouts/header.php'; ?>
    <main>
        <div id="register-container">
            <h2>Регистрация</h2>
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
            <div id="row">
                <div class="row">
                    <form class="col s12" method="post">
                        <div class="row">
                            <div class="input-field col s6">
                                <label for="last_name">Имя пользователя</label>
                                <input id="last_name" type="text" name="name" class="validate" required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password" required="required">
                                <label for="password">Пароль</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password2" type="password" class="validate" name="repeat_password" required="required">
                                <label for="password2">Повторите пароль</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email" required="required">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <button type="submit" name="submit">ОК</button>
                    </form>
                </div>
            </div>
    <?php endif;?>
        </div>
    </main>
    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>
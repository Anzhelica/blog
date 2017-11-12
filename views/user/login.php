<?php include ROOT . '/views/layouts/header.php'; ?>
    <main>
        <div id="container-logon">
            <h2>Вход на сайт</h2>
            <?php if (isset($errors) && is_array($errors)):?>
                <ul>
                    <?php foreach ($errors as $error):?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="row">
                <form class="col s12" method="post">
                    <div class="row">
                        <div class="input-field col s6">
                            <label for="last_name">E-mail</label>
                            <input id="last_name" type="text" class="validate" name="email" required="required">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password" required="required">
                            <label for="password">Пароль</label>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="OK">
                    <a href="/user/register.php" class="registr">Регистрация</a>
                </form>
            </div>
        </div>
    </main>
<?php include ROOT . '/views/layouts/footer.php'; ?>
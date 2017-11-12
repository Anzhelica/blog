<?php include ROOT . '/views/layouts/header.php'; ?>
    <main>
        <div id="like-user-container">
            <h2>Нравится пользователям</h2>
            <div id="like-container">
                <ol>
                    <?php foreach ($userList as $user):?>
                    <li><?php echo $user['name']; ?><b><?php echo Bookmarks::getDate($user['id']);?></b></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </main>
<?php include ROOT . '/views/layouts/footer.php'; ?>
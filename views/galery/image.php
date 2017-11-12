<?php include ROOT . '/views/layouts/header.php'; ?>
    <div id="galery-img"><div id="close"><a href="/galery">X</a> </div>
        <div id="img"><img src="/template/galery-img/<?php echo $img['img'];?>"></div>
        <h4 style="text-align: center;"><?php echo $img['title'];?></h4>
    </div>
    <main>
        <div id="galery-container">
            <?php if(Admin::checkAdmin()):?>
                <h3>Добавить файл...</h3>
                <form method="post" action="" enctype='multipart/form-data'>
                    <input type="file" name="file" class="file">
                    <input type="text" name='title'class="title-img" placeholder="введите название">
                    <textarea placeholder="добавьте описание..."></textarea>
                </form>
            <?php endif;?>
            <div id="galery">
                <h3>Галерея</h3>
            </div>
            <div id="container-galery">
                <?php foreach ($cardList as $card): ?>
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="/template/galery-img/<?php echo $card['img'];?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><?php echo $card['title'];?></span>
                            <p><a href="/galery/image/<?php echo $card['id'];?>">Посмотреть</a></p>
                            <p><a href="/galery/delete/<?php echo $card['id'];?>">Удалить</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?php echo $card['title'];?><i
                                    class="material-icons right">x</i></span>
                            <p><?php echo $card['content'];?>.</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

<?php include ROOT . '/views/layouts/footer.php'; ?>
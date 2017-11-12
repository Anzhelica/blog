<?php include ROOT . '/views/layouts/header.php'; ?>
    <main>
        <div id="galery-container">
            <?php if(Admin::checkAdmin()):?>
            <h3>Добавить файл...</h3>
            <form method="post" action="" enctype='multipart/form-data'>
                <input type="file" class="file" name="img">
                <input type="text" class="title-img" placeholder="введите название" name="title">
                <textarea placeholder="добавьте описание..." name="content"></textarea>
                <div style="clear: both"></div>
                <input type="submit" name="submit" value="OK">
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
                    <?php if(Admin::checkAdmin()):?>
                            <p><a href="/galery/delete/<?php echo $card['id'];?>">Удалить</a></p>
                        <?php endif;?>
                            
                            <a href="/galery/likes/add/<?php echo $card['id'];?>" class="likes">
                                <div class="like-container"><?php $likesList = Galery::getLastestLikes($card['id']);?>
                                    <?php if(empty($likesList)) echo'<p>никому не нравится</p>'?>
                                    <?php foreach ($likesList as $user):?><div><?php echo $user['name'];?></div><?php endforeach?>
                                    
                                </div>
                                <span class="like-img"><img src="/template/images/heart%20(1).png"></span>
                                <span class="like-count"><?php $result = Galery::getLikeForCards($card['id']); echo $result;?></span>
                            </a>
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
<?php include ROOT . '/views/layouts/header.php'; ?>
    <main>  <div class="group">
        <?php foreach ($latestPosts as $post):?>
            <?php if($count == 3):?>
                </div>
        <div class="group">
            <?php $count=0;?>
                <?php endif;?>
            <article class="post-container ">
                <div class="post-header">
                    <div class="post-title">
                        <?php if (!User::isGuest() and Admin::checkAdmin()): ?>
                            <a class="close" href="/admin/posts/delete/<?php echo $post['id']; ?>">X</a>
                        <?php endif; ?>
                        <h2 class="post-header"><?php echo $post['title']; ?></h2>
                    </div>
                </div>
                <div class="post-media">
                    <a href="/posts/<?php echo $post['id'];?>"><img alt="" src="/template/posts-img/<?php echo $post['img_path'];?>" style=""></a>
                </div>
                <div class="post-content">
                    <p class="p"><?php echo $post['text'];?></p>
                    <a class="continue-read" href="/posts/<?php echo $post['id'];?>">
                        Читать далее →
                    </a>
                </div>
                <div class="post-meta">
                    <a href="#" class="dates">
                        <span class="like-img"><img src="/template/images/clock%20(1).png" alt=""></span>
                        <time class="date" datetime="2016-05-25"><?php echo $post['data'];?></time>
                    </a>
                    <a href="/bookmarks/add/<?php echo $post['id'];?>" class="likes">
                        <span class="like-img"><img src="/template/images/heart%20(1).png" alt=""></span>
                        <span class="like-count"><?php $result = Bookmarks::getLikeForPost($post['id']); echo $result;?></span>
                    </a>
                    <a href="/posts/<?php echo $post['id'];?>" class="post-comments">
                        <span class="post-img"><img src="/template/images/comments.png" alt=""></span>
                        <span class="post-count"><?php $result = Comments::getCommentsForPost($post['id']); echo $result;?></span>
                    </a>
                </div>
            </article>
            <?php $count=$count+1;?>
<?php endforeach;?>
</div>
        <div style="clear:both;"></div>
        <div id="navigation">
            <?php if(!($page-1<=0)):?>
            <a class="older" href="/page-<?php echo $page-1;?>">Назад</a>
    <?php endif;?>
    <?php if(!($page+1>$countpages)):?>
            <a class="newer" href="/page-<?php echo $page+1;?>">Вперед</a>
    <?php endif;?>
        </div>
    </main>
<?php include ROOT . '/views/layouts/footer.php'; ?>
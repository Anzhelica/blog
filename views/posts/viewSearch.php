<?php include ROOT . '/views/layouts/header.php'; ?>

    <main id="post"><?php foreach ($posts as $post):?>
            <article class="post_container" >
                <div class="post_media">
                    <a href=""><img src="/template/posts-img/moose.jpeg" style=""></a>
                </div>
                <div class="post_header">
                    <div class="post-title">
                        <h2 class="post_header"><?php echo $post['title'];?></h2>
                    </div>
                </div>
                <div class="post_content">
                    <p><?php echo $post['text']?>
                    </p>
                </div>
                <div class="footer-post">
                    <div class="tag">
                        <a href="/posts/<?php $post['id'];?>"><?php echo $post['tag'];?></a>
                    </div>
                    <div id="like"><a>нравиться  людям</a></div>
                </div>
            </article>
            <div style="clear:both;"></div>
        <?php endforeach;?>
    </main>
    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>
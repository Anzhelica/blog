<?php include ROOT . '/views/layouts/header.php'; ?>
    <main>
        <div id="container-zakladki">
            <h3>Мне нравится...</h3>
            <div id="like-posts">
                <ol>
                    <?php foreach ($likedPosts as $post): ?>
                    <li><img src="/template/posts-img/<?php echo $post['img_path'];?>"><b class="short"><?php echo $post['title']?></b><a href="/posts/<?php echo $post['id'];?>">перейти к посту</a></li>
                    <?php endforeach;?>
                </ol>
            </div>
        </div>
    </main>
<?php include ROOT . '/views/layouts/footer.php'; ?>
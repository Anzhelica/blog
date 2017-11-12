<?php include ROOT . '/views/layouts/header.php'; ?>
    <main id="post">
        <article class="post_container">
            <div class="post_media">
                <a href=""><img src="/template/posts-img/<?php echo $img;?>" style=""></a>
            </div>
            <div class="post_header">
                <div class="post-title">
                    <h2 class="post_header"><?php echo $title;?></h2>
                </div>
            </div>
            <div class="post_content">
                <p><?php echo $text;?>
                </p>
            </div>
            <div class="footer-post">
                <h3>Категория:
                    <?php foreach ($categoryForOne as $category):?>
                    <a href="/category/<?php echo $category['id'];?>"><?php echo $category['name'];?> </a>
    <?php endforeach;?>
                </h3>
                <div class="tag">
                    <a href="#"><?php echo $tag;?></a>
                </div>
                <div id="like"><a <?php if (Bookmarks::getLikeForPost($id)!=0):?>href="/bookmarks/likes/<?php echo $id;?>"<?php endif;?>>нравится  людям <?php $result = Bookmarks::getLikeForPost($id); echo $result;?></a></div>
            </div>
        </article>
        <h2>Комментарии</h2>
        <?php foreach ($comments as $comment): ?>
        <div class="comments">
            <div class="comments-container">
                <h3 class="name"><?php $user = User::getUserById($comment['id_user']);echo $user['name']; ?></h3>
                <p class="comment-text">
                    <?php echo $comment['text']; ?>
                </p>
                <div class="comments-footer">
                    <time class="comments-date"><?php echo $comment['date']; ?></time>
                   <!-- <button class="reply"  onclick="addReply(this)">Ответить</button>-->
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <div class="children">
            <div class="comments-reply">
                <!--<div class="comments-container">
                    <h3 class="name">User</h3>
                    <p class="comment-text">
                        ответ ответ
                    </p>
                    <div class="comments-footer">
                        <time class="comments-date">June 15, 2016</time>
                    </div>
                </div> --> <button class="write"  onclick="addReply(this)">Написать</button>
            </div>
        </div>
    </main>
<?php include ROOT . '/views/layouts/footer.php'; ?>
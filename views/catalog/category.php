<?php include ROOT . '/views/layouts/header.php'; ?>

    <main id="post"><?php foreach ($categoryPosts as $post):?>
        <article class="post_container" >
            <div class="post_media">
                <a href="/posts/<?php echo $post['id'];?>"><img src="/template/posts-img/<?php echo $post['img_path'];?>"></a>
            </div>
            <div class="post_header">
                <div class="post-title">
                    <h2 class="post_header"><?php echo $post['title'];?></h2>
                </div>
            </div>
            <div class="post_content">
                <p class="p"><?php echo $post['text']?>
                </p>
            </div>
            <div class="footer-post"> 
                <div class="tag">
                    <a href="/posts/<?php echo $post['id'];?>"><?php echo $post['tag'];?></a>
                </div>
                <div id="like"><a>нравиться  людям</a></div>
            </div>
        </article>
    <div style="clear:both;"></div>
        <?php endforeach;?>
        <!--постраничная навигация
        <?php //echo $pagination->get();?>-->
        <div id="navigation">
            <?php if(!($page-1<=0)):?>
                <a class="older" href="/category/<?php echo $categoryId;?>/<?php echo $page-1;?>">Назад</a>
            <?php endif;?>
            <ul class="pages">
                <?php for ($i=1; $i<=$countpages; $i++):?>
                    <li class="<?php if($i==$page) echo 'active';?>"><a href="/category/<?php echo $categoryId;?>/<?php echo $i?>"><?php echo $i;?></a></li>
                <?php endfor;?>
            </ul>
            <?php if(!($page+1>$countpages)):?>
                <a class="newer" href="/category/<?php echo $categoryId;?>/<?php echo $page+1;?>">Вперед</a>
            <?php endif;?>
        </div>
    </main>
<?php include ROOT . '/views/layouts/footer.php'; ?>
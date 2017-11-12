<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/template/materialaze/css/materialize.css">
    <link rel="stylesheet" href="/template/css/style.css">
    <script src="/template/js/jquery-3.0.0.min.js"></script>
    <script rel="script" src="/template/materialaze/js/materialize.min.js"></script>
</head>
<body>
<div id="container">
    <header class="main-header" >
            <div id="title-container">
                <img src="/template/images/magic-cat.jpeg" class="img">
                <h1> Live magical blog </h1>
                <div style="clear: both"></div>
            </div>
            <?php if(User::isGuest() == false):?>
            <div id="admin-panel">
                <a href="/admin">Админпанель</a>
            </div>
            <?php endif;?>
            <div id="user-name">
                <h3 class="user-name"><?php if(User::isGuest() == false){$user= User::getUserById($_SESSION['user']);echo $user['name'];}?></h3>
            </div>
            <div class="adding-panel">
                <div id="btn">
                    <?php if(!User::isGuest()): ?>
                    <a class="account" href="/account">Аккаунт</a>
                    <?php endif; ?>
                    <?php if(User::isGuest()): ?>
                    <a class="waves-effect waves-light btn " id="log-on-off" href="/user/login">logOn</a> <!--href="/user/register.php">logOn/Off</a>-->
                    <?php else: ?>
                    <a class="waves-effect waves-light btn " id="log-on-off" href="/user/logout">logOff</a>
                    <?php endif; ?>
                </div>
            </div>
    </header>
    <div id="menu_container">
        <nav class="main_menu">
            <ul>
                <li><a href="/posts/index.php">Главная</a></li>
                <li><a href="/about">О блоге</a></li>
                <li><a href="/galery">Галерея</a></li>
                <?php if(User::isGuest() == false):?>
                <li><a href="/bookmarks">Закладки</a></li>
                    <?php if(Admin::checkAdmin() == true):?>
                <li><a href="/posts/write">Написать в блог</a></li>
                        <?php endif;?>
                <?php endif;?>
            </ul>
        </nav>
    </div>
    <div style="clear: both"></div>
    <aside id="add-inform">
        <section id="search">
            <div id="search-form">
                <form name="search" method="post" action="/viewSearch.php">
                    <input name="search_field" type="search">
                    <input type="submit" value="GO">
                </form>
            </div>
        </section>
        <section id="resent-posts">
            <h2 class="menu-title">Недавние посты</h2>
            <ul>
                <?php foreach ($postsList as $postsItem): ?>
                    <li><a href="/posts/<?php echo $postsItem['id']; ?>"><?php echo $postsItem['title'];?></a></li>
                <?php endforeach;?>
            </ul>
        </section>
        <section id="categories">
            <h2 class="menu-title">Категории</h2>
            <ul>
                <?php foreach ($category as $categoryItem): ?>
                    <li><a href="/category/<?php echo $categoryItem['id']; ?>"
                        class="<?php if($categoryId == $categoryItem['id']) echo 'active';?>"
                        style="<?php if($categoryId == $categoryItem['id']) echo 'color:white;';?>"><?php echo $categoryItem['name'];?></a></li>
                <?php endforeach;?>
            </ul>
        </section>
        <div id="fix" class="tag">
            <section id="tags" class="tag">
                <h2 class="menu-title">Теги</h2>
                <div id="tags-container">
                    <?php foreach ($tags as $postsTag): ?>
                        <a href="/posts/<?php echo $postsTag['id']; ?>"><?php echo $postsTag['tag'];?></a>
                    <?php endforeach;?>
                </div>
            </section>
        </div>
    </aside>
<?php
    return array(
        //запрос => и строка по которой мы узнаем где обрабатывается запрос

        'viewSearch.php' => 'search/index',
        'viewSearch.php([a-z][0-9]+)'=>'search/index',
        'posts/search'=>'search/index',
        'posts/index.php' => 'posts/index',
        'posts/([0-9]+)' => 'posts/view/$1',
        //'posts/([0-9]+)' => 'posts/view',
        'posts/write' => 'posts/write',
         //actionIndex в PostsController
        'page-([0-9]+)'=>'posts/index/$1',
        'posts' => 'posts/index',


        'category/([0-9]+)/([0-9]+)' => 'category/category/$1/$2',
        'category/([0-9]+)' => 'category/category/$1',
        'category/([0-9]+)/index.php' => 'posts/index',
        'category/index.php' => 'posts/index',
        'user/register.php'=>'user/register',
        'user/login' => 'user/login',
        'user/logout' => 'user/logout',
        'account/edit' => 'account/edit',
        'account' => 'account/edit',
        'bookmarks/likes/([0-9]+)'=>'bookmarks/show/$1',
        'bookmarks/add/([0-9]+)' =>'bookmarks/add/$1',
        'bookmarks' => 'bookmarks/index',
        'comments' => 'comments/index',

        'galery/image/([0-9])'=>'galery/getImgById/$1',
        'galery/delete/([0-9])'=>'galery/delete/$1',
        'galery/likes/add/([0-9])' => 'galery/likesAdd/$1',
        'galery' => 'galery/index',
        'admin/comments/create' => 'adminComments/create',
        'admin/comments/update/([0-9]+)' => 'adminComments/update/$1',
        'admin/comments/delete/([0-9]+)' => 'adminComments/delete/$1',
        'admin/comments' => 'adminComments/index',
        // Управление товарами:

        'admin/posts/create' => 'adminPosts/create',
        'admin/posts/update/([0-9]+)' => 'adminPosts/update/$1',
        'admin/posts/delete/([0-9]+)' => 'adminPosts/delete/$1',
        '/admin/posts/categorydel/([0-9]+)/([0-9]+)' => 'adminPosts/categoryDelete/$1/$2',

        'admin/posts' => 'adminPosts/index',

        'admin/galery/update/([0-9]+)' => 'adminGalery/update/$1',
        'admin/galery/delete/([0-9]+)' => 'adminGalery/delete/$1',
        'admin/galery'=>'adminGalery/index',
        
        'admin/users/create' => 'adminUsers/create',
        'admin/users/update/([0-9]+)' => 'adminUsers/update/$1',
        'admin/users/delete/([0-9]+)' => 'adminUsers/delete/$1',
        'admin/users' => 'adminUsers/index',

        'about' => 'about/index',

        'admin' => 'admin/index',





        '' => 'posts/index',

    );

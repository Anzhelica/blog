<?php include ROOT . '/views/layouts/header.php'; ?>
    <main>
        <div id="container-write">
            <h2>Написать в блог</h2>
<?php if($result):?>
    <p>Пост опубликован! </p>
<?php else:?>
            <div id="main-write">
                <form id="main-write1" method="post" action="" enctype='multipart/form-data'>
                    <label for="title">Название</label><input type="text" name="title-post" id="title" required="required">
                    <div style="clear: both"></div>
                    <label for="content">Текст</label><textarea id="content" required="required" name="text"></textarea>
                    <label for="img">Картинка</label><input type="file" id="img" name="img_path">
                    <div style="clear: both"></div>
                    <label for="teg" class="lbl-teg">тег#</label><input type="text" id="teg" name="tag">
                    <div style="clear: both"></div>
                    <label for="category" class="lbl-category">Категория</label>
                    <input type="text" id="category" name="category[]" required="required">
                    <!--   <datalist id="my_list">
                           <option value="one">one</option>
                           <option value="two">two</option>
                           <option value="three">three</option>
                       </datalist>-->
                    <div id="add_more">
                        <a id="add_more_category">Добавить еще</a>
                    </div>
                    <input type="submit" id="ok" name="submit"></form>
            </div>
    <?php endif;?>
        </div>
    </main>
<?php include ROOT . '/views/layouts/footer.php'; ?>
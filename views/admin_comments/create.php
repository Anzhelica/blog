<link rel="stylesheet" href="/template/css/admin-style.css">
<section>
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active-panel"><a href="/admin">Админпанель</a></li>
                    <li class="active-panel"><a href="/admin/comments">Управление комментариями</a></li>
                    <li class="active">Добавить комментарий</li>
                </ol>
            </div>


            <div style="clear:both;"></div>
            <div class="posts-container">
            <h2>Добавить новый комментарий</h2>

            <br/>


            <div class="comments-container">
                <form id="comments" method="post">
                    <label for="id_posts">Id поста</label>
                    <input type="number" id="id_posts" name="id_posts">
                    <label for="text">Текст комментария</label>
                    <textarea name="text" id="text"></textarea>
                    <input type="submit" name="submit" value="ОК">
                </form>
            </div>
        </div>
    </div>
</section>
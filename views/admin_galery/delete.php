
<link rel="stylesheet" href="/template/css/admin-style.css">
<section>
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active-panel"><a href="/admin">Админпанель</a></li>
                    <li class="active-panel"><a href="/admin/galery">Управление галереей</a></li>
                    <li class="active">Удалить фото</li>
                </ol>
            </div>


            <div style="clear:both;"></div>
            <div class="posts-container">
            <h2>Удалить фото #<?php echo $id; ?></h2>


            <p>Вы действительно хотите удалить фото?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

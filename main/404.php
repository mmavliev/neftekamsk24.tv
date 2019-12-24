<?php get_header();?>
<div class="container py-3">
    <div class="text-center w-100 py-3">
        <div class="line"></div>
        <h1 class="py-3">Страница не найдена</h1>
        <div class="line"></div>
    </div>
    <div class="allposts py-3 text-center">
    <h2 class="py-3">Запрашиваемая вами страница не существует либо произошла ошибка.<br>
Если вы уверены в правильности указанного адреса, то данная страница уже не существует на сервере или была переименована</h2>
    <a href="<?php bloginfo("url") ?>"><button class="allnews btn btn-primary">На главную</button></a>
    </div>

</div>
<?php get_footer();?>
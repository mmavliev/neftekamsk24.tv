<?php get_header();?>
<div class="container py-3">
    <div class="text-center w-100 py-3">
        <div class="line"></div>
        <h1 class="py-3">#<?php echo single_tag_title();?></h1>
        <div class="line"></div>
        <span class="date"><?php ?></span>

    </div>
    <div class="allposts py-3">

    <?php if( have_posts() ){ while( have_posts() ){ the_post(); ?>
     <a href="<?php the_permalink(); ?>">
        <div class="row new-hor py-3">
            <div class="col-md">
                <img class="preview" src="<?php the_post_thumbnail_url(); ?>">
            </div>
            <div class="col-md">
                <h2><?php the_title(); ?></h2>
                <?php the_excerpt() ?>
            <span class="date"><?php the_time('d/m/Y H:i'); ?></span>

            </div>
        </div>
    </a>
    <?php }} wp_reset_query();  ?>
   </div>
   <?php 
   the_posts_pagination( array(
   'show_all'     => false, // показаны все страницы участвующие в пагинации
   'end_size'     => 1,     // количество страниц на концах
   'mid_size'     => 1,     // количество страниц вокруг текущей
   'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
   'prev_text'    => __('« Предыдущая'),
   'next_text'    => __('Следующая »'),
   'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
   'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
   'screen_reader_text' => __( 'Страницы' ),
   ) );
   ?>

</div>

<?php 
get_footer();?>
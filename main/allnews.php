<?php 
/* Template Name: Все Новости */ 
?>

<?php get_header();?>
<div class="container py-3">
    <div class="text-center w-100 py-3">
        <div class="line"></div>
        <h1 class="py-3">Новости</h1>
        <div class="line"></div>
    </div>
    <div class="allposts py-3">
        
    <?php
    $category_id = get_cat_ID('Новости');
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $query = new WP_Query( array(
        'category_id' => $category_id,
        'posts_per_page' => 10,
        'paged' => $paged
    ) );
    while ( $query->have_posts() ) {
        $query->the_post();
                ?>
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
    <?php } ?>
    <div class="pagination text-center py-3">
    <?php 
        echo paginate_links( array(
    'total'        => $query->max_num_pages,
    'show_all'     => false, // показаны все страницы участвующие в пагинации
	'end_size'     => 0,     // количество страниц на концах
    'mid_size'     => 0,
	'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
	'prev_text'    => __('« Предыдущая'),
	'next_text'    => __('Следующая »'),
	'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
	'add_fragment' => ' ',     // Текст который добавиться ко всем ссылкам.
        ) );
    ?>
</div>
    </div>
</div>

<?php 
get_footer();?>
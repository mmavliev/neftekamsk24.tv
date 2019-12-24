<div class="container py-3">
    <div class="text-center w-100 py-3">
        <span class="date"><a
                href="<?php echo get_category_link( get_the_category()[0]->term_id )?>"><?php echo get_the_category()[0]->cat_name; ?></a></span>
        <div class="line"></div>
        <h1 class="py-3"><?php the_title();?></h1>
        <div class="line"></div>
        <span class="date"><?php the_time('d/m/Y H:i'); ?></span>

    </div>
    <?php the_content(); ?>
    <?php echo do_shortcode('[Sassy_Social_Share style="padding-botttom: 20px"]') ?>

    <div class="tag-section">
        <h4>Тэги:</h4>
        <?php the_tags('<div class="tag new-tag">', '</div><div class="tag new-tag">', '</div>')?>
    </div><br>
    <div class="tag-section">
        <h4>Передачи:</h4>
        <a href="<?php echo get_category_link( get_the_category()[0]->term_id )?>">
            <div class="tag new-tag"><?php echo get_the_category()[0]->cat_name; ?></div>
        </a>
    </div>
    <div class="allposts py-3">
        <h2 class="bordered">Последние новости</h2>
        <div class="row">
            <div class="w-100"></div>
            <?php 
        $count=0;
    $category_id = get_cat_ID('Новости');
    $posts = get_posts( array(
	'numberposts' => 6,
	'category'    => $category_id,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_type'   => 'post',
) );

foreach( $posts as $post ) {
    setup_postdata($post);
    ?>
            <div class="col-lg py-3">
                <a class="new-tag lc" href="<?php echo get_tag_link(get_the_tags()[0]->term_id)?>">
                    <?php echo get_the_tags()[0]->name; ?>
                </a>

                <a href="<?php the_permalink(); ?>">
                    <img class="preview" src="<?php the_post_thumbnail_url(); ?>">
                    <h3><?php the_title(); ?></h3>
                </a>
                <span class="date"><?php
                  $human_time = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
                  printf( '%s назад', $human_time );
                ?></span>
            </div>
            <?php 
     $count++;
     if($count % 2 == 0){
         echo "<div class='w-100'></div>";
     }
    } wp_reset_postdata();?>
        </div>
    </div>
</div>
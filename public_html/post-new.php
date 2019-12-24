<div class="container">
    <div class="row">
        <div class="col-lg-8 py-3">
            <span class="date"><?php the_time('d/m/Y H:i'); ?></span>
            <h1 class="py-3"><?php the_title();?></h1>
            <?php the_content(); ?>
            <?php echo do_shortcode('[Sassy_Social_Share style="padding-botttom: 20px]') ?>
            <div class="tag-section">
                <h5>Тэги:</h5>
                <?php the_tags('<div class="tag new-tag">', '</div><div class="tag new-tag">', '</div>')?>
            </div>
        </div>
        <div class="col-lg-4 py-3">
    <?php 
    $ppp = get_page_by_title('Главный',OBJECT,"banner");
    $query = new WP_Query( array(
        'post_type' => 'banner',
        "post__not_in" => array($ppp->ID)
    ));
  
  if ( $query->have_posts() ) { ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="banner-box">
            <?php the_content(); ?>
            </div>
            <?php endwhile; ?>
    <?php }
    wp_reset_postdata();
    ?>
        </div>
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
	'exclude'     => array(get_the_ID()),
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
     if($count % 2 ==0){
         echo "<div class='w-100'></div>";
     }
    } wp_reset_postdata();?>
    </div>
    </div>
</div>
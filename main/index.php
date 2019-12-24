<?php
get_header();
?>
<div class="container">
    <div class="row first-section">
    <div class="banner-box">
    <?php
        $ppp = get_page_by_title('Главный',OBJECT, "banner");
        echo $ppp->post_content; 
        ?>
        </div>
        <div class="section-divider">
            <h1 class="lc site-section">ГЛАВНОЕ</h1>
        </div>
        <?php
            global $post;
            $threeposts = array();
            $stickyposts = get_posts( array(
                'post__in'  => get_option( 'sticky_posts' )
            ));
            $myposts = get_posts( array(
                'posts_per_page' => 3) );
                if($stickyposts){
                    if($myposts[0]!=$stickyposts[0]){
                    array_unshift($myposts,$stickyposts[0]);
                    unset($myposts[3]);
                     }
                }
            $post = array_shift($myposts);
            setup_postdata($post); 
            array_push($threeposts,get_the_ID());
            ?>
        <div class="main-new-box col-lg-8">
            <a href="<?php the_permalink(); ?>">
                    <h1 class="tc"><?php the_title();?></h1>
                <img src="<?php the_post_thumbnail_url(); ?>" class="preview">
                <div class="tc">
                        <?php echo get_the_excerpt(); ?>
                    </div>
            </a>
            <span class="date"><?php
                  $human_time = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
                  printf( '%s назад', $human_time );
                ?></span>

        </div>
        <div class="second-new-box col-lg-4">
            <?php
            foreach( $myposts as $post ){
              setup_postdata( $post );
              array_push($threeposts,get_the_ID());
            ?>
            <a href="<?php the_permalink(); ?>">
            <h2 class="tc"><?php the_title();?></h2>
                <img src="<?php the_post_thumbnail_url(); ?>" class="preview">
            </a>
            <span class="date">
                <?php
                  $human_time = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
                  printf( '%s назад', $human_time );
                ?></span>
            <div class="col space"></div>
            <?php
            }
            wp_reset_query();
            ?>
        </div>
    </div>
    <div class="section-divider">
        <h1 class="lc site-section">НОВОСТИ</h1>
    </div>


    <div class="news-first-line row">
        <?php
            $count = 0;
            $category_id = get_cat_ID('Новости');
            $posts = get_posts( array(
                'numberposts' => 4,
                'exclude'=>$threeposts,
                'category'    => $category_id,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );
            
            foreach( $posts as $post ){
                setup_postdata($post);
                ?>
        <div class="col-lg">
            <a class="new-tag lc" href="<?php echo get_tag_link(get_the_tags()[0]->term_id)?>">
                <?php echo get_the_tags()[0]->name; ?>
            </a>

            <a href="<?php the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
            </a>
            <span class="date"><?php
                  $human_time = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
                  printf( '%s назад', $human_time );
                ?></span>
        </div>


        <?php 
                $count++;
            if($count == 2){
                echo "<div class='w-100'></div>";
            }
        }
            wp_reset_postdata(); ?>
    </div>

    <div class="w-100 text-center py-3">
        <a href="/novosti/"><button class="allnews btn btn-primary">ВСЕ НОВОСТИ</button></a>
    </div>
    </div>
    <div class="w-100 py-3 bc-t">
    <div class="container normal-cont">
    <div class="section-divider">
        <h1 class="lc site-section">ПЕРЕДАЧИ</h1>
    </div>
    <div class="news-first-line row">
        <?php
            $category_id = get_cat_ID('Новости');
            $count = 0;
            $posts = get_posts( array(
                'numberposts' => 3,
                'category'    => -$category_id,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );
            
            foreach( $posts as $post ){
                setup_postdata($post);
                ?>
        <div class="col-lg">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" class="preview">
                <div class="content text-center py-3">
                    <h2 class="c-bc"><?php the_title();?></h2>
                </div>
            </a>
        </div>
        <?php } wp_reset_postdata(); ?>
    </div>
    <div class="w-100 text-center py-3">
        <a href="/peredachi/"><button class="allnews btn btn-secondary">ВСЕ ПЕРЕДАЧИ</button></a>
    </div>
    </div>
    </div>
    <div class="container normal-cont py-3">

    <div class="section-divider">
        <h1 class="lc site-section">ТЭГИ</h1>
    </div>
    <div class="tag new-tag">
        <?php 
        $args = array(
	'smallest'			=> 16, 
	'largest'			=> 16,
	'unit'				=> 'pt', 
	'number'			=> 0,  
	'format'			=> 'flat',
	'separator'			=> '</div><div class="tag new-tag">',
	'exclude'			=> null, 
	'include'			=> null, 
	'topic_count_text_callback'	=> default_topic_count_text,
	'child_of'			=> null
);
        wp_tag_cloud( $args ) ?>
    </div>
</div>

<?php get_footer();?>
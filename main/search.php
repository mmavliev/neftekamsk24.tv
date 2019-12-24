<?php get_header();?>
<div class="container py-3">
    <div class="text-center w-100 py-3">
        <div class="line"></div>
        <h1 class="py-3"><i class="fas fa-search"></i>&nbsp;<?php echo $_GET['s'];?></h1>
        <div class="line"></div>
        <span class="date"><?php ?></span>

    </div>
    <div class="allposts py-3">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
    <?php endwhile; else: ?>
 <p>Поиск не дал результатов.</p>
 <?php endif;?>
    </div>

</div>
<?php get_footer();?>
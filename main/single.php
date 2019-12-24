<?php
get_header();
while ( have_posts() ){
	the_post();
if (in_category(get_cat_ID('Новости'))) {
    include("post-new.php");
} else {
    include("post-article.php");
}
}
get_footer();
?>
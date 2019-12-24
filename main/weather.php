<?php
/*
Template Name: Прогноз погоды
*/
?>
<?php get_header();?>
<?php
    echo do_shortcode('[wcp_weather id="my-weather-1" city="Нефтекамск"]');
?>
<div class="container"></div>
<?php get_footer();?>

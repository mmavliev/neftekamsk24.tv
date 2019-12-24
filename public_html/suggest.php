<?php
/*
Template Name: Предложить новость
*/ 
?>
<?php get_header();?>
<div class="container py-3">
<style type="text/css">
input[type="button"] {
    background-color: transparent;
    color: var(--t-color);
    border: 3px solid var(--t-color);
}

input[type="button"]:hover {
    background-color: var(--t-color);
    color: var(--l-color);
    border: 3px solid var(--t-color);
}

input[type="button"]:active,
input[type="button"]:focus {
    background-color: var(--t-color) !important;
    color: var(--l-color) !important;
    border: 3px solid var(--t-color) !important;
}
</style>
<h1>Предложить новость / статью</h1>
<?php echo do_shortcode('[contact-form-7 id="211" title="Контактная форма 1"]') ?>
</div>

<?php get_footer();?>
<?php
add_action( 'wp_enqueue_scripts', 'allstyles' );
add_theme_support( 'post-thumbnails' );
add_theme_support('widgets');
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	return '
	<nav class="navigation text-center" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}
function remove_menus(){
	remove_menu_page( 'edit-comments.php' ); 
  }
  add_action( 'admin_menu', 'remove_menus' );

function allstyles() {
    wp_enqueue_style( 'bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css");
	wp_enqueue_style( 'fonts', "https://fonts.googleapis.com/css?family=Montserrat:100,300,400,900|Open+Sans:300,400,800|Oswald:200,400,900|Playfair+Display:400,900=swap");
    wp_enqueue_style( 'style-main', get_stylesheet_uri() );
	wp_enqueue_script( 'font-awesome', get_template_directory_uri() . '/js/all.js');
	wp_enqueue_script( 'pop', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'boot', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), null, true);
	wp_enqueue_script( 'cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'), null, true);    
	wp_enqueue_script( 'usite', get_template_directory_uri() . '/js/usite.js', array('jquery'), null, true);
	wp_enqueue_script( 'script-main', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
}

function trim_excerpt($text) {
	global $post;
	$moreLink = ' ... <a href="' . get_permalink($post->ID) . '">читать далее &raquo;</a>';
	$text = str_replace('[...]', $moreLink, $text);
  return $text;
} 

	if ( function_exists('register_sidebar') )
	register_sidebar();
	remove_action ('wp_head', 'wp_generator');


	function wptutsplus_create_post_type() {
		$labels = array(
			'name' => __( 'Рекламные баннеры' ),
			'singular_name' => __( 'баннер' ),
			'add_new' => __( 'Новый баннер' ),
			'add_new_item' => __( 'Добавить баннер' ),
			'edit_item' => __( 'Редактировать баннер' ),
			'new_item' => __( 'Новый баннер' ),
			'view_item' => __( 'Промотреть баннер' ),
			'search_items' => __( 'Найти баннер' ),
			'not_found' =>  __( 'Баннеры не найдены' ),
			'not_found_in_trash' => __( 'Нет баннеров в корзине' ),
		);
		$args = array(
			'labels' => $labels,
			'has_archive' => false,
			'public' => true,
			'hierarchical' => false,
			'supports' => array(
				'title',
				'editor',
			),
		);
		register_post_type( 'banner', $args );
	}
	add_action( 'init', 'wptutsplus_create_post_type' );
?>
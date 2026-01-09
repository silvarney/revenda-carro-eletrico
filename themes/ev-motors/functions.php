<?php
/**
 * Functions
 *
 * @package EVMotors
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ev_motors_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'custom-logo' );
	
	// Tamanhos de imagem customizados
	add_image_size( 'carro-thumb', 400, 300, true );
	add_image_size( 'carro-large', 800, 600, true );
	
	register_nav_menus( array(
		'primary' => __( 'Menu Principal', 'ev-motors' ),
		'footer' => __( 'Menu do Rodapé', 'ev-motors' ),
	) );

	// Sidebar para filtros
	register_sidebar( array(
		'name'          => __( 'Barra Lateral de Filtros', 'ev-motors' ),
		'id'            => 'filters-sidebar',
		'description'   => __( 'Widgets exibidos na listagem de carros.', 'ev-motors' ),
		'before_widget' => '<section class="widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'after_setup_theme', 'ev_motors_setup' );

function ev_motors_scripts() {
	wp_enqueue_style( 'ev-motors-style', get_stylesheet_uri(), array(), '1.0.0' );
	
	// Google Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null );
	
	// Scripts customizados
	wp_enqueue_script( 'ev-motors-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );
	
	// Localizar script para AJAX
	wp_localize_script( 'ev-motors-script', 'evMotors', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'ev-motors-nonce' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'ev_motors_scripts' );

// Adicionar classe ao body quando é página de carros
function ev_motors_body_classes( $classes ) {
	if ( is_post_type_archive( 'carros' ) || is_singular( 'carros' ) ) {
		$classes[] = 'carros-page';
	}
	return $classes;
}
add_filter( 'body_class', 'ev_motors_body_classes' );

// Customizar excerpt length
function ev_motors_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'ev_motors_excerpt_length' );

// Customizar excerpt more
function ev_motors_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'ev_motors_excerpt_more' );

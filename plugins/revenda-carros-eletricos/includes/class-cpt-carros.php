<?php
/**
 * Custom Post Type - Carros
 *
 * @package RevendaCarrosEletricos
 */

class RCE_CPT_Carros {
	
	public function __construct() {
		add_action( 'init', array( $this, 'register_post_type' ) );
	}
	
	public function register_post_type() {
		$labels = array(
			'name' => __( 'Carros', 'revenda-carros-eletricos' ),
			'singular_name' => __( 'Carro', 'revenda-carros-eletricos' ),
			'add_new' => __( 'Adicionar Novo', 'revenda-carros-eletricos' ),
			'add_new_item' => __( 'Adicionar Novo Carro', 'revenda-carros-eletricos' ),
			'edit_item' => __( 'Editar Carro', 'revenda-carros-eletricos' ),
		);
		
		$args = array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-car',
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
			'rewrite' => array( 'slug' => 'carros' ),
		);
		
		register_post_type( 'carros', $args );
	}
}

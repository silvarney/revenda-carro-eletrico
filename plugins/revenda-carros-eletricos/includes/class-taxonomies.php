<?php
/**
 * Taxonomias Personalizadas
 *
 * @package RevendaCarrosEletricos
 */

class RCE_Taxonomies {
	
	public function __construct() {
		add_action( 'init', array( $this, 'register_taxonomies' ) );
	}
	
	public function register_taxonomies() {
		// Marca
		register_taxonomy( 'marca-carro', array( 'carros' ), array(
			'labels' => array( 'name' => __( 'Marcas', 'revenda-carros-eletricos' ) ),
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'rewrite' => array( 'slug' => 'marca' ),
		) );
		
		// Tipo
		register_taxonomy( 'tipo-carro', array( 'carros' ), array(
			'labels' => array( 'name' => __( 'Tipos', 'revenda-carros-eletricos' ) ),
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'rewrite' => array( 'slug' => 'tipo' ),
		) );
		
		// Status
		register_taxonomy( 'status-carro', array( 'carros' ), array(
			'labels' => array( 'name' => __( 'Status', 'revenda-carros-eletricos' ) ),
			'hierarchical' => false,
			'show_ui' => true,
			'show_in_rest' => true,
			'rewrite' => array( 'slug' => 'status' ),
		) );
	}
}

<?php
/**
 * Query Helpers
 *
 * @package RevendaCarrosEletricos
 */

class RCE_Query_Helpers {
	
	public function __construct() {
		// Funções helper
	}
}

/**
 * Obtém carros
 */
function rce_get_carros( $args = array() ) {
	$defaults = array(
		'post_type' => 'carros',
		'posts_per_page' => get_option( 'rce_carros_por_pagina', 12 ),
	);
	$args = wp_parse_args( $args, $defaults );
	return new WP_Query( $args );
}

/**
 * Obtém metadados do carro
 */
function rce_get_carro_meta( $post_id ) {
	return array(
		'preco' => get_post_meta( $post_id, '_rce_preco', true ),
		'ano' => get_post_meta( $post_id, '_rce_ano', true ),
		'km' => get_post_meta( $post_id, '_rce_km', true ),
		'autonomia' => get_post_meta( $post_id, '_rce_autonomia', true ),
	);
}

/**
 * Formata preço
 */
function rce_format_preco( $valor ) {
	return 'R$ ' . number_format( (float) $valor, 2, ',', '.' );
}

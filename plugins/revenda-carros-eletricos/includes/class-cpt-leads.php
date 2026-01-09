<?php
/**
 * Custom Post Type - Leads
 *
 * @package RevendaCarrosEletricos
 */

class RCE_CPT_Leads {
	
	public function __construct() {
		add_action( 'init', array( $this, 'register_post_type' ) );
	}
	
	public function register_post_type() {
		$labels = array(
			'name' => __( 'Leads', 'revenda-carros-eletricos' ),
			'singular_name' => __( 'Lead', 'revenda-carros-eletricos' ),
		);
		
		$args = array(
			'labels' => $labels,
			'public' => false,
			'show_ui' => true,
			'show_in_menu' => 'edit.php?post_type=carros',
			'show_in_rest' => true,
			'capability_type' => 'post',
			'capabilities' => array( 'create_posts' => false ),
			'map_meta_cap' => true,
			'supports' => array( 'title' ),
		);
		
		register_post_type( 'leads', $args );
	}
}

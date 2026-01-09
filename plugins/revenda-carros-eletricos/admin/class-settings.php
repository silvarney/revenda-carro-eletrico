<?php
/**
 * Settings
 *
 * @package RevendaCarrosEletricos
 */

class RCE_Settings {
	
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
	}
	
	public function add_settings_page() {
		add_submenu_page(
			'edit.php?post_type=carros',
			__( 'Configurações', 'revenda-carros-eletricos' ),
			__( 'Configurações', 'revenda-carros-eletricos' ),
			'manage_options',
			'rce-settings',
			array( $this, 'settings_page_html' )
		);
	}
	
	public function settings_page_html() {
		echo '<div class="wrap"><h1>' . esc_html__( 'Configurações', 'revenda-carros-eletricos' ) . '</h1>';
		echo '<p>Configurações serão implementadas em breve.</p>';
		echo '</div>';
	}
}

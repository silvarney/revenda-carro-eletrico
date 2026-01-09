<?php
/**
 * Ativação do plugin
 *
 * @package RevendaCarrosEletricos
 */

class RCE_Activator {
	
	/**
	 * Executado na ativação do plugin.
	 */
	public static function activate() {
		// Flush rewrite rules
		flush_rewrite_rules();
		
		// Cria opções padrão
		self::create_default_options();
	}
	
	/**
	 * Cria opções padrão do plugin.
	 */
	private static function create_default_options() {
		$defaults = array(
			'moeda' => 'BRL',
			'carros_por_pagina' => 12,
			'habilitar_galeria' => true,
			'max_fotos_galeria' => 15,
			'email_notificacao' => get_option( 'admin_email' ),
			'taxa_juros_padrao' => 1.5,
			'whatsapp_numero' => '',
			'google_analytics_id' => '',
			'google_maps_api_key' => '',
			'gtm_id' => '',
			'facebook_pixel_id' => '',
			'endereco_loja' => '',
		);
		
		foreach ( $defaults as $key => $value ) {
			$option_name = 'rce_' . $key;
			if ( false === get_option( $option_name ) ) {
				add_option( $option_name, $value );
			}
		}
	}
}

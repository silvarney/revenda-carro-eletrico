<?php
/**
 * Plugin Name: Revenda Carros Elétricos
 * Plugin URI: https://exemplo.com/revenda-carros-eletricos
 * Description: Sistema completo para gerenciar revenda de carros elétricos com favoritos, comparação, calculadora de financiamento e muito mais.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Author: Seu Nome
 * Author URI: https://exemplo.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: revenda-carros-eletricos
 * Domain Path: /languages
 *
 * @package RevendaCarrosEletricos
 */

// Se este arquivo for chamado diretamente, aborta.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Versão atual do plugin.
 */
define( 'RCE_VERSION', '1.0.0' );
define( 'REVENDA_CARROS_ELETRICOS_VERSION', '1.0.0' );
define( 'REVENDA_CARROS_ELETRICOS_PLUGIN_NAME', 'revenda-carros-eletricos' );

/**
 * Diretório do plugin.
 */
define( 'RCE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * URL do plugin.
 */
define( 'RCE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Basename do plugin.
 */
define( 'RCE_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/**
 * Código executado durante a ativação do plugin.
 */
function activate_revenda_carros_eletricos() {
	require_once RCE_PLUGIN_DIR . 'includes/class-activator.php';
	RCE_Activator::activate();
}

/**
 * Código executado durante a desativação do plugin.
 */
function deactivate_revenda_carros_eletricos() {
	require_once RCE_PLUGIN_DIR . 'includes/class-deactivator.php';
	RCE_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_revenda_carros_eletricos' );
register_deactivation_hook( __FILE__, 'deactivate_revenda_carros_eletricos' );

/**
 * Autoloader para as classes do plugin.
 */
spl_autoload_register( function( $class ) {
	// Prefixo do namespace do plugin
	$prefix = 'RCE_';
	
	// Se a classe não usa o prefixo, retorna
	if ( strpos( $class, $prefix ) !== 0 ) {
		return;
	}
	
	// Remove o prefixo
	$class_name = substr( $class, strlen( $prefix ) );
	
	// Converte para lowercase e substitui underscore por hífen
	$class_file = 'class-' . strtolower( str_replace( '_', '-', $class_name ) ) . '.php';
	
	// Possíveis diretórios
	$directories = array(
		RCE_PLUGIN_DIR . 'includes/',
		RCE_PLUGIN_DIR . 'admin/',
		RCE_PLUGIN_DIR . 'public/',
	);
	
	// Tenta carregar o arquivo
	foreach ( $directories as $directory ) {
		$file = $directory . $class_file;
		if ( file_exists( $file ) ) {
			require_once $file;
			return;
		}
	}
});

/**
 * Inicia a execução do plugin.
 */
function run_revenda_carros_eletricos() {
	// Carrega classes principais
	require_once RCE_PLUGIN_DIR . 'includes/class-cpt-carros.php';
	require_once RCE_PLUGIN_DIR . 'includes/class-cpt-leads.php';
	require_once RCE_PLUGIN_DIR . 'includes/class-taxonomies.php';
	require_once RCE_PLUGIN_DIR . 'includes/class-meta-boxes.php';
	require_once RCE_PLUGIN_DIR . 'includes/class-user-roles.php';
	require_once RCE_PLUGIN_DIR . 'includes/class-favoritos.php';
	require_once RCE_PLUGIN_DIR . 'includes/class-comparador.php';
	require_once RCE_PLUGIN_DIR . 'includes/class-calculadora.php';
	require_once RCE_PLUGIN_DIR . 'includes/class-leads.php';
	require_once RCE_PLUGIN_DIR . 'includes/class-rest-api.php';
	require_once RCE_PLUGIN_DIR . 'includes/class-query-helpers.php';
	require_once RCE_PLUGIN_DIR . 'includes/class-integrations.php';
	require_once RCE_PLUGIN_DIR . 'admin/class-admin.php';
	require_once RCE_PLUGIN_DIR . 'admin/class-settings.php';
	require_once RCE_PLUGIN_DIR . 'public/class-public.php';
	require_once RCE_PLUGIN_DIR . 'public/class-shortcodes.php';
	
	// Inicializa as classes
	new RCE_CPT_Carros();
	new RCE_CPT_Leads();
	new RCE_Taxonomies();
	new RCE_Meta_Boxes();
	new RCE_User_Roles();
	new RCE_Favoritos();
	new RCE_Comparador();
	new RCE_Calculadora();
	new RCE_Leads();
	new RCE_Rest_Api();
	new RCE_Query_Helpers();
	new RCE_Integrations();
	new RCE_Admin( REVENDA_CARROS_ELETRICOS_PLUGIN_NAME, REVENDA_CARROS_ELETRICOS_VERSION );
	new RCE_Public( REVENDA_CARROS_ELETRICOS_PLUGIN_NAME, REVENDA_CARROS_ELETRICOS_VERSION );
}

add_action( 'plugins_loaded', 'run_revenda_carros_eletricos' );

<?php
/**
 * Desativação do plugin
 *
 * @package RevendaCarrosEletricos
 */

class RCE_Deactivator {
	
	/**
	 * Executado na desativação do plugin.
	 */
	public static function deactivate() {
		// Flush rewrite rules
		flush_rewrite_rules();
	}
}

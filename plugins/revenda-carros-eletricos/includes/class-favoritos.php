<?php
class RCE_Favoritos { 
public function __construct() {
add_action( 'wp_ajax_rce_toggle_favorito', array( $this, 'toggle_favorito' ) );
add_action( 'wp_ajax_nopriv_rce_toggle_favorito', array( $this, 'toggle_favorito' ) );
}

public function toggle_favorito() {
if ( ! is_user_logged_in() ) {
wp_send_json_error( 'Usuário não logado' );
}
$post_id = intval( $_POST['post_id'] );
$favoritos = get_user_meta( get_current_user_id(), 'rce_favoritos', true );
if ( ! is_array( $favoritos ) ) $favoritos = array();

if ( in_array( $post_id, $favoritos ) ) {
$favoritos = array_diff( $favoritos, array( $post_id ) );
} else {
$favoritos[] = $post_id;
}

update_user_meta( get_current_user_id(), 'rce_favoritos', $favoritos );
wp_send_json_success();
}
}

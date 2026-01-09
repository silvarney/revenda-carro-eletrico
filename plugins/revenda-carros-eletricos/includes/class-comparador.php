<?php
class RCE_Comparador { 
public function __construct() {
add_action( 'wp_ajax_rce_add_comparacao', array( $this, 'add_comparacao' ) );
add_shortcode( 'rce_comparador', array( $this, 'render_comparador' ) );
}

public function add_comparacao() {
if ( ! isset( $_SESSION ) ) session_start();
$post_id = intval( $_POST['post_id'] );
if ( ! isset( $_SESSION['rce_comparacao'] ) ) $_SESSION['rce_comparacao'] = array();
$_SESSION['rce_comparacao'][] = $post_id;
wp_send_json_success();
}

public function render_comparador() {
return '<div class="rce-comparador">Comparador de Carros</div>';
}
}

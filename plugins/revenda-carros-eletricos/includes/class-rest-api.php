<?php
class RCE_Rest_Api { 
public function __construct() {
add_action( 'rest_api_init', array( $this, 'register_routes' ) );
}

public function register_routes() {
register_rest_route( 'rce/v1', '/carros', array(
'methods' => 'GET',
'callback' => array( $this, 'get_carros' ),
) );
}

public function get_carros() {
$query = new WP_Query( array( 'post_type' => 'carros' ) );
return rest_ensure_response( $query->posts );
}
}

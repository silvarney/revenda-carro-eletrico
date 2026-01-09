<?php
class RCE_Admin {
private $plugin_name;
private $version;

public function __construct( $plugin_name, $version ) {
$this->plugin_name = $plugin_name;
$this->version = $version;
add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
}

public function enqueue_styles() {
// Admin CSS
}

public function enqueue_scripts() {
// Admin JS
}
}

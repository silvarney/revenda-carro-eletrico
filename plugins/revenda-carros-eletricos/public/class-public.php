<?php
class RCE_Public {
private $plugin_name;
private $version;

public function __construct( $plugin_name, $version ) {
$this->plugin_name = $plugin_name;
$this->version = $version;
add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
}

public function enqueue_styles() {
wp_enqueue_style( $this->plugin_name, plugin_dir_url( dirname( __FILE__ ) ) . 'assets/css/public.css', array(), $this->version, 'all' );
}

public function enqueue_scripts() {
wp_enqueue_script( $this->plugin_name, plugin_dir_url( dirname( __FILE__ ) ) . 'assets/js/public.js', array( 'jquery' ), $this->version, false );
}
}

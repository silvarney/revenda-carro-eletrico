<?php
class RCE_Calculadora { 
public function __construct() {
add_shortcode( 'rce_calculadora', array( $this, 'render_calculadora' ) );
}

public function render_calculadora() {
return '<div class="rce-calculadora">Calculadora de Financiamento</div>';
}
}

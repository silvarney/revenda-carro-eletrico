<?php
class RCE_Leads { 
public function __construct() {
add_action( 'wp_ajax_rce_submit_lead', array( $this, 'submit_lead' ) );
add_action( 'wp_ajax_nopriv_rce_submit_lead', array( $this, 'submit_lead' ) );
}

public function submit_lead() {
$nome = sanitize_text_field( $_POST['nome'] );
$email = sanitize_email( $_POST['email'] );

$lead_id = wp_insert_post( array(
'post_type' => 'leads',
'post_title' => $nome,
'post_status' => 'publish',
) );

update_post_meta( $lead_id, '_rce_email', $email );
wp_send_json_success();
}
}

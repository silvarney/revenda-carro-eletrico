<?php
class RCE_User_Roles { 
public function __construct() {
add_action( 'init', array( $this, 'add_roles' ) );
}

public function add_roles() {
add_role( 'vendedor', 'Vendedor', array(
'read' => true,
'edit_posts' => true,
'delete_posts' => true,
) );
}
}

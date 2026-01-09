<?php
class RCE_Integrations { 
public function __construct() {
add_action( 'wp_footer', array( $this, 'add_whatsapp_button' ) );
add_action( 'wp_head', array( $this, 'add_google_analytics' ) );
}

public function add_whatsapp_button() {
	echo '<div class="rce-whatsapp-float">
		<a href="https://wa.me/5511999999999?text=Olá! Gostaria de mais informações sobre os carros elétricos." 
		   target="_blank" 
		   rel="noopener noreferrer"
		   title="Fale conosco no WhatsApp">
			<svg width="30" height="30" viewBox="0 0 32 32" fill="currentColor">
				<path d="M16 0C7.164 0 0 7.164 0 16c0 2.825.737 5.48 2.022 7.784L.077 31.5l8.027-2.1A15.923 15.923 0 0016 32c8.836 0 16-7.164 16-16S24.836 0 16 0zm0 29.333c-2.496 0-4.838-.688-6.83-1.88l-.49-.29-5.064 1.328 1.35-4.937-.318-.508A13.244 13.244 0 012.667 16c0-7.364 5.97-13.333 13.333-13.333S29.333 8.636 29.333 16 23.364 29.333 16 29.333z"/>
				<path d="M23.098 19.44c-.402-.2-2.376-1.173-2.743-1.307-.367-.133-.634-.2-.902.2-.267.402-1.036 1.307-1.27 1.574-.233.267-.467.3-.87.1-.401-.2-1.694-.625-3.227-1.993-1.193-1.064-1.998-2.378-2.232-2.78-.233-.402-.025-.62.176-.82.18-.18.402-.468.603-.703.2-.234.267-.402.4-.67.134-.267.067-.502-.033-.703-.1-.2-.902-2.175-1.236-2.98-.326-.784-.656-.678-.902-.69-.233-.012-.5-.015-.768-.015s-.703.1-1.07.502c-.368.402-1.403 1.373-1.403 3.348s1.437 3.883 1.637 4.15c.2.268 2.826 4.316 6.848 6.054.956.413 1.703.66 2.285.845.96.305 1.835.262 2.526.16.77-.115 2.376-.972 2.71-1.91.334-.94.334-1.745.234-1.912-.1-.167-.367-.267-.77-.468z"/>
			</svg>
		</a>
	</div>';}
public function add_google_analytics() {
// Google Analytics code here
}
}

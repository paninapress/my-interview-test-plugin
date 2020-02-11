<?php

/*********************************
* shortcode control
*********************************/

// Add Shortcode
function nitp_ip_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'url' => 'http://bot.whatismyipaddress.com/',
		)
	);

	// setup request for ip address
    $request = wp_remote_get( esc_url_raw( $atts['url'] ) );
    
    // check that this isn't going to return an error
    if( is_wp_error( $request ) ) {
	    return false;
    }
    
    // get the IP from request's body
    $body = wp_remote_retrieve_body( $request );

	return $body; //testing shortcode display
}

function nitp_register_shortcodes(){
    add_shortcode( 'nitp-shortcode', 'nitp_ip_shortcode' );
}
add_action( 'init', 'nitp_register_shortcodes');

?>
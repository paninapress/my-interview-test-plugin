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

    // check if transient exists:
    if ( false === ( $value = get_transient( 'nitp_ip_address' ) ) ) {
        // no transient set, set transient
        set_transient( 'nitp_ip_address', $body, HOUR_IN_SECONDS );
        // display newly set transient in shortcode
        return 'Just set transient and the ip address is ' . $body;
    }
    else{
        // retrieve transient and display with shortcode
        return 'Retrieving ip address ' . get_transient('nitp_ip_address');
    }
}

function nitp_register_shortcodes(){
    add_shortcode( 'nitp-shortcode', 'nitp_ip_shortcode' );
}
add_action( 'init', 'nitp_register_shortcodes');

?>
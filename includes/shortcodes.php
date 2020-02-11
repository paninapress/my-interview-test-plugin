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

	return 'test'; //testing shortcode display and attribute
    
}

function nitp_register_shortcodes(){
    add_shortcode( 'nitp-shortcode', 'nitp_ip_shortcode' );
}
add_action( 'init', 'nitp_register_shortcodes');

?>
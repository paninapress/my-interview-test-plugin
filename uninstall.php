<?php
// Exit if not uninstalling from WordPress.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb; // wordpress database

// Delete form posts.
$wpdb->query( "DELETE FROM {$wpdb->posts} WHERE post_type IN ( 'nitp_projects' );" );

// Delete forms postmeta.
$wpdb->query( "DELETE meta FROM {$wpdb->postmeta} meta LEFT JOIN {$wpdb->posts} posts ON posts.ID = meta.post_id WHERE posts.ID IS NULL;" );

?>
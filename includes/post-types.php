<?php

/*********************************
* Manage custom post types
*********************************/

function nitp_setup_post_type() {
    // check to see if post type exists
    if ( ! post_type_exists( 'nitp_projects' ) ) {
        // register the "portfolio projects" custom post type
        register_post_type( 'nitp_projects', 
        	array(
                'labels' => array(
                    'name' => __( 'Portfolio Projects' ),
                    'singular_name' => __( 'Portfolio Project' ),
                    'add_new'            => _x( 'Add New', 'project' ),
                    'add_new_item'       => __( 'Add New Project' ),
                    'edit_item'          => __( 'Edit Project' ),
                    'new_item'           => __( 'New Project' ),
                    'all_items'          => __( 'All Projects' ),
                    'view_item'          => __( 'View Project' ),
                    'search_items'       => __( 'Search Projects' ),
                    'not_found'          => __( 'No projects found' ),
                    'not_found_in_trash' => __( 'No projects found in the trash' ),
                ),
                'description' => 'A place to list portfolio projects',
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'my-portfolio-projects'),
                'menu_icon' => 'dashicons-portfolio',
            )
        );
    }
}
add_action( 'init', 'nitp_setup_post_type' );

function nitp_install() {
    // trigger our function that registers the custom post type
    nitp_setup_post_type();
 
    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'nitp_install' );

function nitp_deactivation() {
    // unregister the post type, so the rules are no longer in memory
    unregister_post_type( 'nitp_projects' );
    // clear the permalinks to remove our post type's rules from the database
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'nitp_deactivation' );

?>
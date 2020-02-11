<?php

/*********************************
* Manage custom post types
*********************************/

function nitp_setup_post_type() {
    // check to see if post type exists
    if ( ! post_type_exists( 'portfolio projects' ) ) {
        // register the "portfolio projects" custom post type
        register_post_type( 'portfolio projects', 
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
                'rewrite' => array('slug' => 'portfolio-projects'),
                'menu_icon' => 'dashicons-portfolio',
            )
        );
    }
}
add_action( 'init', 'nitp_setup_post_type' );

?>
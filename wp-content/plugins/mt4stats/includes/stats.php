<?php
/**
 * A Custom Post Type For Stats
 * @author Ulugbek Mamatkulov
 */
function create_stats() {
    register_post_type( 'stats',
        array(
            'labels' => array(
                'name' => 'Stats',
                'singular_name' => 'Stats',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Stats',
                'edit' => 'Edit',
                'edit_item' => 'Edit The Stats',
                'new_item' => 'New Stats',
                'view' => 'View',
                'view_item' => 'View The Stats',
                'search_items' => 'Search Stats',
                'not_found' => 'No Stats found',
                'not_found_in_trash' => 'No Stats found in Trash',
                'parent' => 'Parent Stats'
            ),
 
            'public' => true,
            'menu_position' => 2,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-chart-area',
            'has_archive' => true
        )
    );
}
add_action( 'init', 'create_stats' );

// function add_new_stats_page() {
// 	if ( ! is_single( 'new-stats' ) ) {
// 		return;
// 	}
// 	echo "Xello";
// }
// add_action(  , add_new_stats_page, 10, 1 );

// custom jquery
wp_register_script( 'custom_js', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery' ), '1.0', TRUE );
wp_enqueue_script( 'custom_js' );
 
// validation
wp_register_script( 'validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', array( 'jquery' ) );
wp_enqueue_script( 'validation' );
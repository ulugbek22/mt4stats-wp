<?php
/**
 * Plugin Name: My Plugin
 * Plugin URI: http://teacherbot.uz
 * Description: Teacherbot Plugin
 * Version: 1.0.0
 * Author: Ulugbek Mamatkulov
 * License: GPLv2 or later
 * Text Domain: teacherbot
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

include( plugin_dir_path( __FILE__ ) . 'functions.php' );

define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Set Up The Form
 */
function stats_form( $content ) {
	if ( is_page( 'new-stats' ) ) {
		include( plugin_dir_path( __FILE__ ) . 'temp/new-stats-form.php' );
	}
	return $content;
}
add_filter( 'the_content', 'stats_form', 10, 1 );

/**
 * Insert The Stats From The User
 */
function save_the_stats() {
	$new_stat = [
		'post_title' 	=> $_POST['post_title'],
		'post_content' 	=> '',
		'meta_input' 	=> [ 
			'stats_head' => get_the_stats_data( $_POST['post_content'], 'header' ),
			'stats_body' => get_the_stats_data( $_POST['post_content'], 'body' )
		],
		'post_author' 	=> get_current_user_id(),
		'post_status' 	=> 'publish',
		'post_type' 	=> 'stats'
	];

	$id = wp_insert_post( $new_stat, false );

	wp_redirect( site_url( '/?page_id=105&id=' . $id ) );
	exit();
} 
add_action( 'admin_post_new_stats', 'save_the_stats', 10, 1 );

/**
 * Load The Custom Stylesheet
 */
function mt4_stats_styles() {
	wp_enqueue_style( 'custom-style', PLUGIN_URL . 'css/style.css', [], time(), 'all' );
	if ( is_single() ) {
		wp_enqueue_style( 'custom-trades-style', PLUGIN_URL . 'css/stats-show.css', [], time(), 'all' );
	}
}
add_action( 'wp_enqueue_scripts', 'mt4_stats_styles' );

/**
 * Set Up The Home Page & Single Post
 */
function mt4_stats_loop( $query ) {
	if ( ( $query->is_home() || $query->is_single() ) && $query->is_main_query() && ! is_admin() ) {
        $query->set( 'post_type', 'stats' );
    }
}
add_filter( 'pre_get_posts', 'mt4_stats_loop', 10, 1 );

function mt4_stats_content( $content ) {
	if ( is_single() ) {
		$header = get_post_meta( get_the_ID(), 'stats_head' );
		$body 	= get_post_meta( get_the_ID(), 'stats_body' );
		$header = unserialize( $header[0] );
		$body 	= unserialize( $body[0] );
		foreach ( $header as $item ) {
			echo '<p>' . $item . '</p>';
		}
		echo '<hr>';
		echo get_trades_from_data( $body );
	}
}
add_action( 'the_content', 'mt4_stats_content', 10, 1 );
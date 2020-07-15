<?php
/*
Plugin Name: Wpblog Plugin For Widget
Plugin URI: https://www.wpblog.com/
Description: Wpblog plugin for widget
Version: 1.0
*/
class wp_blog_plugin extends WP_Widget {
    function wp_blog_plugin() {
        parent::WP_Widget(false, $widget_name = __('Wpblog Widget', 'wp_widget_plugin') );
    }
	// display widget value
	function widget($args, $instance) {
		if ( is_user_logged_in() ) {
			echo '<aside class="widget widget-meta">';
	        echo '<a href="' . wp_logout_url( get_permalink() ) . '">Logout</a>';
	        echo '</aside>';
		} else {
			echo '<aside class="widget widget-meta">';
			$url = wp_login_url( get_permalink(), false );
	        $login_btn = '<a href="' . $url . '">Login</a> or ';
	        wp_register( $login_btn, ' to be able to create stats.<br>It is free.', true );
	        echo '</aside>';
		}
	}
}
// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_blog_plugin");'));
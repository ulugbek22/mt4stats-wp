<?php
/*
Plugin Name: Mt4Stats
Description: This is a statistic tool for mt4 stats
Version: 1.0.0
Author: Ulugbek Mamatkulov
Author URI: https://teacherbot.uz
License: GPLv2 or later
Text Domain: teacherbot
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

include( plugin_dir_path( __FILE__ ) . 'includes/admin-footer-text.php' );
include( plugin_dir_path( __FILE__ ) . 'includes/stats.php' );


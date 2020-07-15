<?php

function admin_footer_text( $footer ) {
	$new_footer = str_replace( '.</span>', __( ' and <a href="https://t.me/teacherbot_admin">Ulugbek Mamatkulov</a>', 'teacherbot' ), $footer );
	return $new_footer;
}
add_filter( 'admin_footer_text', 'admin_footer_text', 10, 1 );
<?php
/**
 * The template for displaying a message that posts cannot be found.
 *
 * @package Progeny_MMXV
 * @since 1.0.0
 */

$post_type        = get_post_type() ? get_post_type() : get_query_var( 'post_type' );
$post_type_object = get_post_type_object( $post_type );

if ( empty( $post_type_object ) && is_tax() ) {
	$taxonomy         = get_taxonomy( get_queried_object()->taxonomy );
	$post_type_object = get_post_type_object( $taxonomy->object_type[0] );
}
?>

<section class="no-results not-found">
	<div class="page-header">
		<?php the_audiotheme_archive_title( '<h1 class="page-title">', '<h1>' ); ?></h1>

		<div class="page-content">
			<?php if ( current_user_can( 'publish_posts' ) ) : ?>

				<p>
					<?php
					printf( esc_html_x( 'Ready to publish your first %1$s? <a href="%2$s">Get started here</a>.', 'post type label; add post type link', 'progeny-mmxv' ),
						esc_html( $post_type_object->labels->singular_name ),
						esc_url( add_query_arg( 'post_type', $post_type_object->name, admin_url( 'post-new.php' ) ) )
					);
					?>
				</p>

			<?php else : ?>

				<p>
					<?php
					printf( esc_html_x( 'There are currently not any %s available.', 'post type label', 'progeny-mmxv' ),
						esc_html( $post_type_object->label )
					);
					?>
				</p>

			<?php endif; ?>
		</div>
	</div>
</section>

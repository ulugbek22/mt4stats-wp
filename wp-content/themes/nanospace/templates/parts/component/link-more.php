<?php
/**
 * More link HTML
 *
 * @package    NanoSpace
 * @copyright  Labinator
 *
 * @since 1.0.0
 * @version 1.0.0
 */

?>

<div class="link-more">
	<a href="<?php the_permalink(); ?>" class="more-link">
		<?php

		printf(
			esc_html_x( 'Continue reading%s&hellip;', '%s: Name of current post.', 'nanospace' ),
			the_title( '<span class="screen-reader-text"> &ldquo;', '&rdquo;</span>', false )
		);

		?>
	</a>
</div>
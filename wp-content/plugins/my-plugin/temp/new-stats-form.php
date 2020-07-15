<form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="new-stats-form">
	<input type="title" name="post_title"><br>
	<textarea name="post_content"></textarea><br>
	<input type="hidden" name="action" value="new_stats">
	<button type="submit">Add Stats</button>
	<!-- Flash Messaging -->
	<p>
		<?php 
			if ( isset ( $_GET['id'] ) ) {
				echo ( $_GET['id'] > 0 ) ? 'New Stats Created.' : 'Something is wrong.';
			}
		?>
	</p>
</form>
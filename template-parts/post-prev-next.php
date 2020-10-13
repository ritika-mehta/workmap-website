<?php
/**
 * The template part for displaying post prev next section.
 *
 * @package Squaretype
 */

$prev_post = get_previous_post();
$next_post = get_next_post();

if ( $prev_post || $next_post ) {
?>
	<div class="post-prev-next">
		<?php
		// Prev post.
		if ( $prev_post ) {
			?>
				<a class="link-item prev-link" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
					<div class="link-content">
						<div class="link-label">
							<span class="link-arrow"></span><span class="link-text"> — <?php esc_html_e( 'Previous article', 'squaretype' ); ?></span>
						</div>

						<h2 class="entry-title">
							<?php echo esc_attr( $prev_post->post_title ); ?>
						</h2>
					</div>
				</a>
			<?php
		}

		// Next post.
		if ( $next_post ) {
			?>
				<a class="link-item next-link" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
					<div class="link-content">
						<div class="link-label">
							<span class="link-text"><?php esc_html_e( 'Next article', 'squaretype' ); ?> — </span><span class="link-arrow"></span>
						</div>

						<h2 class="entry-title">
							<?php echo esc_attr( $next_post->post_title ); ?>
						</h2>
					</div>
				</a>
			<?php
		}
		?>
	</div>
<?php
}

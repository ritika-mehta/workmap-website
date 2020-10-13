<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Squaretype
 */

global $wp_query;

$preview_image = get_theme_mod( csco_get_archive_option( 'preview_image' ), true );

// Var Archive type.
if ( get_query_var( 'csco_archive_layout' ) ) {
	$archive_layout = get_theme_mod( get_query_var( 'csco_archive_layout' ), 'list' );
} else {
	$archive_layout = get_theme_mod( csco_get_archive_option( 'layout' ), 'list' );
}

// Var Archive class.
$class = $preview_image ? 'entry-preview' : 'entry-without-preview';
?>

<article <?php post_class( $class ); ?>>
	<div class="post-outer">
		<?php
		// Post Category.
		if ( 'list' !== $archive_layout ) {
			csco_get_post_meta( 'category', false, true, true );
		}
		?>

		<?php
		// Post Thumbnail.
		if ( $preview_image && has_post_thumbnail() ) {
			$orientation = 'cs-overlay-ratio cs-ratio-landscape';

			$image_size = 'csco-thumbnail';

			if ( 'masonry' === $archive_layout ) {
				$image_size = 'csco-thumbnail-uncropped';

				$orientation = null;
			}

			if ( 'list' === $archive_layout && 'disabled' === csco_get_page_sidebar() ) {
				$image_size = 'csco-medium-alternative';
			}
		?>
		<div class="post-inner">
			<div class="entry-thumbnail">
				<div class="cs-overlay cs-overlay-hover  cs-bg-dark <?php echo esc_attr( $orientation ); ?>">
					<div class="cs-overlay-background">
						<?php the_post_thumbnail( $image_size ); ?>
						<?php csco_get_video_background( 'archive' ); ?>
					</div>
					<div class="cs-overlay-content">
						<span class="read-more"><?php echo esc_html( get_theme_mod( 'misc_label_readmore', __( 'Read More', 'squaretype' ) ) ); ?></span>
						<?php csco_get_post_meta( array( 'reading_time' ), false, true, true ); ?>
						<?php csco_the_post_format_icon(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="cs-overlay-link"></a>
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="post-inner">
			<?php
			// Post Category.
			if ( 'list' === $archive_layout ) {
				csco_get_post_meta( 'category', false, true, true );
			}
			?>
			<header class="entry-header">
				<?php
				// Post Title.
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

				csco_get_post_meta( array( 'author', 'date', 'views', 'shares', 'comments' ), false, true, true );
				?>
			</header>

			<?php
			// Post Details.
			$more_button = get_theme_mod( csco_get_archive_option( 'more_button' ), false );

			$post_excerpt = get_the_excerpt();

			if ( $post_excerpt || $more_button ) {
			?>
				<div class="entry-details">
					<?php if ( $post_excerpt ) { ?>
						<div class="entry-excerpt">
							<?php echo wp_kses( $post_excerpt, 'post' ); ?>
						</div>
					<?php } ?>

					<?php if ( $more_button ) { ?>
						<div class="entry-more">
							<a class="button" href="<?php echo esc_url( get_permalink() ); ?>">
								<?php echo esc_html( get_theme_mod( 'misc_label_readmore', __( 'Read More', 'squaretype' ) ) ); ?>
							</a>
						</div>
					<?php } ?>
				</div>
			<?php } ?>

		</div><!-- .post-inner -->

	</div><!-- .post-outer -->
</article>

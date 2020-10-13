<?php
/**
 * The template part for displaying post large header section.
 *
 * @package Squaretype
 */

$class = 'entry-header entry-header-large';

// Check if post has an image attached.
if ( has_post_thumbnail() ) {
	$class .= ' entry-header-thumbnail';
}
?>

<section class="entry-header <?php echo esc_attr( $class ); ?> cs-video-wrap cs-overlay-ratio cs-ratio-wide">
	<div class="entry-overlay cs-overlay-background">
		<?php
			the_post_thumbnail( 'csco-extra-large', array(
				'class' => 'pk-lazyload-disabled',
			) );
		?>
		<?php csco_get_video_background( 'large-header', null, false ); ?>
		<span class="cs-overlay-blank"></span>
	</div>

	<div class="entry-header-inner cs-bg-dark">

		<?php
		if ( ! csco_doing_request() ) {
			csco_breadcrumbs( true );
		}
		?>

		<?php
		if ( is_singular( 'post' ) ) {
			$category = csco_get_post_meta( 'category', false, false, 'post_meta' );
		}

		if ( in_array( 'large-header', (array) get_post_meta( get_the_ID(), 'csco_post_video_location', true ), true ) ) {
			$video_url = get_post_meta( get_the_ID(), 'csco_post_video_url', true );
		}

		if ( ( isset( $video_url ) && $video_url ) || ( isset( $category ) && $category ) ) {
		?>
			<div class="entry-details">
				<?php
				if ( isset( $video_url ) && $video_url ) {
				?>
					<div class="entry-tools cs-video-tools-large">
						<a class="cs-player-control cs-player-link cs-player-stop" target="_blank" href="<?php echo esc_url( $video_url ); ?>">
							<span class="cs-tooltip"><span><?php esc_html_e( 'View on YouTube', 'squaretype' ); ?></span></span>
						</a>
						<span class="cs-player-control cs-player-volume cs-player-mute"></span>
						<span class="cs-player-control cs-player-state cs-player-pause"></span>
					</div>
				<?php } ?>

				<?php echo isset( $category ) ? (string) $category : null; // XSS. ?>
			</div>
		<?php } ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php
		if ( is_singular( 'post' ) ) {
			csco_get_post_meta( array( 'author', 'date', 'views', 'shares', 'comments', 'reading_time' ), false, true, 'post_meta' );
		}
		?>

		<?php
		if ( 'page' === get_post_type() ) {
			$excerpt_enabled = get_theme_mod( 'page_excerpt', true ) && has_excerpt();
		} else {
			$excerpt_enabled = get_theme_mod( 'post_excerpt', true ) && has_excerpt();
		}

		if ( $excerpt_enabled ) {
			?>
			<div class="post-excerpt"><?php the_excerpt(); ?></div>
			<?php
		}
		?>

	</div>

</section>

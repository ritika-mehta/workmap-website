<?php
/**
 * Template part singular content
 *
 * @package Squaretype
 */

$post_type = get_post_type();

$preview_image = get_theme_mod( csco_get_archive_option( 'preview_image' ), true );

// Var Archive type.
$archive_layout = get_theme_mod( csco_get_archive_option( 'layout' ), 'list' );

// Var Summary type.
$summary_type = get_theme_mod( csco_get_archive_option( 'summary' ), 'excerpt' );

// Var Layout class.
$class = $preview_image ? ' entry-preview' : ' entry-without-preview';

if ( is_singular() ) {
	$class .= ' entry';
}

?>

<article <?php post_class( $class ); ?>>

	<?php
	// Post Date for Timeline Layout.
	if ( ! is_singular() && 'timeline' === $archive_layout ) {
		?>
		<div class="entry-sep <?php echo csco_get_post_meta( array( 'date' ), false, false, true ) ? 'cs-d-lg-none' : ''; ?>"></div>

		<?php if ( csco_get_post_meta( array( 'date' ), false, false, true ) ) { ?>
			<div class="entry-date">
				<?php
					echo esc_html( get_the_date( 'd' ) );
					?>
					<span><?php echo esc_html( get_the_date( 'F' ) ); ?></span>
					<?php
					if ( get_the_date( 'Y' ) !== date( 'Y' ) ) {
						?>
						<span><?php echo esc_html( get_the_date( 'Y' ) ); ?></span>
						<?php
					}
				?>
			</div>
		<?php } ?>
		<?php
	}
	?>

	<!-- Full Post Layout -->
	<?php
	if ( ! is_singular() ) {
		?>
			<div class="entry-header">
				<?php do_action( 'csco_singular_entry_header_start' ); ?>

				<?php csco_get_post_meta( 'category', false, true, true ); ?>

				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

				<?php
				if ( 'timeline' === $archive_layout ) {
					csco_get_post_meta( array( 'author', 'views', 'shares', 'comments', 'reading_time' ), false, true, true );
				} else {
					csco_get_post_meta( array( 'author', 'date', 'views', 'shares', 'comments', 'reading_time' ), false, true, true );
				}
				?>

				<?php do_action( 'csco_singular_entry_header_end' ); ?>
			</div>

			<?php
			if ( $preview_image ) {
				csco_post_media();
			}
			?>
		<?php
	}
	?>

	<?php do_action( 'csco_singular_content_before' ); ?>

	<!-- Full Post Layout and Full Content -->
	<div class="entry-content-wrap">

		<?php do_action( 'csco_singular_content_start' ); ?>

		<div class="entry-content">

			<?php
			if ( ! is_singular() && ( 'excerpt' === $summary_type || 'timeline' === $archive_layout ) ) {
				the_excerpt();
			} else {
				$more_link_text = false;

				if ( get_theme_mod( csco_get_archive_option( 'more_button' ), false ) ) {
					$more_link_text = sprintf(
						/* translators: %s: Name of current post */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'squaretype' ),
						get_the_title()
					);
				}

				the_content( $more_link_text );
			}
			?>

		</div>
		<?php do_action( 'csco_singular_content_end' ); ?>
	</div>

	<?php do_action( 'csco_singular_content_after' ); ?>

	<?php
	// Read More.
	if ( ! is_singular() && ( 'excerpt' === $summary_type || 'timeline' === $archive_layout ) ) {
		if ( get_theme_mod( csco_get_archive_option( 'more_button' ), false ) ) {
			?>
				<div class="entry-more">
					<a class="button" href="<?php echo esc_url( get_permalink() ); ?>">
						<?php echo esc_html( get_theme_mod( 'misc_label_readmore', __( 'Read More', 'squaretype' ) ) ); ?>
					</a>
				</div>
			<?php
		}
	}
	?>

</article>

<?php
/**
 * The template part for displaying page header.
 *
 * @package Squaretype
 */

// Init class and scheme for header.
$class  = null;
$scheme = null;

$style = csco_large_section_style();

// If description exists.
if ( get_the_archive_description() ) {
	$class = 'page-header-has-description';
}
?>

<header class="page-header <?php echo esc_attr( $class ); ?>" style="<?php echo esc_attr( $style ); ?>">

	<?php
	if ( is_category() ) {
		$background_id = get_term_meta( get_query_var( 'cat' ), 'csco_background_image', true );
		if ( $background_id ) {
			?>
				<div class="cs-overlay-background">
					<?php
						echo wp_get_attachment_image( $background_id, 'csco-extra-large', array(
							'class' => 'pk-lazyload-disabled',
						) );
					?>
					<span class="cs-overlay-blank"></span>
				</div>
			<?php
		}
	}
	?>

	<div class="cs-container">

		<?php
		if ( is_category() ) {
			// Background color.
			if ( get_term_meta( get_query_var( 'cat' ), 'csco_background_color', true ) ) {
				$scheme = csco_light_or_dark( get_term_meta( get_query_var( 'cat' ), 'csco_background_color', true ), null, ' cs-bg-dark' );
			}

			// Gradient.
			$start_color = get_term_meta( get_query_var( 'cat' ), 'csco_gradient_start_color', true );
			$end_color   = get_term_meta( get_query_var( 'cat' ), 'csco_gradient_end_color', true );

			$start_scheme = $start_color ? csco_light_or_dark( $start_color, null, 'cs-bg-dark' ) : null;
			$end_scheme   = $end_color ? csco_light_or_dark( $end_color, null, 'cs-bg-dark' ) : null;

			if ( $start_color || $end_color ) {
				$scheme = null;
			}

			if ( 'cs-bg-dark' === $start_scheme || 'cs-bg-dark' === $end_scheme ) {
				$scheme = 'cs-bg-dark';
			}

			// Background image.
			if ( $background_id ) {
				$scheme = 'cs-bg-dark';
			}
		}
		?>

		<div class="page-header-content <?php echo esc_attr( $scheme ); ?>">

			<?php

			do_action( 'csco_page_header_before' );

			if ( is_author() ) {

				$subtitle  = esc_html__( 'All Posts By', 'squaretype' );
				$author_id = get_queried_object_id();
				?>

				<div class="page-author-container">
					<div class="author-avatar">
						<?php
						echo get_avatar( $author_id, 130 );
						if ( csco_powerkit_module_enabled( 'social_links' ) ) {
							powerkit_author_social_links( $author_id );
						}
						?>
					</div>
					<div class="author-content">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						csco_archive_post_count();
						csco_archive_post_description();
						?>
					</div>
				</div>

				<?php
			} elseif ( is_archive() ) {

				// Add special subtitles.
				if ( is_category() ) {
					$subtitle = esc_html__( 'Browsing Category', 'squaretype' );
				} elseif ( is_tag() ) {
					$subtitle = esc_html__( 'Browsing Tag', 'squaretype' );
				} else {
					$subtitle = '';
				}

				// Add a subtitle, wrapped in <p></p> if it exists.
				if ( $subtitle ) {
					?>
					<p class="page-subtitle title-block"><?php echo esc_html( $subtitle ); ?></p>
					<?php
				}

				the_archive_title( '<h1 class="page-title">', '</h1>' );
				csco_archive_post_count();
				csco_archive_post_description();

			} elseif ( is_search() ) {

				?>
				<p class="page-subtitle title-block"><?php esc_html_e( 'Search Results', 'squaretype' ); ?></p>
				<h1 class="page-title"><?php echo get_search_query(); ?></h1>
				<?php
				csco_archive_post_count();

			} elseif ( is_404() ) {

				?>
				<h1 class="page-title"><?php esc_html_e( '404', 'squaretype' ); ?></h1>
				<?php

			}

			do_action( 'csco_page_header_after' );
			?>

		</div>

	</div>

</header>

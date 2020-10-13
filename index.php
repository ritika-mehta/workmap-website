<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Squaretype
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php do_action( 'csco_main_before' ); ?>

		<main id="main" class="site-main">

			<?php

			do_action( 'csco_main_start' );

			if ( have_posts() ) {
				$archive_layout = get_theme_mod( csco_get_archive_option( 'layout' ), 'list' );

				$class = ' archive-heading-' . ( get_theme_mod( csco_get_archive_option( 'heading_size' ), 'medium' ) );

				$class .= ' archive-borders-' . ( get_theme_mod( csco_get_archive_option( 'borders_enabled' ), false ) ? 'enabled' : 'disabled' );

				$class .= ' archive-shadow-' . ( get_theme_mod( csco_get_archive_option( 'borders_shadow_effect' ), true ) ? 'enabled' : 'disabled' );

				$class .= ' archive-scale-' . ( get_theme_mod( csco_get_archive_option( 'borders_scale_effect' ), false ) ? 'enabled' : 'disabled' );
				?>

				<div class="post-archive">

					<div class="archive-wrap">

						<div class="archive-main archive-<?php echo esc_attr( $archive_layout ); ?> <?php echo esc_attr( $class ); ?>">
							<?php

							// Start the Loop.
							while ( have_posts() ) {
								the_post();

								if ( 'full' === $archive_layout || 'timeline' === $archive_layout ) {
									get_template_part( 'template-parts/content-singular' );
								} else {
									get_template_part( 'template-parts/content' );
								}
							}

							// Columns for masonry.
							if ( in_array( $archive_layout, array( 'masonry', 'full-masonry' ), true ) ) {
								echo '<div class="archive-col archive-col-1"></div>';
								echo '<div class="archive-col archive-col-2"></div>';
								echo '<div class="archive-col archive-col-3"></div>';
							}
							?>
						</div>

					</div>

					<?php
					/* Posts Pagination */
					if ( 'standard' === get_theme_mod( csco_get_archive_option( 'pagination_type' ), 'load-more' ) ) {
						the_posts_pagination(
							array(
								'prev_text' => esc_html__( 'Previous', 'squaretype' ),
								'next_text' => esc_html__( 'Next', 'squaretype' ),
							)
						);
					}
					?>

				</div>

			<?php
			} else {
				?>

				<div class="entry-content content-not-found">
					<p><?php esc_html_e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'squaretype' ); ?></p>
					<?php get_search_form(); ?>
				</div>

				<?php
			}

			do_action( 'csco_main_end' );
			?>

		</main>

		<?php do_action( 'csco_main_after' ); ?>

	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php
/**
 * The template part for displaying related posts.
 *
 * @package Squaretype
 */

$args = array(
	'query_type'          => 'related',
	'orderby'             => 'rand',
	'ignore_sticky_posts' => true,
	'post__not_in'        => array( $post->ID ),
	'category__in'        => wp_get_post_categories( $post->ID ),
	'posts_per_page'      => get_theme_mod( 'related_number', 6 ),
);

// Order by.
$orderby = get_theme_mod( 'related_orderby', 'date' );

$type_post_views = csco_post_views_enabled();

if ( 'post_views' === $orderby && $type_post_views ) {
	// Post Views.
	$args['orderby'] = $type_post_views;
	// Don't hide posts without views.
	$args['views_query']['hide_empty'] = false;

	// Time Frame.
	$time_frame = get_theme_mod( 'related_time_frame' );
	if ( $time_frame ) {
		$args['date_query'] = array(
			array(
				'column' => 'post_date_gmt',
				'after'  => $time_frame . ' ago',
			),
		);
	}
}

// Set query vars, so that we can get them across all templates.
set_query_var( 'csco_archive_layout', 'related_layout' );

// WP Query.
$related = new WP_Query( apply_filters( 'csco_related_posts_args', $args ) );

if ( $related->have_posts() && isset( $related->posts ) ) {

	$related_enable = true;
	$maximum_posts  = false;

	// Get related layout.
	$layout = get_theme_mod( 'related_layout', 'list' );

	$heading_size = get_theme_mod( 'archive_heading_size', 'medium' );

	$class = ' archive-heading-' . ( get_theme_mod( 'archive_heading_size', 'medium' ) );

	$class .= ' archive-borders-' . ( get_theme_mod( 'archive_borders_enabled', false ) ? 'enabled' : 'disabled' );

	$class .= ' archive-shadow-' . ( get_theme_mod( 'archive_borders_shadow_effect', true ) ? 'enabled' : 'disabled' );

	$class .= ' archive-scale-' . ( get_theme_mod( 'archive_borders_scale_effect', false ) ? 'enabled' : 'disabled' );

	// Calc possible number of posts.
	if ( 'grid' === $layout ) {
		$divider = ( 'disabled' === csco_get_page_sidebar() ) ? 3 : 2;

		$maximum_posts = floor( count( $related->posts ) / $divider ) * $divider;

		if ( $maximum_posts <= 0 ) {
			$related_enable = false;
		}
	}

	if ( $related_enable ) :
	?>
		<section class="post-archive archive-related">

			<div class="archive-wrap">

				<?php $tag = apply_filters( 'csco_section_title_tag', 'h5' ); ?>

				<div class="title-block-wrap">
					<<?php echo esc_html( $tag ); ?> class="title-block">
						<?php esc_html_e( 'You May Also Like', 'squaretype' ); ?>
					</<?php echo esc_html( $tag ); ?>>
				</div>

				<div class="archive-main archive-<?php echo esc_attr( $layout ); ?> <?php echo esc_attr( $class ); ?>">

					<?php
					$counter = 0;
					/* Start the Loop */
					while ( $related->have_posts() ) {
						$related->the_post();

						$counter++;

						// Possible number of posts for Grid.
						if ( false !== $maximum_posts ) {
							if ( $counter > $maximum_posts ) {
								continue;
							}
						}

						// Get content template part.
						get_template_part( 'template-parts/content' );
					}
					?>
				</div>

			</div>

		</section>
	<?php endif; ?>

	<?php wp_reset_postdata(); ?>

<?php
set_query_var( 'csco_archive_layout', null );
}

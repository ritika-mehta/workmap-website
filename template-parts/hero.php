<?php
/**
 * Template part for displaying hero section.
 *
 * @package Squaretype
 */

// Get ids of general settings.
$general_ids = csco_get_general_posts_ids();

// Get posts of general settings.
if ( $general_ids ) {
	$args = array(
		'ignore_sticky_posts' => true,
		'post__in'            => $general_ids,
		'posts_per_page'      => 1,
		'orderby'             => 'post__in',
		'post_type'           => array( 'post', 'page' ),
	);

	$general_query = new WP_Query( $args );
}

$layout = get_theme_mod( 'general_hero_layout', 'fullwidth' );

// Set class for hero section.
$class = sprintf( 'cs-hero-layout cs-hero-layout-%s', $layout );

if ( get_theme_mod( 'column_hero', false ) ) {
	$class .= ' cs-hero-right-column';
}

if ( 'fullwidth' === $layout ) {
	$class .= ' cs-overlay-ratio cs-ratio-wide';
}

if ( 'boxed' === $layout ) {
	$class .= ' cs-overlay-ratio cs-ratio-16by9';
}

// Determines whether there are more posts available in the loop.
if ( $general_ids && $general_query->have_posts() ) {

	$general_query->the_post();

	$style = csco_large_section_style();

	do_action( 'csco_hero_before' );
	?>

	<div class="section-hero">
		<div class="<?php echo esc_attr( $class ); ?> cs-video-wrap" style="<?php echo esc_attr( $style ); ?>">

			<?php
			$background_type = get_theme_mod( 'general_hero_bg_type', 'color' );
			if ( 'image' === $background_type ) {
				?>
					<div class="hero-overlay cs-overlay-background">
						<?php
							the_post_thumbnail(
								'csco-extra-large', array(
									'class' => 'pk-lazyload-disabled',
								)
							);
						?>
						<?php csco_get_video_background( 'hero', null, false ); ?>
						<span class="cs-overlay-blank"></span>
					</div>
				<?php
			}
			?>

			<div class="cs-hero-container">
				<div class="cs-hero">
					<!-- Full Post Layout -->
					<?php
					$scheme = null;

					switch ( get_theme_mod( 'general_hero_font_color', 'auto' ) ) {
						case 'auto':
							if ( 'color' === $background_type ) {
								$scheme = csco_light_or_dark( get_theme_mod( 'general_hero_color', '#F9F9FB' ), null, ' cs-bg-dark' );
							}

							// Post Category Background Color.
							if ( 'category_color' === $background_type ) {
								$category = csco_get_top_category( get_the_ID() );
								if ( $category ) {
									$background_color = get_term_meta( $category->term_id, 'csco_background_color', true );

									if ( $background_color ) {
										$scheme = csco_light_or_dark( $background_color, null, 'cs-bg-dark' );
									}
								}
							}

							// Custom Gradient Color.
							if ( 'gradient' === $background_type ) {
								$start_color = get_theme_mod( 'general_hero_start_color' );
								$end_color   = get_theme_mod( 'general_hero_end_color' );

								$start_scheme = $start_color ? csco_light_or_dark( $start_color, null, 'cs-bg-dark' ) : null;
								$end_scheme   = $end_color ? csco_light_or_dark( $end_color, null, 'cs-bg-dark' ) : null;

								if ( 'cs-bg-dark' === $start_scheme || 'cs-bg-dark' === $end_scheme ) {
									$scheme = 'cs-bg-dark';
								}
							}

							// Post Category Background Gradient.
							if ( 'category_gradient' === $background_type ) {
								$category = csco_get_top_category( get_the_ID() );
								if ( $category ) {
									$start_color = get_term_meta( $category->term_id, 'csco_gradient_start_color', true );
									$end_color   = get_term_meta( $category->term_id, 'csco_gradient_end_color', true );

									$start_scheme = $start_color ? csco_light_or_dark( $start_color, null, 'cs-bg-dark' ) : null;
									$end_scheme   = $end_color ? csco_light_or_dark( $end_color, null, 'cs-bg-dark' ) : null;

									if ( 'cs-bg-dark' === $start_scheme || 'cs-bg-dark' === $end_scheme ) {
										$scheme = 'cs-bg-dark';
									}
								}
							}

							// If the image for the whole block.
							if ( 'image' === $background_type ) {
								$scheme = 'cs-bg-dark';
							}
							break;
						case 'light':
							$scheme = 'cs-bg-dark';
							break;
					}
					?>
					<div class="hero-full <?php echo esc_attr( $scheme ); ?>">
						<?php
							$meta_setting = 'general_hero_meta';

							$heading_size = get_theme_mod( 'general_hero_heading_size', 'medium' );

							$class = sprintf( 'heading-%s', $heading_size );
						?>
						<article <?php post_class( $class ); ?>>
							<?php
							if ( 'post' === get_post_type() ) {
								$category = csco_get_post_meta( 'category', false, false, $meta_setting );

								if ( in_array( 'hero', (array) get_post_meta( get_the_ID(), 'csco_post_video_location', true ), true ) ) {
									$video_url = get_post_meta( get_the_ID(), 'csco_post_video_url', true );
								}
							}

							if ( ( isset( $video_url ) && $video_url ) || ( isset( $category ) && $category ) ) {
								?>
								<div class="hero-details">
									<?php
									if ( isset( $video_url ) && $video_url ) {
										?>
										<div class="hero-tools cs-video-tools-large">
											<a class="cs-player-control cs-player-link cs-player-stop" target="_blank" href="<?php echo esc_url( $video_url ); ?>">
												<span class="cs-tooltip"><span><?php esc_html_e( 'View on YouTube', 'squaretype' ); ?></span></span>
											</a>
											<span class="cs-player-control cs-player-volume cs-player-mute"></span>
											<span class="cs-player-control cs-player-state cs-player-pause"></span>
										</div>
									<?php } ?>

									<?php echo (string) $category; // XSS. ?>
								</div>
							<?php } ?>

							<?php the_title( '<h2 class="hero-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

							<?php
							if ( get_theme_mod( 'general_hero_preview_image', false ) ) {
								csco_post_media();
							}
							?>

							<?php
							if ( 'post' === get_post_type() ) {
								csco_get_post_meta( array( 'author', 'date', 'views', 'shares', 'comments', 'reading_time' ), false, true, $meta_setting );
							}
							?>

							<?php if ( get_the_excerpt() ) { ?>
								<div class="hero-excerpt">
									<?php the_excerpt(); ?>
								</div>
							<?php } ?>

							<?php
							if ( get_theme_mod( 'general_hero_more_button', false ) ) {
								?>
									<div class="entry-more">
										<a class="button" href="<?php echo esc_url( get_permalink() ); ?>">
											<?php echo esc_html( get_theme_mod( 'misc_label_readmore', __( 'Read More', 'squaretype' ) ) ); ?>
										</a>
									</div>
								<?php
							}
							?>
						</article>
						<?php wp_reset_postdata(); ?>
					</div>

					<!-- List Layout -->
					<?php
					if ( get_theme_mod( 'column_hero', false ) ) {

						$content = get_theme_mod( 'column_hero_content', 'default-list' );

						$column_enabled = false;

						if ( 'custom' === $content || 'widgets' === $content ) {

							$column_enabled = true;

						} else {
							$column_ids = csco_get_column_posts_ids();

							if ( $column_ids ) {
								$args = array(
									'ignore_sticky_posts' => true,
									'post__in'            => $column_ids,
									'posts_per_page'      => count( $column_ids ),
									'orderby'             => 'post__in',
									'post_type'           => array( 'post', 'page' ),
								);

								$column_query = new WP_Query( $args );
							}

							$column_enabled = $column_ids && $column_query->have_posts();
						}

						// Determines whether there are more posts available in the loop.
						if ( $column_enabled ) {

							$meta_setting = 'column_hero_meta';

							// Set column scheme.
							switch ( get_theme_mod( 'column_hero_font_color', 'auto' ) ) {
								case 'auto':
									$color = csco_rgba2hex( get_theme_mod( 'column_hero_color', '#FFFFFF' ) );

									$scheme = csco_light_or_dark( $color, null, 'cs-bg-dark' );
									break;
								case 'light':
									$scheme = 'cs-bg-dark';
									break;
								default:
									$scheme = null;
									break;
							}
							?>
							<div class="hero-list hero-<?php echo esc_attr( $content ); ?> <?php echo esc_attr( $scheme ); ?>">
								<?php
								$sidebar_title = get_theme_mod( 'column_hero_title' );
								if ( $sidebar_title ) {
									?>
									<div class="title-block"><?php echo wp_kses_post( $sidebar_title ); ?></div>
									<?php
								}
								?>

								<?php
								if ( 'custom' === $content ) {
									$custom_content = get_theme_mod( 'column_hero_custom_content' );
									?>
									<div class="content-block"><?php echo do_shortcode( $custom_content ); ?></div>
									<?php
								} elseif ( 'widgets' === $content ) {
									if ( is_active_sidebar( 'sidebar-hero' ) ) {
										dynamic_sidebar( 'sidebar-hero' );
									}
								} else {
									while ( $column_query->have_posts() ) {
										$column_query->the_post();

										$preview_image = get_theme_mod( 'column_hero_preview_image', true );

										$preview = ( has_post_thumbnail() && $preview_image ) ? 'cs-preview-enabled' : 'cs-preview-disabled';
										?>
										<article <?php post_class( $preview ); ?>>
											<div class="cs-post-outer">
												<?php if ( 'cs-preview-enabled' === $preview ) { ?>
													<div class="cs-post-inner cs-post-thumbnail">
														<a href="<?php the_permalink(); ?>" class="post-thumbnail">
															<?php the_post_thumbnail( 'csco-small' ); ?>
														</a>
													</div>
												<?php } ?>

												<div class="cs-post-inner cs-post-data">
													<?php
													if ( 'post' === get_post_type() ) {
														if ( 'numbered-list' === $content ) {
															set_query_var( 'csco_category_first_char', $column_query->current_post + 1 );
														}

														csco_get_post_meta( 'category', false, true, $meta_setting );

														if ( 'numbered-list' === $content ) {
															set_query_var( 'csco_category_first_char', false );
														}
													}
													?>

													<?php if ( get_the_title() ) { ?>
														<h5 class="hero-title">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h5>
													<?php } ?>

													<?php
													if ( 'post' === get_post_type() ) {
														csco_get_post_meta( array( 'author', 'date', 'views', 'shares', 'comments', 'reading_time' ), false, true, $meta_setting );
													}
													?>
												</div>
											</div>
										</article>
										<?php
									}
								}
								?>
							</div>
							<?php
						}
					}
					?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>

		</div>
	</div>

	<?php
	do_action( 'csco_hero_after' );
}


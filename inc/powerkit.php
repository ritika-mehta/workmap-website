<?php
/**
 * Powerkit Filters
 *
 * @package Squaretype
 */

/**
 * Remove Locations Share Buttons
 *
 * @param array $locations List of Locations.
 */
function csco_remove_share_buttons_locations( $locations = array() ) {

	unset( $locations['before-content'] );
	unset( $locations['after-content'] );

	return $locations;
}
add_filter( 'powerkit_share_buttons_locations', 'csco_remove_share_buttons_locations' );

/**
 * Register Post Archive Share Buttons Location
 *
 * @param array $locations List of Locations.
 */
function csco_share_buttons_after_content( $locations = array() ) {

	$locations['after-post'] = array(
		'shares'         => array( 'facebook', 'twitter', 'pinterest' ),
		'name'           => esc_html__( 'After Post Content', 'squaretype' ),
		'location'       => 'after-post',
		'mode'           => 'mixed',
		'before'         => '',
		'after'          => '',
		'display'        => true,
		'fields'         => array(
			'display_total'   => true,
			'display_count'   => true,
			'schemes'         => array( 'default', 'bold-bg', 'bold' ),
			'count_locations' => array( 'inside' ),
		),
		'scheme'         => 'bold-bg',
		'count_location' => 'inside',
	);

	return $locations;
}
add_filter( 'powerkit_share_buttons_locations', 'csco_share_buttons_after_content' );

/**
 * Register Post Archive Share Buttons Location
 *
 * @param array $locations List of Locations.
 */
function csco_share_buttons_post_meta( $locations = array() ) {

	$locations['post_meta'] = array(
		'shares'         => array( 'facebook', 'twitter', 'pinterest' ),
		'name'           => esc_html__( 'Post Archive', 'squaretype' ),
		'location'       => 'post_meta',
		'mode'           => 'cached',
		'before'         => '',
		'after'          => '',
		'display'        => true,
		'meta'           => array(
			'icons'  => true,
			'titles' => false,
			'labels' => false,
		),
		// Display only the specified layouts and color schemes.
		'fields'         => array(
			'layouts'         => array( 'simple' ),
			'schemes'         => array( 'default', 'bold' ),
			'count_locations' => array( 'inside' ),
		),
		'display_total'  => false,
		'layout'         => 'simple',
		'scheme'         => 'default',
		'count_location' => 'inside',
	);

	return $locations;
}
add_filter( 'powerkit_share_buttons_locations', 'csco_share_buttons_post_meta' );

/**
 * Register Floated Share Buttons Location
 *
 * @param array $locations List of Locations.
 */
function csco_share_buttons_post_sidebar( $locations = array() ) {

	$locations['post_sidebar'] = array(
		'shares'         => array( 'facebook', 'twitter', 'pinterest', 'mail' ),
		'name'           => esc_html__( 'Entry Sidebar', 'squaretype' ),
		'location'       => 'post_sidebar',
		'mode'           => 'mixed',
		'before'         => '',
		'after'          => '',
		'display'        => true,
		'meta'           => array(
			'icons'  => true,
			'titles' => false,
			'labels' => false,
		),
		// Display only the specified layouts and color schemes.
		'fields'         => array(
			'display_total'   => true,
			'display_count'   => true,
			'layouts'         => array( 'simple' ),
			'schemes'         => array( 'default', 'bold', 'bold-bg' ),
			'count_locations' => array( 'inside' ),
		),
		'layout'         => 'simple',
		'scheme'         => 'default',
		'count_location' => 'inside',
	);

	return $locations;
}
add_filter( 'powerkit_share_buttons_locations', 'csco_share_buttons_post_sidebar' );

/**
 * Change Total Output of Share Buttons
 *
 * @param bool   $output  The output.
 * @param string $class   The class.
 * @param int    $count   The count.
 */
function csco_powerkit_share_buttons_total_output( $output, $class, $count ) {

	if ( false !== strpos( $class, 'pk-share-buttons-after-post' ) ) {
		ob_start();
		?>
		<div class="pk-share-buttons-count cs-font-primary"><?php echo esc_html( $count ); ?> Shares:</div>
		<?php
		$output = ob_get_clean();
	}

	if ( false !== strpos( $class, 'pk-share-buttons-post_sidebar' ) ) {
		ob_start();
		?>
		<div class="pk-share-buttons-caption">
			<div class="pk-share-buttons-count cs-font-primary"> <?php echo esc_html( $count ); ?></div>
			<div class="pk-share-buttons-label cs-font-secondary"><?php esc_html_e( 'Shares', 'squaretype' ); ?></div>
		</div>
		<?php
		$output = ob_get_clean();
	}

	return $output;
}
add_filter( 'powerkit_share_buttons_total_output', 'csco_powerkit_share_buttons_total_output', 10, 3 );

/**
 * Register Floated Share Buttons Location
 */
function csco_powerkit_widget_author_image_size() {
	return 'csco-thumbnail-uncropped';
}
add_filter( 'powerkit_widget_author_image_size', 'csco_powerkit_widget_author_image_size' );

/**
 * Change Contributors widget post author description length.
 */
function csco_powerkit_widget_contributors_description_length() {
	return 80;
}
add_filter( 'powerkit_widget_contributors_description_length', 'csco_powerkit_widget_contributors_description_length' );

/**
 * Add new settings to Widget Posts
 *
 * @param array $settings The settings.
 */
function csco_powerkit_widget_posts_settings( $settings ) {

	$settings = array_merge(
		$settings,
		array(
			'post_meta'          => array( 'category', 'author' ),
			'post_meta_category' => true,
			'preview'            => true,
		)
	);

	return $settings;
}
add_filter( 'powerkit_widget_posts_settings', 'csco_powerkit_widget_posts_settings' );

/**
 * Add update handler for Widget Posts
 *
 * @param array $instance Current settings.
 */
function csco_powerkit_widget_posts_update( $instance ) {

	// Display Preview Images.
	if ( ! isset( $instance['preview'] ) ) {
		$instance['preview'] = false;
	}

	return $instance;
}
add_filter( 'powerkit_widget_posts_update', 'csco_powerkit_widget_posts_update' );

/**
 * Add new field to Widget Posts
 *
 * @param object $context  The context.
 * @param array  $params   The params.
 * @param array  $instance Current settings.
 */
function csco_powerkit_widget_posts_form_before( $context, $params, $instance ) {
	?>
		<!-- Display Preview Images -->
		<p><label><input id="<?php echo esc_attr( $context->get_field_id( 'preview' ) ); ?>" class="checkbox" name="<?php echo esc_attr( $context->get_field_name( 'preview' ) ); ?>" type="checkbox" <?php checked( (bool) $params['preview'] ); ?> /> <?php esc_html_e( 'Display Preview Images', 'squaretype' ); ?></label></p>
	<?php
}
add_action( 'powerkit_widget_posts_form_before', 'csco_powerkit_widget_posts_form_before', 10, 3 );

/**
 * Change Default Template for featured posts
 *
 * @param array $templates The templates.
 */
function csco_powerkit_featured_default( $templates = array() ) {

	$templates['list']['func']     = 'csco_powerkit_featured_default_template';
	$templates['numbered']['func'] = 'csco_powerkit_featured_default_template';
	$templates['large']['func']    = 'csco_powerkit_featured_default_template';

	return $templates;
}
add_filter( 'powerkit_featured_posts_templates', 'csco_powerkit_featured_default' );

/**
 * Featured Default Template Callback
 *
 * @param  array $posts    Array of posts.
 * @param  array $params   Array of params.
 * @param  array $instance Widget instance.
 */
function csco_powerkit_featured_default_template( $posts, $params, $instance ) {

	$class = null;

	// Thumbnail size.
	switch ( $params['template'] ) {
		case 'large':
			$thumbnail_size = 'csco-thumbnail-alternative';
			break;
		default:
			$thumbnail_size = 'csco-small';
			break;
	}

	$preview = ( has_post_thumbnail() && $params['preview'] ) ? 'pk-preview-enabled' : 'pk-preview-disabled';

	if ( 'large' === $params['template'] ) {
		?>
		<article <?php post_class( $preview ); ?>>
			<?php if ( 'pk-preview-enabled' === $preview ) : ?>
				<div class="pk-post-inner pk-overlay-thumbnail">
					<div class="cs-overlay cs-overlay-hover cs-overlay-ratio cs-ratio-landscape cs-bg-dark">
						<div class="cs-overlay-background">
							<?php the_post_thumbnail( 'csco-thumbnail-alternative' ); ?>
						</div>
						<div class="cs-overlay-content">
							<?php csco_the_post_format_icon(); ?>

							<?php if ( 'large' === $params['template'] ) : ?>
								<span class="read-more"><?php echo esc_html( get_theme_mod( 'misc_label_readmore', __( 'Read More', 'squaretype' ) ) ); ?></span>
							<?php endif; ?>

							<?php csco_get_post_meta( array( 'views', 'reading_time' ), (bool) $params['post_meta_compact'], true, $params['post_meta'] ); ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="cs-overlay-link"></a>
					</div>
				</div>
			<?php endif; ?>
			<div class="pk-post-inner pk-post-data">
				<div class="pk-data-wrap">
					<?php
					if ( function_exists( 'csco_get_post_meta' ) && $params['post_meta_category'] ) {
						csco_get_post_meta( 'category' );
					}
					?>

					<?php if ( get_the_title() ) { ?>
						<h5 class="h5 entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h5>
					<?php } ?>

					<?php csco_get_post_meta( array( 'author', 'date', 'shares', 'comments' ), (bool) $params['post_meta_compact'], true, $params['post_meta'] ); ?>
				</div>
			</div>
		</article>
		<?php
	} else {
		?>
		<article <?php post_class( $preview ); ?>>
			<div class="pk-post-outer">
				<?php if ( 'pk-preview-enabled' === $preview ) { ?>
					<div class="pk-post-inner pk-post-thumbnail">
						<a href="<?php the_permalink(); ?>" class="post-thumbnail">
							<?php the_post_thumbnail( $thumbnail_size ); ?>
						</a>
					</div>
				<?php } ?>

				<div class="pk-post-inner pk-post-data">
					<?php
					if ( function_exists( 'csco_get_post_meta' ) && $params['post_meta_category'] ) {
						if ( 'numbered' === $params['template'] ) {
							set_query_var( 'csco_category_first_char', $posts->current_post + 1 );
						}

						csco_get_post_meta( 'category' );

						if ( 'numbered' === $params['template'] ) {
							set_query_var( 'csco_category_first_char', false );
						}
					}
					?>
					<h5 class="entry-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h5>
					<?php csco_get_post_meta( array_diff( $params['post_meta'], array( 'category' ) ), (bool) $params['post_meta_compact'] ); ?>
				</div>
			</div>
		</article>
		<?php
	}
}

/**
 * Add new image selector for Lightbox
 *
 * @param string $selectors List selectors.
 */
function csco_powerkit_lightbox_image_selector( $selectors ) {
	$selectors[] = '.single .post-media img';

	return $selectors;
}

add_filter( 'powerkit_lightbox_image_selectors', 'csco_powerkit_lightbox_image_selector' );

/**
 * Exclude Inline Posts posts from related posts block
 *
 * @param array $args Array of WP_Query args.
 */
function csco_related_posts_args( $args ) {
	global $powerkit_inline_posts;
	if ( ! $powerkit_inline_posts ) {
		return $args;
	}
	$post__not_in         = $args['post__not_in'];
	$post__not_in         = array_unique( array_merge( $post__not_in, $powerkit_inline_posts ) );
	$args['post__not_in'] = $post__not_in;
	return $args;
}



/**
 * Remove Default Styles
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		wp_dequeue_style( 'powerkit-widget-posts' );
	}
);

/**
 * Change Default Widget Author Template
 *
 * @param array $templates List of Templates.
 */
function csco_powerkit_widget_author_templates( $templates = array() ) {

	$templates['default']['func'] = 'csco_widget_author_templates';

	return $templates;
}
add_filter( 'powerkit_widget_author_templates', 'csco_powerkit_widget_author_templates' );

/**
 * Default Widget Author Template
 *
 * @param int   $author   The author.
 * @param array $args     Array of args.
 * @param array $params   Array of params.
 * @param array $instance Widget instance.
 */
function csco_widget_author_templates( $author, $args, $params, $instance ) {
	// Before Widget.
	echo (string) $args['before_widget']; // XSS.
	?>
		<div class="widget-body">
			<div class="cs-widget-author<?php echo esc_attr( $params['bg_image_id'] ? ' cs-widget-author-with-bg' : '' ); ?>">
				<?php if ( $params['bg_image_id'] ) { ?>
					<div class="cs-widget-author-bg cs-overlay-background">
						<?php echo wp_get_attachment_image( $params['bg_image_id'], apply_filters( 'powerkit_widget_author_image_size', 'large' ) ); ?>
					</div>
				<?php } ?>

				<div class="cs-widget-author-container <?php echo esc_attr( $params['bg_image_id'] ? 'cs-bg-dark' : '' ); ?>">

					<h5 class="cs-author-title">
						<a href="<?php echo esc_url( get_author_posts_url( $author ) ); ?>" rel="author">
							<?php
							if ( $params['title'] ) {
								echo apply_filters( 'widget_title', (string) $params['title'] ); // XSS.
							} else {
								echo esc_html__( 'Hello, I’m ', 'squaretype' );
								echo esc_html( get_the_author_meta( 'display_name', $author ) );
							}
							?>
						</a>
					</h5>

					<?php
					if ( $params['description'] && get_the_author_meta( 'description', $author ) ) {
						?>
						<div class="author-description">
							<?php echo wp_kses_post( powerkit_str_truncate( get_the_author_meta( 'description', $author ), 100 ) ); ?>
						</div>
						<?php
					}
					?>

					<?php if ( $params['avatar'] || $params['social_accounts'] ) { ?>
						<div class="cs-author-data">
							<?php
							if ( $params['social_accounts'] && powerkit_module_enabled( 'social_links' ) ) {
								?>
								<div class="cs-social-accounts">
								<h5 class="title-block title-widget cs-social-label"><?php esc_html_e( 'Follow me', 'squaretype' ); ?></h5>
									<?php powerkit_author_social_links( $author ); ?>
								</div>
								<?php
							}
							?>

							<?php if ( $params['avatar'] ) { ?>
								<div class="cs-author-avatar">
									<a href="<?php echo esc_url( get_author_posts_url( $author ) ); ?>" rel="author">
										<?php echo get_avatar( $author, 80 ); ?>
									</a>
								</div>
							<?php } ?>
						</div>
					<?php } ?>

					<?php if ( $params['archive_btn'] ) { ?>
						<a href="<?php echo esc_url( get_author_posts_url( $author ) ); ?>" class="button cs-author-button">
							<?php echo wp_kses( apply_filters( 'powerkit_widget_author_button', esc_html__( 'View Posts', 'squaretype' ) ), 'post' ); ?>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php
	// After Widget.
	echo (string) $args['after_widget']; // XSS.
}
/**
 * Footer Register Instagram Template
 *
 * @since    1.0.0
 * @access   private
 *
 * @param array $templates List of Templates.
 */
function csco_footer_instagram_default( $templates = array() ) {

	$templates['default']['func'] = 'csco_footer_instagram_template';

	return $templates;
}

/**
 * Footer Instagram Template
 *
 * @param array $feed      The instagram feed.
 * @param array $instagram The instagram items.
 * @param array $params    The user parameters.
 */
function csco_footer_instagram_template( $feed, $instagram, $params ) {

	if ( is_array( $instagram ) && $instagram ) {
		?>
		<div class="pk-instagram-items">
			<a class="pk-instagram-username" target="_blank" href="https://www.instagram.com/<?php echo esc_attr( $feed['username'] ); ?>">
				@<?php echo esc_html( $feed['username'] ); ?>
			</a>
			<?php foreach ( $instagram as $item ) { ?>
				<div class="pk-instagram-item">
					<a class="pk-instagram-link" href="<?php echo esc_url( $item['user_link'] ); ?>" target="<?php echo esc_attr( $params['target'] ); ?>">
						<img src="<?php echo esc_attr( $item['user_image'] ); ?>" class="<?php echo esc_attr( $item['class'] ); ?>" alt="<?php echo esc_attr( $item['description'] ); ?>" srcset="<?php echo esc_attr( $item['srcset'] ); ?>" sizes="<?php echo esc_attr( $item['sizes'] ); ?>">

						<?php if ( is_int( $item['likes'] ) || is_int( $item['comments'] ) ) { ?>
							<span class="pk-instagram-data">
								<span class="pk-instagram-meta">
									<?php if ( is_int( $item['likes'] ) ) { ?>
										<span class="pk-meta pk-meta-likes"><i class="pk-icon pk-icon-like"></i> <?php echo esc_attr( powerkit_abridged_number( $item['likes'], 0 ) ); ?></span>
									<?php } ?>

									<?php if ( is_int( $item['comments'] ) ) { ?>
										<span class="pk-meta pk-meta-comments"><i class="pk-icon pk-icon-comment"></i> <?php echo esc_attr( powerkit_abridged_number( $item['comments'], 0 ) ); ?></span>
									<?php } ?>
								</span>
							</span>
						<?php } ?>
					</a>
				</div>
			<?php } ?>
		</div>
		<?php
	} else {
		?>
		<p><?php esc_html_e( 'Images Not Found!', 'squaretype' ); ?></p>
		<?php
	}
}

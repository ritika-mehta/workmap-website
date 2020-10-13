<?php
/**
 * Homepage Settings
 *
 * @package Squaretype
 */

/**
 * Removes default WordPress Static Front Page section
 * and re-adds it in our own panel with the same parameters.
 *
 * @param object $wp_customize Instance of the WP_Customize_Manager class.
 */
function csco_reorder_customizer_settings( $wp_customize ) {

	// Get current front page section parameters.
	$static_front_page = $wp_customize->get_section( 'static_front_page' );

	// Remove existing section, so that we can later re-add it to our panel.
	$wp_customize->remove_section( 'static_front_page' );

	// Re-add static front page section with a new name, but same description.
	$wp_customize->add_section( 'static_front_page', array(
		'title'           => esc_html__( 'Static Front Page', 'squaretype' ),
		'priority'        => 20,
		'description'     => $static_front_page->description,
		'panel'           => 'homepage_settings',
		'active_callback' => $static_front_page->active_callback,
	) );
}
add_action( 'customize_register', 'csco_reorder_customizer_settings' );

CSCO_Kirki::add_panel(
	'homepage_settings', array(
		'title'    => esc_html__( 'Homepage Settings', 'squaretype' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_section(
	'homepage_layout', array(
		'title'    => esc_html__( 'Homepage Layout', 'squaretype' ),
		'priority' => 15,
		'panel'    => 'homepage_settings',
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'home_layout',
		'label'    => esc_html__( 'Layout', 'squaretype' ),
		'section'  => 'homepage_layout',
		'default'  => 'list',
		'priority' => 10,
		'choices'  => array(
			'full'     => esc_html__( 'Full Post Layout', 'squaretype' ),
			'timeline' => esc_html__( 'Timeline Layout', 'squaretype' ),
			'list'     => esc_html__( 'List Layout', 'squaretype' ),
			'grid'     => esc_html__( 'Grid Layout', 'squaretype' ),
			'masonry'  => esc_html__( 'Masonry Layout', 'squaretype' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'home_sidebar',
		'label'    => esc_html__( 'Sidebar', 'squaretype' ),
		'section'  => 'homepage_layout',
		'default'  => 'right',
		'priority' => 10,
		'choices'  => array(
			'right'    => esc_html__( 'Right Sidebar', 'squaretype' ),
			'left'     => esc_html__( 'Left Sidebar', 'squaretype' ),
			'disabled' => esc_html__( 'No Sidebar', 'squaretype' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'home_preview_image',
		'label'    => esc_html__( 'Display preview images', 'squaretype' ),
		'section'  => 'homepage_layout',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'home_borders_enabled',
		'label'           => esc_html__( 'Display borders between posts', 'squaretype' ),
		'section'         => 'homepage_layout',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'masonry',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'list',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'home_borders_shadow_effect',
		'label'           => esc_html__( 'Enable shadow effect on hover', 'squaretype' ),
		'section'         => 'homepage_layout',
		'default'         => true,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'home_borders_enabled',
				'operator' => '==',
				'value'    => true,
			),
			array(
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'masonry',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'list',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'home_borders_scale_effect',
		'label'           => esc_html__( 'Enable scale effect on hover', 'squaretype' ),
		'section'         => 'homepage_layout',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'home_borders_enabled',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'home_borders_shadow_effect',
				'operator' => '==',
				'value'    => true,
			),
			array(
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'masonry',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'list',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio-buttonset',
		'settings' => 'home_heading_size',
		'label'    => esc_html__( 'Heading Size', 'squaretype' ),
		'section'  => 'homepage_layout',
		'default'  => 'medium',
		'priority' => 10,
		'choices'  => array(
			'small'  => esc_html__( 'Small', 'squaretype' ),
			'medium' => esc_html__( 'Medium', 'squaretype' ),
			'large'  => esc_html__( 'Large', 'squaretype' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'multicheck',
		'settings' => 'home_post_meta',
		'label'    => esc_html__( 'Post Meta', 'squaretype' ),
		'section'  => 'homepage_layout',
		'default'  => array( 'category', 'author', 'date', 'views', 'reading_time' ),
		'priority' => 10,
		'choices'  => apply_filters( 'csco_post_meta_choices', array(
			'category'     => esc_html__( 'Category', 'squaretype' ),
			'author'       => esc_html__( 'Author', 'squaretype' ),
			'date'         => esc_html__( 'Date', 'squaretype' ),
			'shares'       => esc_html__( 'Shares', 'squaretype' ),
			'views'        => esc_html__( 'Views', 'squaretype' ),
			'comments'     => esc_html__( 'Comments', 'squaretype' ),
			'reading_time' => esc_html__( 'Reading Time', 'squaretype' ),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'homepage_media_preview',
		'label'           => esc_html__( 'Post Preview Image Size', 'squaretype' ),
		'section'         => 'homepage_layout',
		'default'         => 'cropped',
		'priority'        => 10,
		'choices'         => array(
			'cropped'   => esc_html__( 'Display Cropped Image', 'squaretype' ),
			'uncropped' => esc_html__( 'Display Preview in Original Ratio', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'full',
				),
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'timeline',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'home_summary',
		'label'           => esc_html__( 'Full Post Summary', 'squaretype' ),
		'section'         => 'homepage_layout',
		'default'         => 'excerpt',
		'priority'        => 10,
		'choices'         => array(
			'excerpt' => esc_html__( 'Use Excerpts', 'squaretype' ),
			'content' => esc_html__( 'Use Read More Tag', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'home_layout',
					'operator' => '==',
					'value'    => 'full',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'home_more_button',
		'label'    => esc_html__( 'Display read more button', 'squaretype' ),
		'section'  => 'homepage_layout',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'home_pagination_type',
		'label'    => esc_html__( 'Pagination', 'squaretype' ),
		'section'  => 'homepage_layout',
		'default'  => 'load-more',
		'priority' => 10,
		'choices'  => array(
			'standard'  => esc_html__( 'Standard', 'squaretype' ),
			'load-more' => esc_html__( 'Load More Button', 'squaretype' ),
			'infinite'  => esc_html__( 'Infinite Load', 'squaretype' ),
		),
	)
);

CSCO_Kirki::add_section(
	'hero', array(
		'title'    => esc_html__( 'Hero Section', 'squaretype' ),
		'panel'    => 'homepage_settings',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'hero',
		'label'    => esc_html__( 'Display hero section', 'squaretype' ),
		'section'  => 'hero',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'hero_location',
		'label'           => esc_html__( 'Display Location', 'squaretype' ),
		'section'         => 'hero',
		'default'         => 'front_page',
		'priority'        => 10,
		'choices'         => array(
			'front_page' => esc_html__( 'Homepage', 'squaretype' ),
			'home'       => esc_html__( 'Posts page', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'show_on_front',
				'operator' => '==',
				'value'    => 'page',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'custom',
		'settings'        => 'hero_collapsible_general',
		'default'         => '<div class="customize-collapsible"><h3>' . esc_html__( 'General', 'squaretype' ) . '</h3></div>',
		'section'         => 'hero',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'general_hero_layout',
		'label'           => esc_html__( 'Layout', 'squaretype' ),
		'section'         => 'hero',
		'default'         => 'fullwidth',
		'priority'        => 10,
		'choices'         => array(
			'fullwidth' => esc_html__( 'Fullwidth', 'squaretype' ),
			'boxed'     => esc_html__( 'Boxed', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'general_hero_height',
		'label'           => esc_html__( 'Height', 'squaretype' ),
		'description'     => esc_html__( 'Input height in pixels. To fit viewport height input calc(100vh - 60px).', 'squaretype' ),
		'section'         => 'hero',
		'default'         => 'auto',
		'priority'        => 10,
		'output'          => array(
			array(
				'element'  => '.cs-hero-layout-fullwidth',
				'property' => 'min-height',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'general_hero_layout',
				'operator' => '==',
				'value'    => 'fullwidth',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'general_hero_preview_image',
		'label'           => esc_html__( 'Display preview image', 'squaretype' ),
		'section'         => 'hero',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio-buttonset',
		'settings'        => 'general_hero_heading_size',
		'label'           => esc_html__( 'Heading Size', 'squaretype' ),
		'section'         => 'hero',
		'default'         => 'medium',
		'priority'        => 10,
		'choices'         => array(
			'small'  => esc_html__( 'Small', 'squaretype' ),
			'medium' => esc_html__( 'Medium', 'squaretype' ),
			'large'  => esc_html__( 'Large', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'multicheck',
		'settings'        => 'general_hero_meta',
		'label'           => esc_html__( 'Post Meta', 'squaretype' ),
		'section'         => 'hero',
		'default'         => array( 'category', 'author', 'date', 'views', 'shares' ),
		'priority'        => 10,
		'choices'         => apply_filters( 'csco_post_meta_choices', array(
			'category'     => esc_html__( 'Category', 'squaretype' ),
			'author'       => esc_html__( 'Author', 'squaretype' ),
			'date'         => esc_html__( 'Date', 'squaretype' ),
			'shares'       => esc_html__( 'Shares', 'squaretype' ),
			'views'        => esc_html__( 'Views', 'squaretype' ),
			'comments'     => esc_html__( 'Comments', 'squaretype' ),
			'reading_time' => esc_html__( 'Reading Time', 'squaretype' ),
		) ),
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'general_hero_more_button',
		'label'           => esc_html__( 'Display read more button', 'squaretype' ),
		'section'         => 'hero',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'general_hero_filter_categories',
		'label'           => esc_html__( 'Filter by Categories', 'squaretype' ),
		'description'     => esc_html__( 'Add comma-separated list of category slugs. For example: &laquo;travel, lifestyle, food&raquo;. Leave empty for all categories.', 'squaretype' ),
		'section'         => 'hero',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'general_hero_filter_tags',
		'label'           => esc_html__( 'Filter by Tags', 'squaretype' ),
		'description'     => esc_html__( 'Add comma-separated list of tag slugs. For example: &laquo;worth-reading, top-5, playlists&raquo;. Leave empty for all tags.', 'squaretype' ),
		'section'         => 'hero',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'general_hero_filter_posts',
		'label'           => esc_html__( 'Filter by Posts', 'squaretype' ),
		'description'     => esc_html__( 'Add comma-separated list of post IDs. For example: 12, 34, 145. Leave empty for all posts.', 'squaretype' ),
		'section'         => 'hero',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

if ( csco_post_views_enabled() ) {

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'radio',
			'settings'        => 'general_hero_orderby',
			'label'           => esc_html__( 'Order posts by', 'squaretype' ),
			'section'         => 'hero',
			'default'         => 'date',
			'priority'        => 10,
			'choices'         => array(
				'date'       => esc_html__( 'Date', 'squaretype' ),
				'post_views' => esc_html__( 'Views', 'squaretype' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'hero',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'text',
			'settings'        => 'general_hero_time_frame',
			'label'           => esc_html__( 'Filter by Time Frame', 'squaretype' ),
			'description'     => esc_html__( 'Add period of posts in English. For example: &laquo;2 months&raquo;, &laquo;14 days&raquo; or even &laquo;1 year&raquo;', 'squaretype' ),
			'section'         => 'hero',
			'default'         => '',
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'hero',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'hero_orderby',
					'operator' => '==',
					'value'    => 'post_views',
				),
			),
		)
	);
}

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'general_hero_exclude',
		'label'           => esc_html__( 'Exclude hero posts from the main archive', 'squaretype' ),
		'section'         => 'hero',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'custom',
		'settings'        => 'hero_collapsible_background',
		'default'         => '<div class="customize-collapsible"><h3>' . esc_html__( 'Background', 'squaretype' ) . '</h3></div>',
		'section'         => 'hero',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'general_hero_bg_type',
		'label'           => esc_html__( 'Background Type', 'squaretype' ),
		'section'         => 'hero',
		'default'         => 'color',
		'priority'        => 10,
		'choices'         => array(
			'image'             => esc_html__( 'Post Preview Image', 'squaretype' ),
			'category_color'    => esc_html__( 'Post Category Background Color', 'squaretype' ),
			'category_gradient' => esc_html__( 'Post Category Background Gradient', 'squaretype' ),
			'color'             => esc_html__( 'Custom Background Color', 'squaretype' ),
			'gradient'          => esc_html__( 'Custom Gradient Color', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'select',
		'settings'        => 'general_hero_font_color',
		'label'           => esc_html__( 'Font Color', 'squaretype' ),
		'section'         => 'hero',
		'default'         => 'auto',
		'priority'        => 10,
		'choices'         => array(
			'auto'  => esc_html__( 'Detect automatically', 'squaretype' ),
			'dark'  => esc_html__( 'Dark', 'squaretype' ),
			'light' => esc_html__( 'Light', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'color',
		'settings'        => 'general_hero_image_overlay',
		'label'           => esc_html__( 'Overlay Color', 'squaretype' ),
		'section'         => 'hero',
		'priority'        => 10,
		'default'         => 'rgba(0,0,0,0.25)',
		'transport'       => 'auto',
		'choices'         => array(
			'alpha' => true,
		),
		'output'          => apply_filters( 'csco_color_overlay', array(
			array(
				'element'  => '.cs-hero-layout .cs-overlay-background:after',
				'property' => 'background-color',
			),
		) ),
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'general_hero_bg_type',
				'operator' => '==',
				'value'    => 'image',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'color',
		'settings'        => 'general_hero_color',
		'label'           => esc_html__( 'Background Color', 'squaretype' ),
		'section'         => 'hero',
		'priority'        => 10,
		'default'         => '#F9F9FB',
		'output'          => array(
			array(
				'element'  => '.cs-hero-layout',
				'property' => 'background-color',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'general_hero_bg_type',
				'operator' => '==',
				'value'    => 'color',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'color',
		'settings'        => 'general_hero_start_color',
		'label'           => esc_html__( 'Gradient Start Color', 'squaretype' ),
		'section'         => 'hero',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'general_hero_bg_type',
				'operator' => '==',
				'value'    => 'gradient',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'color',
		'settings'        => 'general_hero_end_color',
		'label'           => esc_html__( 'Gradient End Color', 'squaretype' ),
		'section'         => 'hero',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'general_hero_bg_type',
				'operator' => '==',
				'value'    => 'gradient',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'custom',
		'settings'        => 'hero_collapsible_right_column',
		'default'         => '<div class="customize-collapsible"><h3>' . esc_html__( 'Right Column', 'squaretype' ) . '</h3></div>',
		'section'         => 'hero',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'column_hero',
		'label'           => esc_html__( 'Display right column', 'squaretype' ),
		'section'         => 'hero',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'column_hero_content',
		'label'           => esc_html__( 'Content', 'squaretype' ),
		'section'         => 'hero',
		'default'         => 'default-list',
		'priority'        => 10,
		'choices'         => array(
			'default-list'  => esc_html__( 'Default post list', 'squaretype' ),
			'numbered-list' => esc_html__( 'Numbered post list', 'squaretype' ),
			'custom'        => esc_html__( 'Custom content', 'squaretype' ),
			'widgets'       => esc_html__( 'Widgets', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'column_hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'color',
		'settings'        => 'column_hero_color',
		'label'           => esc_html__( 'Background Color', 'squaretype' ),
		'section'         => 'hero',
		'priority'        => 10,
		'default'         => '#FFFFFF',
		'choices'         => array(
			'alpha' => true,
		),
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'column_hero',
				'operator' => '==',
				'value'    => true,
			),
		),
		'output'          => array(
			array(
				'element'  => '.cs-hero-layout .hero-list',
				'property' => 'background-color',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'select',
		'settings'        => 'column_hero_font_color',
		'label'           => esc_html__( 'Font Color', 'squaretype' ),
		'section'         => 'hero',
		'default'         => 'auto',
		'priority'        => 10,
		'choices'         => array(
			'auto'  => esc_html__( 'Detect automatically', 'squaretype' ),
			'dark'  => esc_html__( 'Dark', 'squaretype' ),
			'light' => esc_html__( 'Light', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'column_hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'              => 'text',
		'settings'          => 'column_hero_title',
		'label'             => esc_html__( 'Title', 'squaretype' ),
		'section'           => 'hero',
		'default'           => '',
		'priority'          => 10,
		'sanitize_callback' => 'wp_kses_post',
		'active_callback'   => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'column_hero',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'textarea',
		'settings'        => 'column_hero_custom_content',
		'label'           => esc_html__( 'Custom Content', 'squaretype' ),
		'section'         => 'hero',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'column_hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'column_hero_content',
				'operator' => '==',
				'value'    => 'custom',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'number',
		'settings'        => 'column_hero_number',
		'label'           => esc_html__( 'Number of Posts', 'squaretype' ),
		'section'         => 'hero',
		'default'         => 3,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'column_hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'default-list',
				),
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'numbered-list',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'column_hero_preview_image',
		'label'           => esc_html__( 'Display preview images', 'squaretype' ),
		'section'         => 'hero',
		'default'         => true,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'column_hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'default-list',
				),
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'numbered-list',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'multicheck',
		'settings'        => 'column_hero_meta',
		'label'           => esc_html__( 'Post Meta', 'squaretype' ),
		'section'         => 'hero',
		'default'         => array( 'category', 'author' ),
		'priority'        => 10,
		'choices'         => apply_filters( 'csco_post_meta_choices', array(
			'category'     => esc_html__( 'Category', 'squaretype' ),
			'author'       => esc_html__( 'Author', 'squaretype' ),
			'date'         => esc_html__( 'Date', 'squaretype' ),
			'shares'       => esc_html__( 'Shares', 'squaretype' ),
			'views'        => esc_html__( 'Views', 'squaretype' ),
			'comments'     => esc_html__( 'Comments', 'squaretype' ),
			'reading_time' => esc_html__( 'Reading Time', 'squaretype' ),
		) ),
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'column_hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'default-list',
				),
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'numbered-list',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'column_hero_filter_categories',
		'label'           => esc_html__( 'Filter by Categories', 'squaretype' ),
		'description'     => esc_html__( 'Add comma-separated list of category slugs. For example: &laquo;travel, lifestyle, food&raquo;. Leave empty for all categories.', 'squaretype' ),
		'section'         => 'hero',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'column_hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'default-list',
				),
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'numbered-list',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'column_hero_filter_tags',
		'label'           => esc_html__( 'Filter by Tags', 'squaretype' ),
		'description'     => esc_html__( 'Add comma-separated list of tag slugs. For example: &laquo;worth-reading, top-5, playlists&raquo;. Leave empty for all tags.', 'squaretype' ),
		'section'         => 'hero',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'column_hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'default-list',
				),
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'numbered-list',
				),
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'column_hero_filter_posts',
		'label'           => esc_html__( 'Filter by Posts', 'squaretype' ),
		'description'     => esc_html__( 'Add comma-separated list of post IDs. For example: 12, 34, 145. Leave empty for all posts.', 'squaretype' ),
		'section'         => 'hero',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'column_hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'default-list',
				),
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'numbered-list',
				),
			),
		),
	)
);

if ( csco_post_views_enabled() ) {

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'radio',
			'settings'        => 'column_hero_orderby',
			'label'           => esc_html__( 'Order posts by', 'squaretype' ),
			'section'         => 'hero',
			'default'         => 'date',
			'priority'        => 10,
			'choices'         => array(
				'date'       => esc_html__( 'Date', 'squaretype' ),
				'post_views' => esc_html__( 'Views', 'squaretype' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'hero',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'column_hero',
					'operator' => '==',
					'value'    => true,
				),
				array(
					array(
						'setting'  => 'column_hero_content',
						'operator' => '==',
						'value'    => 'default-list',
					),
					array(
						'setting'  => 'column_hero_content',
						'operator' => '==',
						'value'    => 'numbered-list',
					),
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'text',
			'settings'        => 'column_hero_time_frame',
			'label'           => esc_html__( 'Filter by Time Frame', 'squaretype' ),
			'description'     => esc_html__( 'Add period of posts in English. For example: &laquo;2 months&raquo;, &laquo;14 days&raquo; or even &laquo;1 year&raquo;', 'squaretype' ),
			'section'         => 'hero',
			'default'         => '',
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'hero',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'column_hero',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'hero_orderby',
					'operator' => '==',
					'value'    => 'post_views',
				),
				array(
					array(
						'setting'  => 'column_hero_content',
						'operator' => '==',
						'value'    => 'default-list',
					),
					array(
						'setting'  => 'column_hero_content',
						'operator' => '==',
						'value'    => 'numbered-list',
					),
				),
			),
		)
	);
}

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'column_hero_exclude',
		'label'           => esc_html__( 'Exclude hero column posts from the main archive', 'squaretype' ),
		'section'         => 'hero',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'column_hero',
				'operator' => '==',
				'value'    => true,
			),
			array(
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'default-list',
				),
				array(
					'setting'  => 'column_hero_content',
					'operator' => '==',
					'value'    => 'numbered-list',
				),
			),
		),
	)
);

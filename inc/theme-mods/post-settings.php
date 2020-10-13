<?php
/**
 * Post Settings
 *
 * @package Squaretype
 */

CSCO_Kirki::add_section(
	'post_settings', array(
		'title'    => esc_html__( 'Post Settings', 'squaretype' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'post_sidebar',
		'label'    => esc_html__( 'Default Sidebar', 'squaretype' ),
		'section'  => 'post_settings',
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
		'type'     => 'multicheck',
		'settings' => 'post_meta',
		'label'    => esc_html__( 'Post Meta', 'squaretype' ),
		'section'  => 'post_settings',
		'default'  => array( 'category', 'date', 'author', 'shares', 'views', 'reading_time' ),
		'priority' => 10,
		'choices'  => apply_filters( 'csco_post_meta_choices', array(
			'category'     => esc_html__( 'Category', 'squaretype' ),
			'date'         => esc_html__( 'Date', 'squaretype' ),
			'author'       => esc_html__( 'Author', 'squaretype' ),
			'shares'       => esc_html__( 'Shares', 'squaretype' ),
			'views'        => esc_html__( 'Views', 'squaretype' ),
			'comments'     => esc_html__( 'Comments', 'squaretype' ),
			'reading_time' => esc_html__( 'Reading Time', 'squaretype' ),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'post_header_type',
		'label'    => esc_html__( 'Default Page Header Type', 'squaretype' ),
		'section'  => 'post_settings',
		'default'  => 'standard',
		'priority' => 10,
		'choices'  => array(
			'standard' => esc_html__( 'Standard', 'squaretype' ),
			'large'    => esc_html__( 'Large', 'squaretype' ),
			'title'    => esc_html__( 'Page Title Only', 'squaretype' ),
			'none'     => esc_html__( 'None', 'squaretype' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'post_media_preview',
		'label'           => esc_html__( 'Standard Page Header Preview', 'squaretype' ),
		'section'         => 'post_settings',
		'default'         => 'cropped',
		'priority'        => 10,
		'choices'         => array(
			'cropped'   => esc_html__( 'Display Cropped Image', 'squaretype' ),
			'uncropped' => esc_html__( 'Display Preview in Original Ratio', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'post_header_type',
				'operator' => '==',
				'value'    => 'standard',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'select',
		'settings' => 'post_author_type',
		'label'    => esc_html__( 'Post Author Type', 'squaretype' ),
		'section'  => 'post_settings',
		'default'  => 'default',
		'priority' => 10,
		'choices'  => array(
			'default' => esc_html__( 'Default', 'squaretype' ),
			'compact' => esc_html__( 'Compact', 'squaretype' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'post_prev_next',
		'label'    => esc_html__( 'Display prev next links', 'squaretype' ),
		'section'  => 'post_settings',
		'default'  => true,
		'priority' => 10,
	)
);

if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {
	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'     => 'checkbox',
			'settings' => 'post_subscribe',
			'label'    => esc_html__( 'Display subscribe section', 'squaretype' ),
			'section'  => 'post_settings',
			'default'  => false,
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'checkbox',
			'settings'        => 'post_subscribe_name',
			'label'           => esc_html__( 'Display first name field', 'squaretype' ),
			'section'         => 'post_settings',
			'default'         => false,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'post_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'text',
			'settings'        => 'post_subscribe_title',
			'label'           => esc_html__( 'Title', 'squaretype' ),
			'section'         => 'post_settings',
			'default'         => esc_html__( 'Subscribe to Our Newsletter', 'squaretype' ),
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'post_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'              => 'text',
			'settings'          => 'post_subscribe_text',
			'label'             => esc_html__( 'Text', 'squaretype' ),
			'section'           => 'post_settings',
			'default'           => esc_html__( 'Get notified of the best deals on our WordPress themes.', 'squaretype' ),
			'priority'          => 10,
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => array(
				array(
					'setting'  => 'post_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);
}

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'post_tags',
		'label'    => esc_html__( 'Display tags', 'squaretype' ),
		'section'  => 'post_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'post_excerpt',
		'label'    => esc_html__( 'Display excerpts', 'squaretype' ),
		'section'  => 'post_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'post_comments_simple',
		'label'    => esc_html__( 'Display comments without the View Comments button', 'squaretype' ),
		'section'  => 'post_settings',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'related',
		'label'    => esc_html__( 'Display related section', 'squaretype' ),
		'section'  => 'post_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'related_layout',
		'label'           => esc_html__( 'Related Post Layout', 'squaretype' ),
		'section'         => 'post_settings',
		'default'         => 'list',
		'priority'        => 10,
		'choices'         => array(
			'list' => esc_html__( 'List', 'squaretype' ),
			'grid' => esc_html__( 'Grid', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'related',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'number',
		'settings'        => 'related_number',
		'label'           => esc_html__( 'Maximum Number of Related Posts', 'squaretype' ),
		'section'         => 'post_settings',
		'default'         => 4,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'related',
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
			'settings'        => 'related_orderby',
			'label'           => esc_html__( 'Order posts by', 'squaretype' ),
			'section'         => 'post_settings',
			'default'         => 'date',
			'priority'        => 10,
			'choices'         => array(
				'date'       => esc_html__( 'Date', 'squaretype' ),
				'post_views' => esc_html__( 'Views', 'squaretype' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'related',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'text',
			'settings'        => 'related_time_frame',
			'label'           => esc_html__( 'Time Frame', 'squaretype' ),
			'description'     => esc_html__( 'Add period of posts in English. For example: &laquo;2 months&raquo;, &laquo;14 days&raquo; or even &laquo;1 year&raquo;', 'squaretype' ),
			'section'         => 'post_settings',
			'default'         => '',
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'related',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'related_orderby',
					'operator' => '==',
					'value'    => 'post_views',
				),
			),
		)
	);
}

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'post_load_nextpost',
		'label'    => esc_html__( 'Enable the Auto Load Next Post feature', 'squaretype' ),
		'section'  => 'post_settings',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'post_load_nextpost_same_category',
		'label'           => esc_html__( 'Auto load posts from the same category only', 'squaretype' ),
		'section'         => 'post_settings',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'post_load_nextpost',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'post_load_nextpost_reverse',
		'label'           => esc_html__( 'Auto load previous posts instead of next ones', 'squaretype' ),
		'section'         => 'post_settings',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'post_load_nextpost',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

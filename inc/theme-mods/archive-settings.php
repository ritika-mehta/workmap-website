<?php
/**
 * Archive Settings
 *
 * @package Squaretype
 */

CSCO_Kirki::add_section(
	'archive_settings', array(
		'title'    => esc_html__( 'Archive Settings', 'squaretype' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'archive_layout',
		'label'    => esc_html__( 'Layout', 'squaretype' ),
		'section'  => 'archive_settings',
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
		'settings' => 'archive_sidebar',
		'label'    => esc_html__( 'Sidebar', 'squaretype' ),
		'section'  => 'archive_settings',
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
		'settings' => 'archive_preview_image',
		'label'    => esc_html__( 'Display preview images', 'squaretype' ),
		'section'  => 'archive_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'archive_borders_enabled',
		'label'           => esc_html__( 'Display borders between posts', 'squaretype' ),
		'section'         => 'archive_settings',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				array(
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'masonry',
				),
				array(
					'setting'  => 'archive_layout',
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
		'settings'        => 'archive_borders_shadow_effect',
		'label'           => esc_html__( 'Enable shadow effect on hover', 'squaretype' ),
		'section'         => 'archive_settings',
		'default'         => true,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'archive_borders_enabled',
				'operator' => '==',
				'value'    => true,
			),
			array(
				array(
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'masonry',
				),
				array(
					'setting'  => 'archive_layout',
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
		'settings'        => 'archive_borders_scale_effect',
		'label'           => esc_html__( 'Enable scale effect on hover', 'squaretype' ),
		'section'         => 'archive_settings',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'archive_borders_enabled',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'archive_borders_shadow_effect',
				'operator' => '==',
				'value'    => true,
			),
			array(
				array(
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'masonry',
				),
				array(
					'setting'  => 'archive_layout',
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
		'settings' => 'archive_heading_size',
		'label'    => esc_html__( 'Heading Size', 'squaretype' ),
		'section'  => 'archive_settings',
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
		'settings' => 'archive_post_meta',
		'label'    => esc_html__( 'Post Meta', 'squaretype' ),
		'section'  => 'archive_settings',
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
		'type'                 => 'radio',
		'settings'             => 'archive_media_preview',
		'label'                => esc_html__( 'Post Preview Image Size', 'squaretype' ),
		'section'              => 'archive_settings',
		'default'              => 'cropped',
		'priority'             => 10,
		'choices'              => array(
			'cropped'   => esc_html__( 'Display Cropped Image', 'squaretype' ),
			'uncropped' => esc_html__( 'Display Preview in Original Ratio', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'archive_layout',
					'operator' => '==',
					'value'    => 'full',
				),
				array(
					'setting'  => 'archive_layout',
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
		'settings'        => 'archive_summary',
		'label'           => esc_html__( 'Full Post Summary', 'squaretype' ),
		'section'         => 'archive_settings',
		'default'         => 'excerpt',
		'priority'        => 10,
		'choices'         => array(
			'excerpt' => esc_html__( 'Use Excerpts', 'squaretype' ),
			'content' => esc_html__( 'Use Read More Tag', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'archive_layout',
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
		'settings' => 'archive_more_button',
		'label'    => esc_html__( 'Display read more button', 'squaretype' ),
		'section'  => 'archive_settings',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'archive_pagination_type',
		'label'    => esc_html__( 'Pagination', 'squaretype' ),
		'section'  => 'archive_settings',
		'default'  => 'load-more',
		'priority' => 10,
		'choices'  => array(
			'standard'  => esc_html__( 'Standard', 'squaretype' ),
			'load-more' => esc_html__( 'Load More Button', 'squaretype' ),
			'infinite'  => esc_html__( 'Infinite Load', 'squaretype' ),
		),
	)
);

<?php
/**
 * Page Settings
 *
 * @package Squaretype
 */

CSCO_Kirki::add_section(
	'page_settings', array(
		'title'    => esc_html__( 'Page Settings', 'squaretype' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'page_sidebar',
		'label'    => esc_html__( 'Default Sidebar', 'squaretype' ),
		'section'  => 'page_settings',
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
		'type'     => 'radio',
		'settings' => 'page_header_type',
		'label'    => esc_html__( 'Page Header Type', 'squaretype' ),
		'section'  => 'page_settings',
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
		'settings'        => 'page_media_preview',
		'label'           => esc_html__( 'Standard Page Header Preview', 'squaretype' ),
		'section'         => 'page_settings',
		'default'         => 'cropped',
		'priority'        => 10,
		'choices'         => array(
			'cropped'   => esc_html__( 'Display Cropped Image', 'squaretype' ),
			'uncropped' => esc_html__( 'Display Preview in Original Ratio', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'page_header_type',
				'operator' => '==',
				'value'    => 'standard',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'page_excerpt',
		'label'    => esc_html__( 'Display excerpts', 'squaretype' ),
		'section'  => 'page_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'page_comments_simple',
		'label'    => esc_html__( 'Display comments without the View Comments button', 'squaretype' ),
		'section'  => 'page_settings',
		'default'  => false,
		'priority' => 10,
	)
);

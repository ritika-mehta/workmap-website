<?php
/**
 * Miscellaneous Settings
 *
 * @package Squaretype
 */

CSCO_Kirki::add_section(
	'miscellaneous', array(
		'title'    => esc_html__( 'Miscellaneous Settings', 'squaretype' ),
		'priority' => 60,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'misc_published_date',
		'label'    => esc_html__( 'Display published date instead of modified date', 'squaretype' ),
		'section'  => 'miscellaneous',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'text',
		'settings' => 'misc_search_placeholder',
		'label'    => esc_html__( 'Search Form Placeholder', 'squaretype' ),
		'section'  => 'miscellaneous',
		'default'  => esc_html__( 'Enter your search topic', 'squaretype' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'text',
		'settings' => 'misc_label_readmore',
		'label'    => esc_html__( '"Read More" Button Label', 'squaretype' ),
		'section'  => 'miscellaneous',
		'default'  => esc_html__( 'Read More', 'squaretype' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'misc_classic_gallery_alignment',
		'label'    => esc_html__( 'Alignment of Galleries in Classic Block', 'squaretype' ),
		'section'  => 'miscellaneous',
		'default'  => 'default',
		'priority' => 10,
		'choices'  => array(
			'default' => esc_html__( 'Default', 'squaretype' ),
			'wide'    => esc_html__( 'Wide', 'squaretype' ),
			'large'   => esc_html__( 'Large', 'squaretype' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'misc_sticky_sidebar',
		'label'    => esc_html__( 'Sticky Sidebar', 'squaretype' ),
		'section'  => 'miscellaneous',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'misc_sticky_sidebar_method',
		'label'           => esc_html__( 'Sticky Method', 'squaretype' ),
		'section'         => 'miscellaneous',
		'default'         => 'stick-to-top',
		'priority'        => 10,
		'choices'         => array(
			'stick-to-top'    => esc_html__( 'Sidebar top edge', 'squaretype' ),
			'stick-to-bottom' => esc_html__( 'Sidebar bottom edge', 'squaretype' ),
			'stick-last'      => esc_html__( 'Last widget top edge', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'misc_sticky_sidebar',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'radio',
		'settings'    => 'webfonts_load_method',
		'label'       => esc_html__( 'Webfonts Load Method', 'squaretype' ),
		'description' => esc_html__( 'Please', 'squaretype' ) . ' <a href="' . add_query_arg( array( 'action' => 'kirki-reset-cache' ), get_site_url() ) . '" target="_blank">' . esc_html__( 'reset font cache', 'squaretype' ) . '</a> ' . esc_html__( 'after saving.', 'squaretype' ),
		'section'     => 'miscellaneous',
		'default'     => 'async',
		'priority'    => 10,
		'choices'     => array(
			'async' => esc_html__( 'Asynchronous', 'squaretype' ),
			'link'  => esc_html__( 'Render-Blocking', 'squaretype' ),
		),
	)
);

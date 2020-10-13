<?php
/**
 * Header Settings
 *
 * @package Squaretype
 */

CSCO_Kirki::add_section(
	'header', array(
		'title'    => esc_html__( 'Header Settings', 'squaretype' ),
		'priority' => 40,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'header_layout',
		'label'    => esc_html__( 'Layout', 'squaretype' ),
		'section'  => 'header',
		'default'  => 'large',
		'priority' => 10,
		'choices'  => array(
			'large'   => esc_html__( 'Large', 'squaretype' ),
			'compact' => esc_html__( 'Compact', 'squaretype' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'header_width',
		'label'    => esc_html__( 'Width', 'squaretype' ),
		'section'  => 'header',
		'default'  => 'boxed',
		'priority' => 10,
		'choices'  => array(
			'boxed'     => esc_html__( 'Boxed', 'squaretype' ),
			'fullwidth' => esc_html__( 'Fullwidth', 'squaretype' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'header_alignment',
		'label'           => esc_html__( 'Alignment', 'squaretype' ),
		'section'         => 'header',
		'default'         => 'left',
		'priority'        => 10,
		'choices'         => array(
			'left'   => esc_html__( 'Left', 'squaretype' ),
			'center' => esc_html__( 'Center', 'squaretype' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'compact',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'header_shadow_submenus',
		'label'    => esc_html__( 'Display shadow on submenus', 'squaretype' ),
		'section'  => 'header',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'header_navigation_menu',
		'label'    => esc_html__( 'Display navigation menu', 'squaretype' ),
		'section'  => 'header',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'header_tagline',
		'label'           => esc_html__( 'Display tagline', 'squaretype' ),
		'section'         => 'header',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'large',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'dimension',
		'settings'        => 'header_height',
		'label'           => esc_html__( 'Header Height', 'squaretype' ),
		'section'         => 'header',
		'default'         => 'auto',
		'priority'        => 10,
		'output'          => array(
			array(
				'element'  => '.navbar-topbar .navbar-wrap',
				'property' => 'min-height',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'large',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'dimension',
		'settings' => 'header_nav_height',
		'label'    => esc_html__( 'Navigation Bar Height', 'squaretype' ),
		'section'  => 'header',
		'default'  => '60px',
		'priority' => 10,
		'output'   => array(
			array(
				'element'  => '.navbar-primary .navbar-wrap, .navbar-primary .navbar-content',
				'property' => 'height',
			),
			array(
				'element'       => '.offcanvas-header',
				'property'      => 'flex',
				'value_pattern' => '0 0 $',
			),
			array(
				'element'       => '.post-sidebar-shares',
				'property'      => 'top',
				'value_pattern' => 'calc( $ + 20px )',
			),
			array(
				'element'       => '.admin-bar .post-sidebar-shares',
				'property'      => 'top',
				'value_pattern' => 'calc( $ + 52px )',
			),
			array(
				'element'       => '.header-large .post-sidebar-shares',
				'property'      => 'top',
				'value_pattern' => 'calc( $ * 2 + 52px )',
			),
			array(
				'element'       => '.header-large.admin-bar .post-sidebar-shares',
				'property'      => 'top',
				'value_pattern' => 'calc( $ * 2 + 52px )',
			),
		),
	)
);


CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'checkbox',
		'settings'    => 'navbar_sticky',
		'label'       => esc_html__( 'Make navigation bar sticky', 'squaretype' ),
		'description' => esc_html__( 'Enabling this option will make navigation bar visible when scrolling.', 'squaretype' ),
		'section'     => 'header',
		'default'     => true,
		'priority'    => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'effects_navbar_scroll',
		'label'           => esc_html__( 'Enable the smart sticky feature', 'squaretype' ),
		'description'     => esc_html__( 'Enabling this option will reveal navigation bar when scrolling up and hide it when scrolling down.', 'squaretype' ),
		'section'         => 'header',
		'default'         => true,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'navbar_sticky',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'header_offcanvas',
		'label'    => esc_html__( 'Display offcanvas toggle button', 'squaretype' ),
		'section'  => 'header',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'header_search_button',
		'label'    => esc_html__( 'Display search button', 'squaretype' ),
		'section'  => 'header',
		'default'  => true,
		'priority' => 10,
	)
);

if ( csco_powerkit_module_enabled( 'social_links' ) ) {
	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'     => 'checkbox',
			'settings' => 'header_social_links',
			'label'    => esc_html__( 'Display social links', 'squaretype' ),
			'section'  => 'header',
			'default'  => false,
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'select',
			'settings'        => 'header_social_links_scheme',
			'label'           => esc_html__( 'Color scheme', 'squaretype' ),
			'section'         => 'header',
			'default'         => 'light',
			'priority'        => 10,
			'choices'         => array(
				'light'         => esc_html__( 'Light', 'squaretype' ),
				'bold'          => esc_html__( 'Bold', 'squaretype' ),
				'light-rounded' => esc_html__( 'Light Rounded', 'squaretype' ),
				'bold-rounded'  => esc_html__( 'Bold Rounded', 'squaretype' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'header_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'number',
			'settings'        => 'header_social_links_maximum',
			'label'           => esc_html__( 'Maximum Number of Social Links', 'squaretype' ),
			'section'         => 'header',
			'default'         => 3,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'header_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'checkbox',
			'settings'        => 'header_social_links_counts',
			'label'           => esc_html__( 'Display social counts', 'squaretype' ),
			'section'         => 'header',
			'default'         => true,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'header_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);
}

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'              => 'text',
		'settings'          => 'header_follow_button_label',
		'label'             => esc_html__( 'Button Label', 'squaretype' ),
		'section'           => 'header',
		'default'           => esc_html__( 'Subscribe', 'squaretype' ) . '<i class="cs-icon cs-icon-send"></i>',
		'priority'          => 10,
		'sanitize_callback' => 'wp_kses_post',
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'text',
		'settings' => 'header_follow_button_link',
		'label'    => esc_html__( 'Button Link', 'squaretype' ),
		'section'  => 'header',
		'default'  => '',
		'priority' => 10,
	)
);

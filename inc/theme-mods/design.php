<?php
/**
 * Design
 *
 * @package Squaretype
 */

CSCO_Kirki::add_section(
	'design', array(
		'title'    => esc_html__( 'Design', 'squaretype' ),
		'priority' => 20,
	)
);

/**
 * -------------------------------------------------------------------------
 * Colors
 * -------------------------------------------------------------------------
 */

CSCO_Kirki::add_section(
	'design_base', array(
		'title'    => esc_html__( 'design', 'squaretype' ),
		'panel'    => 'design',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'presets',
		'settings' => 'theme_presets',
		'label'    => esc_html__( 'Color Palettes', 'squaretype' ),
		'section'  => 'design',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'color',
		'settings' => 'color_primary',
		'label'    => esc_html__( 'Primary Color', 'squaretype' ),
		'section'  => 'design',
		'priority' => 10,
		'default'  => '#2E073B',
		'output'   => apply_filters( 'csco_color_primary', array(
			array(
				'element'  => 'a:hover, .entry-content a, .must-log-in a, blockquote:before, .cs-bg-dark .pk-social-links-scheme-bold:not(.pk-social-links-scheme-light-rounded) .pk-social-links-link .pk-social-links-icon, .subscribe-title',
				'property' => 'color',
			),
			array(
				'element'  => 'button, input[type="button"], input[type="reset"], input[type="submit"], .button, article .cs-overlay .post-categories a:hover, .post-prev-next .link-arrow, .post-format-icon > a, .cs-list-articles > li > a:hover:before, .pk-bg-primary, .pk-button-primary, .pk-badge-primary, h2.pk-heading-numbered:before, .cs-video-tools-default .cs-player-control:hover, .cs-bg-dark .pk-social-links-scheme-light-rounded .pk-social-links-link:hover .pk-social-links-icon, .footer-instagram .pk-instagram-username, .post-sidebar-shares .pk-share-buttons-link .pk-share-buttons-count, .wp-block-button .wp-block-button__link:not(.has-background), h2.is-style-cnvs-heading-numbered:before, .pk-featured-categories-vertical-list .pk-featured-count, .cnvs-block-posts-sidebar .cnvs-post-number, .adp-popup-type-notification-box .adp-popup-button, .adp-popup-type-notification-bar .adp-popup-button',
				'property' => 'background-color',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'      => 'color',
		'settings'  => 'color_overlay',
		'label'     => esc_html__( 'Overlay Color', 'squaretype' ),
		'section'   => 'design',
		'priority'  => 10,
		'default'   => 'rgba(0,0,0,0.25)',
		'transport' => 'auto',
		'choices'   => array(
			'alpha' => true,
		),
		'output'    => apply_filters( 'csco_color_overlay', array(
			array(
				'element'  => '.cs-overlay-background:after, .cs-overlay-hover:hover .cs-overlay-background:after, .cs-overlay-hover:focus .cs-overlay-background:after, .cs-hero .hero-list .cs-post-thumbnail:hover a:after, .gallery-type-justified .gallery-item > .caption, .pk-zoom-icon-popup:after, .pk-widget-posts .pk-post-thumbnail:hover a:after',
				'property' => 'background-color',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'color',
		'settings'        => 'color_large_header_bg',
		'label'           => esc_html__( 'Header Background', 'squaretype' ),
		'section'         => 'design',
		'default'         => '#FFFFFF',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'large',
			),
		),
		'output'          => array(
			array(
				'element'  => '.header-large .navbar-topbar',
				'property' => 'background-color',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'color',
		'settings' => 'color_navbar_bg',
		'label'    => esc_html__( 'Navigation Bar Background', 'squaretype' ),
		'section'  => 'design',
		'default'  => '#FFFFFF',
		'priority' => 10,
		'output'   => array(
			array(
				'element'  => '.navbar-primary, .offcanvas-header',
				'property' => 'background-color',
			),
			array(
				'element'  => '.navbar-nav > .menu-item > a .pk-badge:after',
				'property' => 'border-color',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'color',
		'settings' => 'color_navbar_submenu',
		'label'    => esc_html__( 'Navigation Submenu Background', 'squaretype' ),
		'section'  => 'design',
		'default'  => '#000000',
		'priority' => 10,
		'output'   => array(
			array(
				'element'  => '.navbar-nav .menu-item:not(.cs-mega-menu) .sub-menu, .navbar-nav .cs-mega-menu-has-categories .cs-mm-categories, .navbar-primary .navbar-dropdown-container',
				'property' => 'background-color',
			),
			array(
				'element'  => '.navbar-nav > li.menu-item-has-children > .sub-menu:after, .navbar-primary .navbar-dropdown-container:after',
				'property' => 'border-bottom-color',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'              => 'dimension',
		'settings'          => 'design_border_radius',
		'label'             => esc_html__( 'Common Border Radius', 'squaretype' ),
		'description'       => esc_html__( 'For example: 30px. If the input is empty, original value will be used.', 'squaretype' ),
		'section'           => 'design',
		'default'           => '0',
		'priority'          => 10,
		'sanitize_callback' => 'esc_html',
		'output'            => apply_filters( 'csco_design_border_radius', array(
			array(
				'element'  => 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-button:not(.is-style-squared) .wp-block-button__link, .button, .pk-button, .pk-scroll-to-top, .cs-overlay .post-categories a, .site-search [type="search"], .subcategories .cs-nav-link, .post-header .pk-share-buttons-wrap .pk-share-buttons-link, .pk-dropcap-borders:first-letter, .pk-dropcap-bg-inverse:first-letter, .pk-dropcap-bg-light:first-letter, .widget-area .pk-subscribe-with-name input[type="text"], .widget-area .pk-subscribe-with-name button, .widget-area .pk-subscribe-with-bg input[type="text"], .widget-area .pk-subscribe-with-bg button, .footer-instagram .instagram-username, .adp-popup-type-notification-box .adp-popup-button, .adp-popup-type-notification-bar .adp-popup-button',
				'property' => 'border-radius',
			),
			array(
				'element'     => '.pk-subscribe-with-name input[type="text"], .pk-subscribe-with-bg input[type="text"]',
				'property'    => 'border-radius',
				'media_query' => '@media (max-width: 599px)',
			),
			array(
				'element'  => '.cs-input-group input[type="search"], .pk-subscribe-form-wrap input[type="text"]:first-child',
				'property' => 'border-top-left-radius',
			),
			array(
				'element'  => '.cs-input-group input[type="search"], .pk-subscribe-form-wrap input[type="text"]:first-child',
				'property' => 'border-bottom-left-radius',
			),
		) ),
	)
);


CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'              => 'dimension',
		'settings'          => 'design_submenu_border_radius',
		'label'             => esc_html__( 'Submenu Border Radius', 'squaretype' ),
		'description'       => esc_html__( 'For example: 30px. If the input is empty, original value will be used.', 'squaretype' ),
		'section'           => 'design',
		'default'           => '0',
		'priority'          => 10,
		'sanitize_callback' => 'esc_html',
		'output'            => apply_filters( 'csco_design_submenu_border_radius', array(
			array(
				'element'  => '.navbar-nav .sub-menu',
				'property' => 'border-radius',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'              => 'dimension',
		'settings'          => 'design_preview_border_radius',
		'label'             => esc_html__( 'Preview Image Border Radius', 'squaretype' ),
		'description'       => esc_html__( 'For example: 30px. If the input is empty, original value will be used.', 'squaretype' ),
		'section'           => 'design',
		'default'           => '0',
		'priority'          => 10,
		'sanitize_callback' => 'esc_html',
		'output'            => apply_filters( 'csco_design_preview_border_radius', array(
			array(
				'element'  => '.post-media figure, .entry-thumbnail, .cs-post-thumbnail, .pk-overlay-thumbnail, .pk-post-thumbnail, .cs-hero-layout-boxed',
				'property' => 'border-radius',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'              => 'dimension',
		'settings'          => 'design_category_border_radius',
		'label'             => esc_html__( 'Category Label Border Radius', 'squaretype' ),
		'description'       => esc_html__( 'For example: 30px. If the input is empty, original value will be used.', 'squaretype' ),
		'section'           => 'design',
		'default'           => '0',
		'priority'          => 10,
		'sanitize_callback' => 'esc_html',
		'output'            => apply_filters( 'csco_design_category_border_radius', array(
			array(
				'element'  => '.meta-category .char',
				'property' => 'border-radius',
			),
		) ),
	)
);

<?php
/**
 * Typography
 *
 * @package Squaretype
 */

CSCO_Kirki::add_panel(
	'typography', array(
		'title'    => esc_html__( 'Typography', 'squaretype' ),
		'priority' => 30,
	)
);

CSCO_Kirki::add_section(
	'typography_general', array(
		'title'    => esc_html__( 'General', 'squaretype' ),
		'panel'    => 'typography',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'typography',
		'settings' => 'font_base',
		'label'    => esc_html__( 'Base Font', 'squaretype' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'Open Sans',
			'variant'        => 'regular',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1rem',
			'letter-spacing' => '0',
		),
		'choices'  => apply_filters( 'powerkit_fonts_choices', array(
			'variant' => array(
				'regular',
				'italic',
				'500',
				'600',
				'700',
				'700italic',
			),
		) ),
		'priority' => 10,
		'output'   => apply_filters( 'csco_font_base', array(
			array(
				'element' => 'body',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'typography',
		'settings'    => 'font_primary',
		'label'       => esc_html__( 'Primary Font', 'squaretype' ),
		'description' => esc_html__( 'Used for buttons, categories and tags, post meta links and other actionable elements.', 'squaretype' ),
		'section'     => 'typography_general',
		'default'     => array(
			'font-family'    => 'hg-grotesk',
			'variant'        => '600',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.875rem',
			'letter-spacing' => '0.025em',
			'text-transform' => 'uppercase',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array(
			'variant' => array(
				'regular',
				'500',
				'600',
				'700',
			),
		) ),
		'priority'    => 10,
		'output'      => apply_filters( 'csco_font_primary', array(
			array(
				'element' => '.cs-font-primary, button, .button, input[type="button"], input[type="reset"], input[type="submit"], .no-comments, .text-action, .archive-wrap .more-link, .share-total, .nav-links, .comment-reply-link, .post-tags .title-tags, .post-sidebar-tags a, .meta-category a, .read-more, .post-prev-next .link-text, .navigation.pagination .nav-links > span, .navigation.pagination .nav-links > a, .subcategories .cs-nav-link, .widget_categories ul li a, .entry-meta-details .pk-share-buttons-count, .entry-meta-details .pk-share-buttons-label, .pk-font-primary, .navbar-dropdown-btn-follow, .footer-instagram .instagram-username, .navbar-follow-instagram .navbar-follow-text, .navbar-follow-youtube .navbar-follow-text, .navbar-follow-facebook .navbar-follow-text, .pk-twitter-counters .number, .pk-instagram-counters .number, .navbar-follow .navbar-follow-counters .number, .footer-instagram .pk-instagram-username',
			),
			array(
				'element' => '.wp-block-button .wp-block-button__link, .abr-review-item .abr-review-name',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'typography',
		'settings'    => 'font_secondary',
		'label'       => esc_html__( 'Secondary Font', 'squaretype' ),
		'description' => esc_html__( 'Used for post meta, image captions and other secondary elements.', 'squaretype' ),
		'section'     => 'typography_general',
		'default'     => array(
			'font-family'    => 'hg-grotesk',
			'subsets'        => array( 'latin' ),
			'variant'        => '500',
			'font-size'      => '0.875rem',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array(
			'variant' => array(
				'regular',
				'500',
				'600',
				'700',
			),
		) ),
		'priority'    => 10,
		'output'      => apply_filters( 'csco_font_secondary', array(
			array(
				'element' => 'input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], select, textarea, label, .cs-font-secondary, .post-meta, .archive-count, .page-subtitle, .site-description, figcaption, .post-tags a, .tagcloud a, .wp-block-image figcaption, .wp-block-audio figcaption, .wp-block-embed figcaption, .wp-block-pullquote cite, .wp-block-pullquote footer, .wp-block-pullquote .wp-block-pullquote__citation, .post-format-icon, .comment-metadata, .says, .logged-in-as, .must-log-in, .wp-caption-text, .widget_rss ul li .rss-date, blockquote cite, .wp-block-quote cite, div[class*="meta-"], span[class*="meta-"], .navbar-brand .tagline, small, .post-sidebar-shares .total-shares, .cs-breadcrumbs, .cs-homepage-category-count, .navbar-follow-counters, .searchwp-live-search-no-results em, .searchwp-live-search-no-min-chars:after, .pk-font-secondary, .pk-instagram-counters, .pk-twitter-counters, .footer-copyright, .pk-instagram-item .pk-instagram-data .pk-meta, .navbar-follow-button .navbar-follow-text, .archive-timeline .entry-date, .archive-wrap .archive-timeline .entry-date span, .cs-video-tools-large .cs-tooltip, .abr-badge-primary',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'typography',
		'settings' => 'font_first_letter',
		'label'    => esc_html__( 'Category Label', 'squaretype' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'hg-grotesk',
			'subsets'        => array( 'latin' ),
			'variant'        => '600',
			'text-transform' => 'uppercase',
		),
		'choices'  => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority' => 10,
		'output'   => apply_filters( 'csco_font_first_letter', array(
			array(
				'element' => '.meta-category a .char',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'typography',
		'settings' => 'font_entry_excerpt',
		'label'    => esc_html__( 'Entry Excerpt', 'squaretype' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-size'   => '0.875rem',
			'line-height' => '1.5',
		),
		'choices'  => apply_filters( 'powerkit_fonts_choices', array(
			'variant' => array(
				'regular',
				'italic',
				'500',
				'600',
				'700',
				'700italic',
			),
		) ),
		'priority' => 10,
		'output'   => apply_filters( 'csco_font_entry_excerpt', array(
			array(
				'element' => '.entry-excerpt',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'typography',
		'settings' => 'font_post_content',
		'label'    => esc_html__( 'Post Content', 'squaretype' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'inherit',
			'variant'        => 'inherit',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1.125rem',
			'letter-spacing' => 'inherit',
		),
		'choices'  => apply_filters( 'powerkit_fonts_choices', array(
			'variant' => array(
				'regular',
				'italic',
				'500',
				'600',
				'700',
				'700italic',
			),
		) ),
		'priority' => 10,
		'output'   => apply_filters( 'csco_font_post_content', array(
			array(
				'element' => '.entry-content',
			),
		) ),
	)
);

CSCO_Kirki::add_section(
	'typography_logos', array(
		'title'    => esc_html__( 'Logos', 'squaretype' ),
		'panel'    => 'typography',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'typography',
		'settings'    => 'font_main_logo',
		'label'       => esc_html__( 'Main Logo', 'squaretype' ),
		'description' => esc_html__( 'The main logo is used in the navigation bar and mobile view of your website.', 'squaretype' ),
		'section'     => 'typography_logos',
		'default'     => array(
			'font-family'    => 'hg-grotesk',
			'font-size'      => '1.875rem',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'    => 10,
		'output'      => apply_filters( 'csco_font_logo', array(
			array(
				'element' => '.site-title',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'typography',
		'settings'        => 'font_large_logo',
		'label'           => esc_html__( 'Large Logo', 'squaretype' ),
		'section'         => 'typography_logos',
		'default'         => array(
			'font-family'    => 'hg-grotesk',
			'font-size'      => '1.875rem',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'description'     => esc_html__( 'The large logo is used in the site header in desktop view.', 'squaretype' ),
		'choices'         => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'large',
			),
		),
		'output'          => apply_filters( 'csco_font_large_logo', array(
			array(
				'element' => '.large-title',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'typography',
		'settings'    => 'font_footer_logo',
		'label'       => esc_html__( 'Footer Logo', 'squaretype' ),
		'description' => esc_html__( 'The footer logo is used in the site footer in desktop and mobile view.', 'squaretype' ),
		'section'     => 'typography_logos',
		'default'     => array(
			'font-family'    => 'hg-grotesk',
			'font-size'      => '1.875rem',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'    => 10,
		'output'      => apply_filters( 'csco_font_footer_logo', array(
			array(
				'element' => '.footer-title',
			),
		) ),
	)
);

CSCO_Kirki::add_section(
	'typography_headings', array(
		'title'    => esc_html__( 'Headings', 'squaretype' ),
		'panel'    => 'typography',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'typography',
		'settings' => 'font_headings',
		'label'    => esc_html__( 'Headings', 'squaretype' ),
		'section'  => 'typography_headings',
		'default'  => array(
			'font-family'    => 'hg-grotesk',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'letter-spacing' => '-0.025em',
			'text-transform' => 'none',
		),
		'choices'  => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority' => 10,
		'output'   => apply_filters( 'csco_font_headings', array(
			array(
				'element' => 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .comment-author .fn, blockquote, .pk-font-heading, .post-sidebar-date .reader-text, .wp-block-quote, .wp-block-cover .wp-block-cover-image-text, .wp-block-cover .wp-block-cover-text, .wp-block-cover h2, .wp-block-cover-image .wp-block-cover-image-text, .wp-block-cover-image .wp-block-cover-text, .wp-block-cover-image h2, .wp-block-pullquote p, p.has-drop-cap:not(:focus):first-letter, .pk-font-heading, .cnvs-block-tabs .cnvs-block-tabs-button a',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'typography',
		'settings'    => 'font_title_block',
		'label'       => esc_html__( 'Section Titles', 'squaretype' ),
		'description' => esc_html__( 'Used for widget, related posts and other sections\' titles.', 'squaretype' ),
		'section'     => 'typography_headings',
		'default'     => array(
			'font-family'    => 'hg-grotesk',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.75rem',
			'letter-spacing' => '0.025em',
			'text-transform' => 'uppercase',
			'color'          => '#000000',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'    => 10,
		'output'      => apply_filters( 'csco_font_title_block', array(
			array(
				'element' => '.title-block, .pk-font-block, .pk-widget-contributors .pk-author-posts > h6, .cnvs-block-section-heading',
			),
		) ),
	)
);

CSCO_Kirki::add_section(
	'typography_navigation', array(
		'title'    => esc_html__( 'Navigation', 'squaretype' ),
		'panel'    => 'typography',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'typography',
		'settings'    => 'font_menu',
		'label'       => esc_html__( 'Menu Font', 'squaretype' ),
		'description' => esc_html__( 'Used for main top level menu elements.', 'squaretype' ),
		'section'     => 'typography_navigation',
		'default'     => array(
			'font-family'    => 'hg-grotesk',
			'variant'        => '600',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.875rem',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'    => 10,
		'output'      => apply_filters( 'csco_font_menu', array(
			array(
				'element' => '.navbar-nav > li > a, .cs-mega-menu-child > a, .widget_archive li, .widget_categories li, .widget_meta li a, .widget_nav_menu .menu > li > a, .widget_pages .page_item a',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'typography',
		'settings'    => 'font_submenu',
		'label'       => esc_html__( 'Submenu Font', 'squaretype' ),
		'description' => esc_html__( 'Used for submenu elements.', 'squaretype' ),
		'section'     => 'typography_navigation',
		'default'     => array(
			'font-family'    => 'hg-grotesk',
			'subsets'        => array( 'latin' ),
			'variant'        => '600',
			'font-size'      => '0.875rem',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'    => 10,
		'output'      => apply_filters( 'csco_font_submenu', array(
			array(
				'element' => '.navbar-nav .sub-menu > li > a, .widget_categories .children li a, .widget_nav_menu .sub-menu > li > a',
			),
		) ),
	)
);

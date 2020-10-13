<?php
/**
 * Theme Demos
 *
 * @package Squaretype
 */

/**
 * Theme Demos
 */
function csco_theme_demos() {
	$demos = array(
		// Theme mods imported with every demo.
		'common_mods' => array(),
		// Specific demos.
		'demos'       => array(
			'squaretype' => array(
				'name'              => 'Squaretype',
				'preview_image_url' => '/images/theme-demos/logo-squaretype.png',
				'preset'            => 'squaretype',
				'mods'              => array(
					'archive_heading_size' => 'small',
					'archive_layout' => 'grid',
					'category_subcategories' => true,
					'color_navbar_submenu' => '#ffffff',
					'color_overlay' => 'rgba(10,10,10,0.33)',
					'color_primary' => '#2e073b',
					'column_hero' => true,
					'column_hero_color' => 'rgba(255,255,255,0.86)',
					'column_hero_content' => 'numbered-list',
					'font_base' =>
					array(
						'font-family' => 'Lato',
						'variant' => 'regular',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_headings' =>
					array(
						'font-family' => 'hg-grotesk',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '-0.025em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_entry_excerpt' =>
					array(
						'font-size'   => '1rem',
						'line-height' => '1.5',
					),
					'font_post_content' =>
					array(
						'font-family' => 'inherit',
						'variant' => '',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => 'inherit',
						'font-backup' => '',
						'font-weight' => 0,
						'font-style' => '',
					),
					'footer_instagram_username' => 'codesupplyco_demo',
					'footer_social_links_scheme' => 'light',
					'footer_subscribe_name' => true,
					'general_hero_bg_type' => 'image',
					'general_hero_color' => '#f8f8f8',
					'general_hero_end_color' => '#e4b28e',
					'general_hero_exclude' => true,
					'general_hero_image_overlay' => 'rgba(0,0,0,0.13)',
					'general_hero_layout' => 'boxed',
					'general_hero_more_button' => true,
					'general_hero_preview_image' => false,
					'general_hero_start_color' => '#c0909c',
					'header_follow' => 'button',
					'header_follow_button_label' => 'Subscribe <i class="pk-icon pk-icon-mail"></i>',
					'header_follow_button_link' => '#',
					'header_height' => '100px',
					'header_layout' => 'large',
					'header_shadow_submenus' => true,
					'header_social_links_scheme' => 'light',
					'hero' => true,
					'home_heading_size' => 'small',
					'home_layout' => 'grid',
					'home_pagination_type' => 'load-more',
					'post_author_type' => 'default',
					'post_header_type' => 'standard',
					'post_meta' =>
					array(
						0 => 'category',
						1 => 'date',
						2 => 'author',
						3 => 'shares',
						4 => 'views',
					),
					'post_sidebar' => 'right',
					'post_subscribe_name' => true,
				),
			),
			'steez' => array(
				'name'              => 'Steez',
				'preview_image_url' => '/images/theme-demos/logo-steez.png',
				'preset'            => 'steez',
				'mods'              => array(
					'archive_heading_size' => 'small',
					'archive_media_preview' => 'cropped',
					'archive_pagination_type' => 'load-more',
					'category_subcategories' => true,
					'color_navbar_bg' => '#0a0a0a',
					'color_navbar_submenu' => '#262626',
					'color_overlay' => 'rgba(10,10,10,0.3)',
					'color_primary' => '#9A8F97',
					'column_hero' => true,
					'column_hero_color' => 'rgba(10,10,10,0.53)',
					'column_hero_content' => 'default-list',
					'column_hero_number' => '4',
					'font_base' =>
					array(
						'font-family' => 'Open Sans',
						'variant' => 'regular',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_first_letter' =>
					array(
						'font-family' => 'hg-grotesk',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => '600',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 600,
						'font-style' => 'normal',
					),
					'font_footer_logo' =>
					array(
						'font-family' => 'hg-grotesk',
						'font-size' => '1.875rem',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '0.075em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_headings' =>
					array(
						'font-family' => 'hg-grotesk',
						'variant' => '500',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '-0.025em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_main_logo' =>
					array(
						'font-family' => 'hg-grotesk',
						'font-size' => '1.5rem',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '0.075em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_menu' =>
					array(
						'font-family' => 'hg-grotesk',
						'variant' => '600',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0px',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 600,
						'font-style' => 'normal',
					),
					'font_entry_excerpt' =>
					array(
						'font-size'   => '0.875rem',
						'line-height' => '1.5',
					),
					'font_post_content' =>
					array(
						'font-family' => 'inherit',
						'variant' => '',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => 'inherit',
						'font-backup' => '',
						'font-weight' => 0,
						'font-style' => '',
					),
					'font_primary' =>
					array(
						'font-family' => 'hg-grotesk',
						'variant' => '600',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0.075em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 600,
						'font-style' => 'normal',
					),
					'font_secondary' =>
					array(
						'font-family' => 'hg-grotesk',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => '500',
						'font-size' => '0.625rem',
						'letter-spacing' => '0px',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_submenu' =>
					array(
						'font-family' => 'hg-grotesk',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => '600',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 600,
						'font-style' => 'normal',
					),
					'font_title_block' =>
					array(
						'font-family' => 'hg-grotesk',
						'variant' => '600',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0.075em',
						'text-transform' => 'uppercase',
						'color' => '#b2a7a7',
						'font-backup' => '',
						'font-weight' => 600,
						'font-style' => 'normal',
					),
					'footer_instagram_username' => 'codesupplyco_demo',
					'footer_subscribe_name' => true,
					'footer_subscribe_title' => 'Subscribe to Our Updates',
					'footer_subscribe_title_font' =>
					array(
						'font-family' => 'hg-grotesk',
						'variant' => '600',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '3.75rem',
						'letter-spacing' => '-0.025em',
						'line-height' => '1',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 600,
						'font-style' => 'normal',
					),
					'general_hero_bg_type' => 'image',
					'general_hero_color' => '#353535',
					'general_hero_end_color' => '#483641',
					'general_hero_exclude' => true,
					'general_hero_layout' => 'fullwidth',
					'general_hero_more_button' => true,
					'general_hero_preview_image' => false,
					'general_hero_start_color' => '#353535',
					'header_follow' => 'button',
					'header_follow_button_label' => 'Subscribe <i class="pk-icon pk-icon-mail"></i>',
					'header_follow_button_link' => '#',
					'header_layout' => 'compact',
					'header_social_links_scheme' => 'light',
					'header_width' => 'fullwidth',
					'hero' => true,
					'home_heading_size' => 'small',
					'home_layout' => 'list',
					'home_pagination_type' => 'load-more',
					'post_author_type' => 'compact',
					'post_comments_simple' => true,
					'post_header_type' => 'large',
					'post_subscribe_name' => true,
				),
			),
			'wire' => array(
				'name'              => 'W〜re',
				'preview_image_url' => '/images/theme-demos/logo-wire.png',
				'preset'            => 'wire',
				'mods'              => array(
					'archive_borders_enabled' => true,
					'archive_heading_size' => 'small',
					'archive_more_button' => false,
					'archive_pagination_type' => 'standard',
					'archive_post_meta' =>
					array(
						0 => 'category',
						1 => 'author',
						2 => 'date',
						3 => 'views',
					),
					'category_subcategories' => true,
					'color_navbar_submenu' => '#ffffff',
					'color_overlay' => 'rgba(10,10,10,0.3)',
					'color_primary' => '#61CC4A',
					'column_hero' => true,
					'column_hero_color' => 'rgba(0,0,0,0.75)',
					'column_hero_content' => 'numbered-list',
					'column_hero_number' => '4',
					'column_hero_preview_image' => false,
					'font_base' =>
					array(
						'font-family' => 'Open Sans',
						'variant' => 'regular',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_entry_excerpt' =>
					array(
						'font-size'   => '0.875rem',
						'line-height' => '1.5',
					),
					'font_post_content' =>
					array(
						'font-family' => 'inherit',
						'variant' => '',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => 'inherit',
						'font-backup' => '',
						'font-weight' => 0,
						'font-style' => '',
					),
					'footer_instagram_username' => 'codesupplyco_demo',
					'footer_subscribe_name' => true,
					'footer_subscribe_title' => 'Get Latest Wire Updates',
					'general_hero_bg_type' => 'image',
					'general_hero_color' => '#36ae61',
					'general_hero_end_color' => '#7cce63',
					'general_hero_exclude' => true,
					'general_hero_heading_size' => 'small',
					'general_hero_image_overlay' => 'rgba(0,0,0,0.43)',
					'general_hero_layout' => 'boxed',
					'general_hero_more_button' => true,
					'general_hero_preview_image' => false,
					'general_hero_start_color' => '#0ba360',
					'header_alignment' => 'left',
					'header_follow' => 'button',
					'header_follow_button_label' => 'Subscribe <i class="pk-icon pk-icon-mail"></i>',
					'header_follow_button_link' => '#',
					'header_layout' => 'compact',
					'header_navigation_menu' => true,
					'header_offcanvas' => true,
					'header_search_button' => false,
					'header_shadow_submenus' => false,
					'header_social_links_counts' => false,
					'header_social_links_scheme' => 'light',
					'header_width' => 'boxed',
					'hero' => true,
					'home_borders_enabled' => true,
					'home_borders_scale_effect' => false,
					'home_borders_shadow_effect' => false,
					'home_heading_size' => 'small',
					'home_layout' => 'list',
					'home_more_button' => false,
					'home_pagination_type' => 'standard',
					'home_preview_image' => true,
					'home_sidebar' => 'right',
					'navbar_sticky' => false,
					'post_media_preview' => 'cropped',
					'post_prev_next' => false,
					'post_subscribe_name' => true,
					'related_layout' => 'grid',
				),
				'mods_typekit'      => array(
					'font_first_letter' =>
					array(
						'font-family' => 'aktiv-grotesk',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => '700',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_footer_logo' =>
					array(
						'font-family' => 'aktiv-grotesk',
						'font-size' => '1.875rem',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '0.125em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_headings' =>
					array(
						'font-family' => 'aktiv-grotesk',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_main_logo' =>
					array(
						'font-family' => 'aktiv-grotesk',
						'font-size' => '1.5rem',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '0.125em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_menu' =>
					array(
						'font-family' => 'aktiv-grotesk',
						'variant' => '500',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_primary' =>
					array(
						'font-family' => 'aktiv-grotesk',
						'variant' => '500',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '0.025em',
						'text-transform' => 'capitalize',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_secondary' =>
					array(
						'font-family' => 'aktiv-grotesk',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.75rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_submenu' =>
					array(
						'font-family' => 'aktiv-grotesk',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_title_block' =>
					array(
						'font-family' => 'aktiv-grotesk',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0.025em',
						'text-transform' => 'uppercase',
						'color' => '#b5b5b5',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'footer_subscribe_title_font' =>
					array(
						'font-family' => 'aktiv-grotesk',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '3.75rem',
						'letter-spacing' => '-0.025em',
						'line-height' => '1',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
				),
			),
			'papercut' => array(
				'name'              => 'Papercut',
				'preview_image_url' => '/images/theme-demos/logo-papercut.png',
				'preset'            => 'papercut',
				'mods'              => array(
					'archive_borders_enabled' => false,
					'archive_layout' => 'grid',
					'archive_more_button' => false,
					'archive_sidebar' => 'disabled',
					'category_subcategories' => true,
					'color_navbar_submenu' => '#ffffff',
					'color_overlay' => 'rgba(76,76,76,0.43)',
					'color_primary' => '#ff4133',
					'column_hero' => false,
					'column_hero_color' => 'rgba(10,10,10,0.05)',
					'column_hero_content' => 'numbered-list',
					'column_hero_font_color' => 'auto',
					'column_hero_number' => '3',
					'design_border_radius' => '5px',
					'design_category_border_radius' => '2px',
					'design_preview_border_radius' => '5px',
					'design_submenu_border_radius' => '2px',
					'font_base' =>
					array(
						'font-family' => 'Open Sans',
						'variant' => 'regular',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_first_letter' =>
					array(
						'font-family' => 'Suez One',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_headings' =>
					array(
						'font-family' => 'Alegreya Sans',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_menu' =>
					array(
						'font-family' => 'Alegreya Sans',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_entry_excerpt' =>
					array(
						'font-size'   => '0.875rem',
						'line-height' => '1.5',
					),
					'font_post_content' =>
					array(
						'font-family' => 'inherit',
						'variant' => '',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => 'inherit',
						'font-backup' => '',
						'font-weight' => 0,
						'font-style' => '',
					),
					'font_primary' =>
					array(
						'font-family' => 'Open Sans',
						'variant' => '600',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0px',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 600,
						'font-style' => 'normal',
					),
					'font_secondary' =>
					array(
						'font-family' => 'Alegreya Sans',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_submenu' =>
					array(
						'font-family' => 'Alegreya Sans',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_title_block' =>
					array(
						'font-family' => 'Alegreya Sans',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0.025em',
						'text-transform' => 'uppercase',
						'color' => '#000000',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'footer_instagram_username' => 'codesupplyco_demo',
					'footer_subscribe_name' => true,
					'footer_subscribe_title_font' =>
					array(
						'font-family' => 'Alegreya Sans',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '3.75rem',
						'letter-spacing' => '-0.025em',
						'line-height' => '1',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'general_hero_bg_type' => 'image',
					'general_hero_color' => '#f8f8f8',
					'general_hero_end_color' => 'rgba(255,209,97,0.7)',
					'general_hero_exclude' => true,
					'general_hero_font_color' => 'auto',
					'general_hero_heading_size' => 'large',
					'general_hero_image_overlay' => 'rgba(12,12,12,0.33)',
					'general_hero_layout' => 'boxed',
					'general_hero_preview_image' => false,
					'general_hero_start_color' => '#fc6076',
					'header_follow' => 'button',
					'header_follow_button_label' => 'Follow <i class="pk-icon pk-icon-instagram"></i>',
					'header_follow_button_link' => '#',
					'header_layout' => 'large',
					'header_shadow_submenus' => true,
					'header_social_links_scheme' => 'light',
					'header_width' => 'fullwidth',
					'hero' => true,
					'home_layout' => 'grid',
					'home_more_button' => false,
					'home_pagination_type' => 'load-more',
					'home_sidebar' => 'disabled',
					'post_comments_simple' => false,
					'post_header_type' => 'large',
					'post_load_nextpost' => false,
					'post_sidebar' => 'disabled',
					'post_subscribe_name' => false,
					'post_tags' => true,
					'related' => true,
				),
			),
			'wanderlust' => array(
				'name'              => 'Wanderlust',
				'preview_image_url' => '/images/theme-demos/logo-wanderlust.png',
				'preset'            => 'wanderlust',
				'mods'              => array(
					'archive_borders_enabled' => true,
					'archive_layout' => 'masonry',
					'archive_sidebar' => 'disabled',
					'category_subcategories' => true,
					'color_navbar_submenu' => '#f2f2f1',
					'color_overlay' => 'rgba(10,10,10,0.3)',
					'color_primary' => '#ddbd97',
					'column_hero' => false,
					'column_hero_color' => 'rgba(54,53,47,0.43)',
					'column_hero_content' => 'numbered-list',
					'column_hero_font_color' => 'light',
					'design_border_radius' => '30px',
					'design_category_border_radius' => '50%',
					'font_base' =>
					array(
						'font-family' => 'Open Sans',
						'variant' => 'regular',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_first_letter' =>
					array(
						'font-family' => 'Caveat',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_headings' =>
					array(
						'font-family' => 'Josefin Sans',
						'variant' => 'regular',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '-0.05em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_menu' =>
					array(
						'font-family' => 'Overpass',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0px',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_entry_excerpt' =>
					array(
						'font-size'   => '0.875rem',
						'line-height' => '1.5',
					),
					'font_post_content' =>
					array(
						'font-family' => 'inherit',
						'variant' => '',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => 'inherit',
						'font-backup' => '',
						'font-weight' => 0,
						'font-style' => '',
					),
					'font_primary' =>
					array(
						'font-family' => 'Overpass',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.625rem',
						'letter-spacing' => '0.125em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_secondary' =>
					array(
						'font-family' => 'Overpass',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.75rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_submenu' =>
					array(
						'font-family' => 'Overpass',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => '300',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 300,
						'font-style' => 'normal',
					),
					'font_title_block' =>
					array(
						'font-family' => 'Josefin Sans',
						'variant' => 'regular',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0.025em',
						'text-transform' => 'uppercase',
						'color' => '#000000',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'footer_instagram_username' => 'codesupplyco_demo',
					'footer_social_links_scheme' => 'light-rounded',
					'footer_subscribe_name' => true,
					'general_hero_bg_type' => 'image',
					'general_hero_color' => '#25384a',
					'general_hero_end_color' => '#8d8066',
					'general_hero_exclude' => true,
					'general_hero_font_color' => 'light',
					'general_hero_heading_size' => 'large',
					'general_hero_image_overlay' => 'rgba(54,53,47,0.43)',
					'general_hero_more_button' => true,
					'general_hero_start_color' => '#25384a',
					'header_alignment' => 'center',
					'header_follow' => 'button',
					'header_follow_button_label' => 'Subscribe <i class="pk-icon pk-icon-youtube"></i>',
					'header_follow_button_link' => '#',
					'header_height' => 'auto',
					'header_layout' => 'large',
					'header_navigation_menu' => true,
					'header_offcanvas' => false,
					'header_search_button' => false,
					'header_social_links_scheme' => 'light-rounded',
					'header_tagline' => false,
					'header_width' => 'boxed',
					'hero' => true,
					'home_borders_enabled' => true,
					'home_heading_size' => 'medium',
					'home_layout' => 'masonry',
					'home_more_button' => true,
					'home_pagination_type' => 'load-more',
					'home_sidebar' => 'disabled',
					'navbar_sticky' => false,
					'post_header_type' => 'large',
					'post_sidebar' => 'right',
					'post_subscribe_name' => true,
					'related_layout' => 'grid',
				),
			),
			'soda' => array(
				'name'              => 'Soda',
				'preview_image_url' => '/images/theme-demos/logo-soda.png',
				'preset'            => 'soda',
				'mods'              => array(
					'archive_layout' => 'full',
					'archive_pagination_type' => 'standard',
					'category_subcategories' => true,
					'color_navbar_submenu' => '#ffffff',
					'color_overlay' => 'rgba(10,10,10,0.3)',
					'color_primary' => '#c1d3b4',
					'column_hero' => true,
					'column_hero_color' => '#fbf4cf',
					'column_hero_content' => 'numbered-list',
					'column_hero_number' => '4',
					'design_category_border_radius' => '50%',
					'font_footer_logo' =>
					array(
						'font-family' => 'Poppins',
						'font-size' => '1.875rem',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '0px',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_main_logo' =>
					array(
						'font-family' => 'Poppins',
						'font-size' => '1.875rem',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '0px',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_entry_excerpt' =>
					array(
						'font-size'   => '0.875rem',
						'line-height' => '1.5',
					),
					'font_post_content' =>
					array(
						'font-family' => 'inherit',
						'variant' => '',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => 'inherit',
						'font-backup' => '',
						'font-weight' => 0,
						'font-style' => '',
					),
					'footer_instagram_username' => 'codesupplyco_demo',
					'footer_social_links_scheme' => 'bold',
					'footer_subscribe_name' => true,
					'footer_subscribe_title' => 'Sign Up to Get My Best Recipes',
					'general_hero_bg_type' => 'image',
					'general_hero_color' => '#ffc6a8',
					'general_hero_end_color' => '#ffd5b6',
					'general_hero_exclude' => true,
					'general_hero_font_color' => 'light',
					'general_hero_image_overlay' => 'rgba(0,0,0,0.42)',
					'general_hero_layout' => 'boxed',
					'general_hero_preview_image' => false,
					'general_hero_start_color' => '#ffb3a8',
					'header_alignment' => 'left',
					'header_follow' => 'button',
					'header_follow_button_label' => 'Subscribe <i class="pk-icon pk-icon-mail"></i>',
					'header_follow_button_link' => '#',
					'header_layout' => 'compact',
					'header_navigation_menu' => true,
					'header_search_button' => false,
					'header_social_links_scheme' => 'light',
					'hero' => true,
					'home_layout' => 'full',
					'home_more_button' => true,
					'home_pagination_type' => 'standard',
					'home_sidebar' => 'right',
					'home_summary' => 'excerpt',
					'post_prev_next' => false,
					'post_subscribe_name' => true,
				),
				'mods_typekit'      => array(
					'font_base' =>
					array(
						'font-family' => 'ivyjournal',
						'variant' => 'regular',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_first_letter' =>
					array(
						'font-family' => 'futura-pt',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_headings' =>
					array(
						'font-family' => 'futura-pt',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '-0.025em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_menu' =>
					array(
						'font-family' => 'futura-pt',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_primary' =>
					array(
						'font-family' => 'futura-pt',
						'variant' => 'regular',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '0.025em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_secondary' =>
					array(
						'font-family' => 'futura-pt',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_submenu' =>
					array(
						'font-family' => 'futura-pt',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_title_block' =>
					array(
						'font-family' => 'futura-pt',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0.025em',
						'text-transform' => 'uppercase',
						'color' => '#000000',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'footer_subscribe_title_font' =>
					array(
						'font-family' => 'futura-pt',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '3.75rem',
						'letter-spacing' => '-0.025em',
						'line-height' => '1',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
				),
			),
			'mannequin' => array(
				'name'              => 'Mannequin',
				'preview_image_url' => '/images/theme-demos/logo-mannequin.png',
				'preset'            => 'mannequin',
				'mods'              => array(
					'archive_borders_enabled' => false,
					'archive_layout' => 'masonry',
					'category_subcategories' => true,
					'color_navbar_submenu' => '#f5f3f6',
					'color_overlay' => 'rgba(10,10,10,0.3)',
					'color_primary' => '#d9b3bd',
					'column_hero' => true,
					'column_hero_color' => '#ffffff',
					'column_hero_content' => 'default-list',
					'font_base' =>
					array(
						'font-family' => 'Lato',
						'variant' => 'regular',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_first_letter' =>
					array(
						'font-family' => 'Playfair Display',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_headings' =>
					array(
						'font-family' => 'Playfair Display',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '-0.025em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_menu' =>
					array(
						'font-family' => 'Montserrat',
						'variant' => '600',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.6875rem',
						'letter-spacing' => '',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 600,
						'font-style' => 'normal',
					),
					'font_entry_excerpt' =>
					array(
						'font-size'   => '0.875rem',
						'line-height' => '1.5',
					),
					'font_post_content' =>
					array(
						'font-family' => 'inherit',
						'variant' => '',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => 'inherit',
						'font-backup' => '',
						'font-weight' => 0,
						'font-style' => '',
					),
					'font_primary' =>
					array(
						'font-family' => 'Montserrat',
						'variant' => '500',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.6875rem',
						'letter-spacing' => '0.125em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_secondary' =>
					array(
						'font-family' => 'Montserrat',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => '500',
						'font-size' => '0.625rem',
						'letter-spacing' => '0px',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_submenu' =>
					array(
						'font-family' => 'Montserrat',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.75rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_title_block' =>
					array(
						'font-family' => 'Montserrat',
						'variant' => '600',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0.075em',
						'text-transform' => 'uppercase',
						'color' => '#000000',
						'font-backup' => '',
						'font-weight' => 600,
						'font-style' => 'normal',
					),
					'footer_instagram_username' => 'codesupplyco_demo',
					'footer_social_links_scheme' => 'bold',
					'footer_subscribe_name' => true,
					'footer_subscribe_text' => 'Subscribe Now to Get All Latest Updates',
					'footer_subscribe_title' => 'Don\'t Miss Anything',
					'footer_subscribe_title_font' =>
					array(
						'font-family' => 'Playfair Display',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '3.75rem',
						'letter-spacing' => '-0.025em',
						'line-height' => '1',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'general_hero_bg_type' => 'image',
					'general_hero_color' => '#f5f3f6',
					'general_hero_end_color' => '#fbfcdb',
					'general_hero_exclude' => true,
					'general_hero_heading_size' => 'medium',
					'general_hero_image_overlay' => 'rgba(10,10,10,0.35)',
					'general_hero_layout' => 'fullwidth',
					'general_hero_more_button' => true,
					'general_hero_preview_image' => false,
					'general_hero_start_color' => '#e9defa',
					'header_alignment' => 'left',
					'header_follow' => 'button',
					'header_follow_button_label' => 'Follow Me <i class="pk-icon pk-icon-instagram"></i>',
					'header_follow_button_link' => '#',
					'header_layout' => 'compact',
					'header_navigation_menu' => true,
					'header_offcanvas' => true,
					'header_search_button' => false,
					'header_social_links_scheme' => 'light',
					'hero' => true,
					'home_borders_enabled' => false,
					'home_heading_size' => 'medium',
					'home_layout' => 'masonry',
					'home_pagination_type' => 'load-more',
					'home_post_meta' =>
					array(
						0 => 'category',
						1 => 'author',
						2 => 'date',
						3 => 'shares',
					),
					'home_preview_image' => true,
					'post_header_type' => 'large',
					'post_media_preview' => 'uncropped',
					'post_sidebar' => 'disabled',
					'post_subscribe_name' => true,
				),
			),
			'extraordinary' => array(
				'name'              => 'Extraordinary',
				'preview_image_url' => '/images/theme-demos/logo-extraordinary.png',
				'preset'            => 'extraordinary',
				'mods'              => array(
					'archive_layout' => 'timeline',
					'archive_sidebar' => 'disabled',
					'category_subcategories' => true,
					'color_navbar_submenu' => '#ffffff',
					'color_overlay' => 'rgba(10,10,10,0.3)',
					'color_primary' => '#3A353F',
					'column_hero' => true,
					'column_hero_color' => 'rgba(255,255,255,0.86)',
					'column_hero_content' => 'default-list',
					'column_hero_preview_image' => false,
					'column_hero_custom_content' => '[powerkit_subscription_form title="Get Notified of Our Updates" text="Subscribe today and receive daily promotions. No spam."]',
					'column_hero_number' => '4',
					'font_base' =>
					array(
						'font-family' => 'Gothic A1',
						'variant' => 'regular',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_first_letter' =>
					array(
						'font-family' => 'Karla',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_headings' =>
					array(
						'font-family' => 'Karla',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '-0.05em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_menu' =>
					array(
						'font-family' => 'Karla',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_entry_excerpt' =>
					array(
						'font-size'   => '0.875rem',
						'line-height' => '1.5',
					),
					'font_post_content' =>
					array(
						'font-family' => 'inherit',
						'variant' => '',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => 'inherit',
						'font-backup' => '',
						'font-weight' => 0,
						'font-style' => '',
					),
					'font_primary' =>
					array(
						'font-family' => 'Karla',
						'variant' => 'regular',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '0.025em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_secondary' =>
					array(
						'font-family' => 'Karla',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_submenu' =>
					array(
						'font-family' => 'Karla',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_title_block' =>
					array(
						'font-family' => 'Karla',
						'variant' => '700',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0.025em',
						'text-transform' => 'uppercase',
						'color' => '#000000',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'footer_instagram_username' => 'codesupplyco_demo',
					'footer_subscribe_name' => true,
					'footer_subscribe_title_font' =>
					array(
						'font-family' => 'Gothic A1',
						'variant' => '800',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '3.75rem',
						'letter-spacing' => '-0.025em',
						'line-height' => '1',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 800,
						'font-style' => 'normal',
					),
					'general_hero_bg_type' => 'color',
					'general_hero_color' => '#eeedeb',
					'general_hero_end_color' => '#82889b',
					'general_hero_exclude' => true,
					'general_hero_heading_size' => 'medium',
					'general_hero_layout' => 'fullwidth',
					'general_hero_more_button' => true,
					'general_hero_preview_image' => true,
					'general_hero_start_color' => '#505668',
					'header_follow' => 'button',
					'header_follow_button_label' => 'Follow <i class="pk-icon pk-icon-instagram"></i>',
					'header_follow_button_link' => '#',
					'header_height' => 'auto',
					'header_social_links_scheme' => 'light',
					'hero' => true,
					'home_heading_size' => 'small',
					'home_layout' => 'timeline',
					'home_more_button' => true,
					'home_pagination_type' => 'standard',
					'home_preview_image' => false,
					'home_sidebar' => 'right',
					'home_heading_size' => 'medium',
					'archive_heading_size' => 'medium',
					'post_author_type' => 'compact',
					'post_header_type' => 'standard',
					'post_sidebar' => 'disabled',
					'post_subscribe_name' => true,
				),
			),
			'aesthetics' => array(
				'name'              => 'Aesthetics',
				'preview_image_url' => '/images/theme-demos/logo-aesthetics.png',
				'preset'            => 'aesthetics',
				'mods'              => array(
					'archive_borders_enabled' => true,
					'archive_borders_scale_effect' => true,
					'archive_heading_size' => 'small',
					'archive_layout' => 'grid',
					'archive_pagination_type' => 'infinite',
					'archive_post_meta' =>
					array(
						0 => 'category',
						1 => 'date',
					),
					'archive_preview_image' => false,
					'archive_sidebar' => 'disabled',
					'category_subcategories' => true,
					'color_navbar_submenu' => '#f8f8f8',
					'color_overlay' => 'rgba(10,10,10,0.3)',
					'color_primary' => '#A2ACBD',
					'column_hero' => true,
					'column_hero_color' => 'rgba(255,255,255,0.9)',
					'column_hero_content' => 'numbered-list',
					'column_hero_font_color' => 'auto',
					'column_hero_meta' =>
					array(
						0 => 'date',
					),
					'column_hero_number' => '6',
					'column_hero_preview_image' => false,
					'column_hero_title' => '',
					'font_first_letter' =>
					array(
						'font-family' => 'hg-grotesk',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => '500',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_headings' =>
					array(
						'font-family' => 'hg-grotesk',
						'variant' => '500',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '-0.025em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_menu' =>
					array(
						'font-family' => 'hg-grotesk',
						'variant' => '500',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_entry_excerpt' =>
					array(
						'font-size'   => '0.875rem',
						'line-height' => '1.5',
					),
					'font_post_content' =>
					array(
						'font-family' => 'inherit',
						'variant' => '',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => 'inherit',
						'font-backup' => '',
						'font-weight' => 0,
						'font-style' => '',
					),
					'font_primary' =>
					array(
						'font-family' => 'hg-grotesk',
						'variant' => '600',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0.125em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 600,
						'font-style' => 'normal',
					),
					'font_secondary' =>
					array(
						'font-family' => 'hg-grotesk',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => '500',
						'font-size' => '0.75rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_submenu' =>
					array(
						'font-family' => 'hg-grotesk',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'variant' => '500',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_title_block' =>
					array(
						'font-family' => 'hg-grotesk',
						'variant' => '500',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0.025em',
						'text-transform' => 'uppercase',
						'color' => '#000000',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'footer_instagram_username' => 'codesupplyco_demo',
					'footer_subscribe_name' => true,
					'footer_subscribe_title' => 'Subscribe to Our Newsletter',
					'footer_subscribe_title_font' =>
					array(
						'font-family' => 'hg-grotesk',
						'variant' => '500',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1.875rem',
						'letter-spacing' => '-0.025em',
						'line-height' => '1',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'general_hero_bg_type' => 'image',
					'general_hero_color' => '#4d4d4d',
					'general_hero_end_color' => '#eef2f3',
					'general_hero_exclude' => true,
					'general_hero_font_color' => 'light',
					'general_hero_heading_size' => 'small',
					'general_hero_image_overlay' => 'rgba(0,0,0,0.23)',
					'general_hero_layout' => 'boxed',
					'general_hero_meta' =>
					array(
						0 => 'category',
						1 => 'author',
						2 => 'date',
						3 => 'shares',
					),
					'general_hero_more_button' => false,
					'general_hero_preview_image' => false,
					'general_hero_start_color' => '#8e9eab',
					'header_alignment' => 'left',
					'header_follow' => 'button',
					'header_follow_button_label' => 'Subscribe <i class="pk-icon pk-icon-mail"></i>',
					'header_follow_button_link' => '#',
					'header_layout' => 'compact',
					'header_navigation_menu' => true,
					'header_search_button' => false,
					'header_social_links_scheme' => 'light',
					'hero' => true,
					'home_borders_enabled' => true,
					'home_borders_scale_effect' => true,
					'home_borders_shadow_effect' => true,
					'home_heading_size' => 'small',
					'home_layout' => 'grid',
					'home_pagination_type' => 'infinite',
					'home_post_meta' =>
					array(
						0 => 'category',
						1 => 'date',
					),
					'home_preview_image' => false,
					'home_sidebar' => 'disabled',
					'post_author_type' => 'compact',
					'post_header_type' => 'standard',
					'post_meta' =>
					array(
						0 => 'category',
						1 => 'date',
						2 => 'author',
						3 => 'shares',
					),
					'post_prev_next' => false,
					'post_sidebar' => 'disabled',
					'post_subscribe_name' => true,
					'related_layout' => 'list',
				),
				'mods_typekit'      => array(
					'font_base' =>
					array(
						'font-family' => 'nimbus-sans',
						'variant' => 'regular',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_footer_logo' =>
					array(
						'font-family' => 'nimbus-sans',
						'font-size' => '1.0625rem',
						'variant' => '500',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '3px',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_main_logo' =>
					array(
						'font-family' => 'nimbus-sans',
						'font-size' => '1.0625rem',
						'variant' => '500',
						'subsets' =>
						array(
							0 => 'latin',
						),
						'letter-spacing' => '3px',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
				),
			),
		),
	);
	return $demos;
}
add_filter( 'csco_theme_demos', 'csco_theme_demos' );

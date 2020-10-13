<?php
/**
 * Category Settings
 *
 * @package Squaretype
 */

CSCO_Kirki::add_section(
	'category_settings', array(
		'title'    => esc_html__( 'Category Settings', 'squaretype' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'category_subcategories',
		'label'    => esc_html__( 'Display subcategory filter', 'squaretype' ),
		'section'  => 'category_settings',
		'default'  => false,
		'priority' => 10,
	)
);

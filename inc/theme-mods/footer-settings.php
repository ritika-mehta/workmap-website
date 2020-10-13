<?php
/**
 * Footer Settings
 *
 * @package Squaretype
 */

CSCO_Kirki::add_section(
	'footer', array(
		'title'    => esc_html__( 'Footer Settings', 'squaretype' ),
		'priority' => 40,
	)
);


CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'custom',
		'settings' => 'footer_collapsible_general',
		'default'  => '<div class="customize-collapsible"><h3>' . esc_html__( 'General', 'squaretype' ) . '</h3></div>',
		'section'  => 'footer',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'              => 'textarea',
		'settings'          => 'footer_text',
		'label'             => esc_html__( 'Footer Text', 'squaretype' ),
		'section'           => 'footer',
		/* translators: %s: Author name. */
		'default'           => sprintf( esc_html__( 'Designed & Developed by %s', 'squaretype' ), '<a href="' . esc_url( csco_get_theme_data( 'AuthorURI' ) ) . '">Code Supply Co.</a>' ),
		'priority'          => 10,
		'sanitize_callback' => 'wp_kses_post',
	)
);

if ( csco_powerkit_module_enabled( 'instagram_integration' ) ) {
	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'     => 'text',
			'settings' => 'footer_instagram_username',
			'label'    => esc_html__( 'Instagram Username', 'squaretype' ),
			'section'  => 'footer',
			'default'  => '',
			'priority' => 10,
		)
	);
}

if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {
	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'     => 'custom',
			'settings' => 'footer_collapsible_subscription',
			'default'  => '<div class="customize-collapsible"><h3>' . esc_html__( 'Subscription Form', 'squaretype' ) . '</h3></div>',
			'section'  => 'footer',
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'     => 'checkbox',
			'settings' => 'footer_subscribe',
			'label'    => esc_html__( 'Display subscribe section', 'squaretype' ),
			'section'  => 'footer',
			'default'  => false,
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'checkbox',
			'settings'        => 'footer_subscribe_name',
			'label'           => esc_html__( 'Display first name field', 'squaretype' ),
			'section'         => 'footer',
			'default'         => false,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'footer_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'              => 'text',
			'settings'          => 'footer_subscribe_title',
			'label'             => esc_html__( 'Title', 'squaretype' ),
			'section'           => 'footer',
			'default'           => esc_html__( 'Subscribe to Our Newsletter', 'squaretype' ),
			'priority'          => 10,
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => array(
				array(
					'setting'  => 'footer_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'typography',
			'settings'        => 'footer_subscribe_title_font',
			'label'           => esc_html__( 'Font', 'squaretype' ),
			'section'         => 'footer',
			'default'         => array(
				'font-family'    => 'hg-grotesk',
				'variant'        => '700',
				'subsets'        => array( 'latin' ),
				'font-size'      => '3.75rem',
				'letter-spacing' => '-0.025em',
				'line-height'    => '1',
				'text-transform' => 'none',
			),
			'choices'         => apply_filters( 'powerkit_fonts_choices', array() ),
			'priority'        => 10,
			'output'          => array(
				array(
					'element' => '.footer-subscribe .pk-subscribe-form-wrap .pk-title',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'              => 'text',
			'settings'          => 'footer_subscribe_text',
			'label'             => esc_html__( 'Text', 'squaretype' ),
			'section'           => 'footer',
			'default'           => esc_html__( 'Get notified of the best deals on our WordPress themes.', 'squaretype' ),
			'priority'          => 10,
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => array(
				array(
					'setting'  => 'footer_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);
}

if ( csco_powerkit_module_enabled( 'social_links' ) ) {
	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'     => 'custom',
			'settings' => 'footer_collapsible_social',
			'default'  => '<div class="customize-collapsible"><h3>' . esc_html__( 'Social Links', 'squaretype' ) . '</h3></div>',
			'section'  => 'footer',
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'     => 'checkbox',
			'settings' => 'footer_social_links',
			'label'    => esc_html__( 'Display social links', 'squaretype' ),
			'section'  => 'footer',
			'default'  => false,
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'select',
			'settings'        => 'footer_social_links_scheme',
			'label'           => esc_html__( 'Color scheme', 'squaretype' ),
			'section'         => 'footer',
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
					'setting'  => 'footer_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'number',
			'settings'        => 'footer_social_links_maximum',
			'label'           => esc_html__( 'Maximum Number of Social Links', 'squaretype' ),
			'section'         => 'footer',
			'default'         => 4,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'footer_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'checkbox',
			'settings'        => 'footer_social_links_counts',
			'label'           => esc_html__( 'Display counts', 'squaretype' ),
			'section'         => 'footer',
			'default'         => true,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'footer_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);
}

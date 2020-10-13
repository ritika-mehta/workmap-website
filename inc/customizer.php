<?php
/**
 * Customizer Functions
 *
 * @package Squaretype
 */

/**
 * Kirki Init.
 */
require get_template_directory() . '/inc/classes/class-csco-kirki.php';

/**
 * Kirki Installer.
 */
require get_template_directory() . '/inc/classes/class-csco-kirki-installer.php';

/**
 * Theme Fonts.
 */
require get_template_directory() . '/inc/classes/class-csco-theme-fonts.php';

/**
 * Telemetry implementation for Kirki
 */
function csco_kirki_telemetry() {
	return false;
}
add_filter( 'kirki_telemetry', 'csco_kirki_telemetry' );

/**
 * Kirki Config
 *
 * @param array $config is an array of Kirki configuration parameters.
 */
function csco_kirki_config( $config ) {

	// Disable Kirki preloader styles.
	$config['disable_loader'] = true;

	return $config;

}
add_filter( 'kirki/config', 'csco_kirki_config' );

/**
 * Changes the font-loading method.
 *
 * @param string $method The font-loading method (async|link).
 */
function csco_change_fonts_load_method( $method ) {
	// Check for a theme-mod.
	// We don't want to force the use of the link method for googlefonts loading
	// since the async method is better in general.
	if ( 'link' === get_theme_mod( 'webfonts_load_method', 'async' ) ) {
		$method = 'auto';
	}
	return $method;
}
add_filter( 'kirki_googlefonts_font_display', 'csco_change_fonts_load_method' );
add_filter( 'powerkit_webfonts_load_method', 'csco_change_fonts_load_method' );

/**
 * Remove AMP link.
 */
function csco_admin_remove_amp_link() {
	remove_action( 'admin_menu', 'amp_add_customizer_link' );
}
add_action( 'after_setup_theme', 'csco_admin_remove_amp_link', 20 );

/**
 * Remove AMP panel.
 *
 * @param object $wp_customize Instance of the WP_Customize_Manager class.
 */
function csco_customizer_remove_amp_panel( $wp_customize ) {
	$wp_customize->remove_panel( 'amp_panel' );
}
add_action( 'customize_register', 'csco_customizer_remove_amp_panel', 1000 );

/**
 * Register Theme Mods
 */
CSCO_Kirki::add_config(
	'csco_theme_mod', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

/**
 * Load custom customizer scripts
 */
function csco_customize_controls_enqueue_scripts() {
	wp_enqueue_script( 'csco_customize_js', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'csco_customize_controls_enqueue_scripts' );

/**
 * Load custom customizer styles
 */
function csco_customize_controls_print_styles() {
	wp_enqueue_style( 'csco_customize_css', get_template_directory_uri() . '/css/customizer.css', array(), false );
}
add_action( 'customize_controls_print_styles', 'csco_customize_controls_print_styles', 100 );

/**
 * Site Identity.
 */
require get_template_directory() . '/inc/theme-mods/site-identity.php';

/**
 * Design.
 */
require get_template_directory() . '/inc/theme-mods/design.php';

/**
 * Typography.
 */
require get_template_directory() . '/inc/theme-mods/typography.php';

/**
 * Header Settings.
 */
require get_template_directory() . '/inc/theme-mods/header-settings.php';

/**
 * Footer Settings.
 */
require get_template_directory() . '/inc/theme-mods/footer-settings.php';

/**
 * Homepage Settings.
 */
require get_template_directory() . '/inc/theme-mods/homepage-settings.php';

/**
 * Archive Settings.
 */
require get_template_directory() . '/inc/theme-mods/archive-settings.php';

/**
 * Category Settings.
 */
require get_template_directory() . '/inc/theme-mods/category-settings.php';

/**
 * Posts Settings.
 */
require get_template_directory() . '/inc/theme-mods/post-settings.php';

/**
 * Pages Settings.
 */
require get_template_directory() . '/inc/theme-mods/page-settings.php';

/**
 * Miscellaneous Settings.
 */
require get_template_directory() . '/inc/theme-mods/miscellaneous-settings.php';

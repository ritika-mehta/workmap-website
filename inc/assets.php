<?php
/**
 * Assets
 *
 * All enqueues of scripts and styles.
 *
 * @package Squaretype
 */

if ( ! function_exists( 'csco_content_width' ) ) {
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function csco_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'csco_content_width', 1200 );
	}
}
add_action( 'after_setup_theme', 'csco_content_width', 0 );

if ( ! function_exists( 'csco_editor_style' ) ) {
	/**
	 * Add callback for custom editor stylesheets.
	 */
	function csco_editor_style() {
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support custom fonts for editor styles.
		add_editor_style( '/css/custom-fonts.css' );
	}
}
add_action( 'current_screen', 'csco_editor_style' );

/**
 * Enqueue block editor specific scripts.
 */
function csco_enqueue_block_editor_assets() {
	$version = csco_get_theme_data( 'Version' );

	// Register theme styles.
	wp_register_style( 'csco-editor', csco_style( get_template_directory_uri() . '/css/editor-style.css' ), false, $version );

	// Add RTL support.
	wp_style_add_data( 'csco-editor', 'rtl', 'replace' );

	// Enqueue theme styles.
	wp_enqueue_style( 'csco-editor' );
}
add_action( 'enqueue_block_editor_assets', 'csco_enqueue_block_editor_assets' );

if ( ! function_exists( 'csco_enqueue_scripts' ) ) {
	/**
	 * Enqueue scripts and styles.
	 */
	function csco_enqueue_scripts() {

		$version = csco_get_theme_data( 'Version' );

		// Register vendor scripts.
		wp_register_script( 'colcade', get_template_directory_uri() . '/js/colcade.js', array( 'jquery' ), '0.2.0', true );
		wp_register_script( 'object-fit-images', get_template_directory_uri() . '/js/ofi.min.js', array(), '3.2.3', true );

		// Register theme scripts.
		wp_register_script( 'csco-scripts', get_template_directory_uri() . '/js/scripts.js', array(
			'jquery',
			'imagesloaded',
			'colcade',
			'object-fit-images',
		), $version, true );

		// Enqueue theme scripts.
		wp_enqueue_script( 'csco-scripts' );

		// Enqueue comment reply script.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Register theme styles.
		wp_register_style( 'csco-styles', csco_style( get_template_directory_uri() . '/style.css' ), array(), $version );

		// Enqueue theme styles.
		wp_enqueue_style( 'csco-styles' );

		// Add RTL support.
		wp_style_add_data( 'csco-styles', 'rtl', 'replace' );

		// Dequeue Contact Form 7 styles.
		wp_dequeue_style( 'contact-form-7' );

	}
}
add_action( 'wp_enqueue_scripts', 'csco_enqueue_scripts' );

if ( ! function_exists( 'csco_large_section_style' ) ) {
	/**
	 * Generate style for hero and category header.
	 */
	function csco_large_section_style() {

		if ( is_front_page() || is_home() ) {

			$background_type = get_theme_mod( 'general_hero_bg_type', 'color' );

			// Post Category Background Color.
			if ( 'category_color' === $background_type ) {
				$category = csco_get_top_category( get_the_ID() );
				if ( $category ) {
					$background_color = get_term_meta( $category->term_id, 'csco_background_color', true );

					if ( $background_color ) {
						return "background: $background_color;";
					}
				}
			}

			// Custom Gradient Color.
			if ( 'gradient' === $background_type ) {
				$start_color = get_theme_mod( 'general_hero_start_color' );
				$end_color   = get_theme_mod( 'general_hero_end_color' );

				if ( $start_color || $end_color ) {
					$start_color = $start_color ? $start_color : 'transparent';
					$end_color   = $end_color ? $end_color : 'transparent';

					return "background: linear-gradient(45deg, $start_color, $end_color);";
				}
			}

			// Post Category Background Gradient.
			if ( 'category_gradient' === $background_type ) {
				$category = csco_get_top_category( get_the_ID() );

				if ( $category ) {
					$start_color = get_term_meta( $category->term_id, 'csco_gradient_start_color', true );
					$end_color   = get_term_meta( $category->term_id, 'csco_gradient_end_color', true );

					if ( $start_color || $end_color ) {
						$start_color = $start_color ? $start_color : 'transparent';
						$end_color   = $end_color ? $end_color : 'transparent';

						return "background: linear-gradient(45deg, $start_color, $end_color);";
					}
				}
			}
		}

		if ( is_category() ) {
			$css = null;

			// Background.
			$background_color = get_term_meta( get_query_var( 'cat' ), 'csco_background_color', true );
			if ( $background_color ) {
				$css = "background: $background_color;";
			}

			// Gradient.
			$start_color = get_term_meta( get_query_var( 'cat' ), 'csco_gradient_start_color', true );
			$end_color   = get_term_meta( get_query_var( 'cat' ), 'csco_gradient_end_color', true );

			if ( $start_color || $end_color ) {
				$start_color = $start_color ? $start_color : 'transparent';
				$end_color   = $end_color ? $end_color : 'transparent';

				$css = "background: linear-gradient(45deg, $start_color, $end_color);";
			}

			return $css;
		}
	}
}

<?php
/**
 * Gutenberg compatibility functions.
 *
 * @package Squaretype
 */

/**
 * Adds classes to <div class="editor-styles-wrapper"> tag
 */
function csco_block_editor_wrapper() {
	$post_id = get_the_ID();

	if ( ! $post_id ) {
		return;
	}

	// Set post type.
	$post_type = sprintf( 'post-type-%s', get_post_type( $post_id ) );

	// Set page layout.
	$default_layout = csco_get_page_sidebar( $post_id, 'default' );
	$page_layout    = csco_get_page_sidebar( $post_id, false );

	if ( 'disabled' === $default_layout ) {
		$default_layout = 'sidebar-disabled';
	} else {
		$default_layout = 'sidebar-enabled';
	}

	if ( 'disabled' === $page_layout ) {
		$page_layout = 'sidebar-disabled';
	} else {
		$page_layout = 'sidebar-enabled';
	}

	// Post Sidebar.
	if ( 'post' === get_post_type( $post_id ) && csco_powerkit_module_enabled( 'share_buttons' ) && powerkit_share_buttons_exists( 'post_sidebar' ) ) {
		$post_sidebar = 'post-sidebar-enabled';
	} else {
		$post_sidebar = 'post-sidebar-disabled';
	}

	wp_enqueue_script(
		'csco-editor-wrapper',
		get_template_directory_uri() . '/js/gutenberg-wrapper.js',
		array(
			'wp-editor',
			'wp-element',
			'wp-compose',
			'wp-data',
			'wp-plugins',
		),
		csco_get_theme_data( 'Version' ),
		true
	);

	wp_localize_script(
		'csco-editor-wrapper',
		'cscoGWrapper',
		array(
			'post_type'      => $post_type,
			'default_layout' => $default_layout,
			'page_layout'    => $page_layout,
			'post_sidebar'   => $post_sidebar,
		)
	);
}
add_action( 'enqueue_block_editor_assets', 'csco_block_editor_wrapper' );

/**
 * Change canvas breakpoints
 */
function csco_canvas_register_breakpoints() {
	return array(
		'mobile'  => 599,  // <= 599
		'tablet'  => 1019, // <= 1019
		'desktop' => 1020, // >= 1020
	);
}
add_filter( 'canvas_register_breakpoints', 'csco_canvas_register_breakpoints' );

/**
 * Change settings of canvas sections
 *
 * @param array $blocks All registered blocks.
 */
function csco_change_settings_canvas_sections( $blocks ) {

	foreach ( $blocks as $key => $block ) {

		if ( 'canvas/section' === $block['name'] ) {
			$blocks[ $key ] = array_merge(
				$blocks[ $key ],
				array(
					'style'        => null,
					'editor_style' => null,
				)
			);
		}
	}

	return $blocks;
}
add_filter( 'canvas_register_block_type', 'csco_change_settings_canvas_sections', 999 );

/**
 * Add css selectors to output of kirki.
 */
add_filter(
	'csco_color_primary',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.edit-post-visual-editor a',
					)
				),
				'property' => 'color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_font_base',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.edit-post-visual-editor.editor-styles-wrapper',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_primary',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.edit-post-visual-editor.editor-styles-wrapper .button-primary',
						'.edit-post-visual-editor.editor-styles-wrapper .overlay-inner a.button-primary',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background)',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block[data-heading="cnvs-heading-numbered-2"] .is-style-cnvs-heading-numbered:before',
						'.edit-post-visual-editor.editor-styles-wrapper .cnvs-block-posts-sidebar .cnvs-post-number',
						'.edit-post-visual-editor.editor-styles-wrapper .cs-author-button',
						'.edit-post-visual-editor.editor-styles-wrapper .pk-featured-categories-vertical-list .pk-featured-count',
						'.edit-post-visual-editor.editor-styles-wrapper .pk-subscribe-submit',
					)
				),
				'property' => 'background-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_overlay',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.edit-post-visual-editor.editor-styles-wrapper .cs-overlay-background:after',
					)
				),
				'property' => 'background-color',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_font_secondary',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.edit-post-visual-editor.editor-styles-wrapper .post-meta',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="text"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="email"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="url"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="password"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="search"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="number"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="tel"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="range"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="date"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="month"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="week"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="time"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="datetime"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="datetime-local"]',
						'.edit-post-visual-editor.editor-styles-wrapper input[type="color"]',
						'.edit-post-visual-editor.editor-styles-wrapper select',
						'.edit-post-visual-editor.editor-styles-wrapper textarea',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-quote cite',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-quote__citation',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-image figcaption',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-audio figcaption',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-embed figcaption',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-pullquote cite',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-pullquote footer',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-pullquote .wp-block-pullquote__citation',
						'.edit-post-visual-editor.editor-styles-wrapper .pk-font-secondary',
						'.edit-post-visual-editor.editor-styles-wrapper .abr-badge-primary',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_font_primary',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.edit-post-visual-editor.editor-styles-wrapper .button-primary',
						'.edit-post-visual-editor.editor-styles-wrapper .pk-font-primary',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-button .wp-block-button__link',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-button .abr-review-item .abr-review-name',
						'.edit-post-visual-editor.editor-styles-wrapper .cs-author-button',
						'.edit-post-visual-editor.editor-styles-wrapper .pk-subscribe-submit',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_font_post_content',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.edit-post-visual-editor .editor-writing-flow',
						'.edit-post-visual-editor .editor-writing-flow p',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_font_headings',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.edit-post-visual-editor.editor-styles-wrapper h1',
						'.edit-post-visual-editor.editor-styles-wrapper h2',
						'.edit-post-visual-editor.editor-styles-wrapper h3',
						'.edit-post-visual-editor.editor-styles-wrapper h4',
						'.edit-post-visual-editor.editor-styles-wrapper h5',
						'.edit-post-visual-editor.editor-styles-wrapper h6',
						'.edit-post-visual-editor.editor-styles-wrapper .h1',
						'.edit-post-visual-editor.editor-styles-wrapper .h2',
						'.edit-post-visual-editor.editor-styles-wrapper .h3',
						'.edit-post-visual-editor.editor-styles-wrapper .h4',
						'.edit-post-visual-editor.editor-styles-wrapper .h5',
						'.edit-post-visual-editor.editor-styles-wrapper .h6',
						'.edit-post-visual-editor.editor-styles-wrapper .editor-post-title__input',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-quote',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-quote p',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-pullquote p',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-freeform blockquote p:first-child',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-cover .wp-block-cover-image-text',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-cover .wp-block-cover-text',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-cover-image .wp-block-cover-image-text',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-cover-image .wp-block-cover-text',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-cover-image h2',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-cover h2',
						'.edit-post-visual-editor.editor-styles-wrapper p.has-drop-cap:not(:focus):first-letter',
						'.edit-post-visual-editor.editor-styles-wrapper .cnvs-block-tabs .cnvs-block-tabs-button',
						'.edit-post-visual-editor.editor-styles-wrapper .cnvs-block-tabs .cnvs-block-tabs-button a',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_font_title_block',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element' => csco_implode(
					array(
						'.edit-post-visual-editor.editor-styles-wrapper .title-block',
						'.edit-post-visual-editor.editor-styles-wrapper .pk-font-block',
						'.edit-post-visual-editor.editor-styles-wrapper .pk-widget-contributors .pk-author-posts > h6',
						'.edit-post-visual-editor.editor-styles-wrapper .cnvs-block-section-heading',
					)
				),
				'context' => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_design_border_radius',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.edit-post-visual-editor.editor-styles-wrapper .button-primary',
						'.edit-post-visual-editor.editor-styles-wrapper .wp-block-button:not(.is-style-squared) .wp-block-button__link',
						'.edit-post-visual-editor.editor-styles-wrapper .cs-author-button',
						'.edit-post-visual-editor.editor-styles-wrapper .pk-subscribe-submit',
					)
				),
				'property' => 'border-radius',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_design_border_radius',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'     => csco_implode(
					array(
						'.edit-post-visual-editor.editor-styles-wrapper .pk-subscribe-with-name input[type="text"]',
						'.edit-post-visual-editor.editor-styles-wrapper .pk-subscribe-with-bg input[type="text"]',
					)
				),
				'property'    => 'border-radius',
				'media_query' => '@media (max-width: 599px)',
				'context'     => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_design_border_radius',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.edit-post-visual-editor.editor-styles-wrapper .pk-subscribe-form-wrap input[type="text"]:first-child',
					)
				),
				'property' => 'border-radius',
				'property' => 'border-top-left-radius',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_design_border_radius',
	function( $rules ) {
		array_push(
			$rules,
			array(
				'element'  => csco_implode(
					array(
						'.edit-post-visual-editor.editor-styles-wrapper .pk-subscribe-form-wrap input[type="text"]:first-child',
					)
				),
				'property' => 'border-radius',
				'property' => 'border-bottom-left-radius',
				'context'  => array( 'editor' ),
			)
		);
		return $rules;
	}
);

<?php
/**
 * Widgets Init
 *
 * Register sitebar locations for widgets.
 *
 * @package Squaretype
 */

if ( ! function_exists( 'csco_widgets_init' ) ) {
	/**
	 * Register widget areas.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function csco_widgets_init() {

		$tag = apply_filters( 'csco_section_title_tag', 'h5' );

		register_sidebar(
			array(
				'name'          => esc_html__( 'Default Sidebar', 'squaretype' ),
				'id'            => 'sidebar-main',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="title-block-wrap"><' . $tag . ' class="title-block title-widget">',
				'after_title'   => '</' . $tag . '></div>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Off-Canvas', 'squaretype' ),
				'id'            => 'sidebar-offcanvas',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="title-block-wrap"><' . $tag . ' class="title-block title-widget">',
				'after_title'   => '</' . $tag . '></div>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Hero', 'squaretype' ),
				'id'            => 'sidebar-hero',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="title-block-wrap"><' . $tag . ' class="title-block title-widget">',
				'after_title'   => '</' . $tag . '></div>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Auto Loaded Sidebar', 'squaretype' ),
				'id'            => 'sidebar-loaded',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="title-block-wrap"><' . $tag . ' class="title-block title-widget">',
				'after_title'   => '</' . $tag . '></div>',
			)
		);
	}
}
add_action( 'widgets_init', 'csco_widgets_init' );


if ( ! function_exists( 'csco_widget_categories_walker' ) ) {
	/**
	 * Modify walker for category widget.
	 *
	 * @param array $args The args of categories widget.
	 */
	function csco_widget_categories_walker( $args ) {
		$args['walker'] = new CSCO_Walker_Category();

		return $args;
	}

	/**
	 * Change Walker Category.
	 */
	class CSCO_Walker_Category extends Walker_Category {
		/**
		 * Starts the element output.
		 *
		 * @param string $output   Used to append additional content (passed by reference).
		 * @param object $category Category data object.
		 * @param int    $depth    Optional. Depth of category in reference to parents. Default 0.
		 * @param array  $args     Optional. An array of arguments. See wp_list_categories(). Default empty array.
		 * @param int    $id       Optional. ID of the current category. Default 0.
		 */
		public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
			$color = get_term_meta( $category->term_id, 'csco_brand_color', true );

			$icon = sprintf( '<span class="icon" style="background-color:%s"></span>', $color ? $color : '#000000' );

			/** This filter is documented in wp-includes/category-template.php */
			$cat_name = $icon . apply_filters(
				'list_cats',
				esc_attr( $category->name ),
				$category
			);

			// Don't generate an element if the category name is empty.
			if ( ! $cat_name ) {
				return;
			}

			$link = '<a href="' . esc_url( get_term_link( $category ) ) . '" ';
			if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
				/**
				 * Filters the category description for display.
				 *
				 * @param string $description Category description.
				 * @param object $category    Category object.
				 */
				$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
			}

			$link .= '>';
			$link .= $cat_name . '</a>';

			if ( ! empty( $args['feed_image'] ) || ! empty( $args['feed'] ) ) {
				$link .= ' ';

				if ( empty( $args['feed_image'] ) ) {
					$link .= '(';
				}

				$link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $args['feed_type'] ) ) . '"';

				if ( empty( $args['feed'] ) ) {
					// Translators: category alt.
					$alt = ' alt="' . sprintf( __( 'Feed for all posts filed under %s', 'squaretype' ), $cat_name ) . '"';
				} else {
					$alt  = ' alt="' . $args['feed'] . '"';
					$name  = $args['feed'];
					$link .= empty( $args['title'] ) ? '' : $args['title'];
				}

				$link .= '>';

				if ( empty( $args['feed_image'] ) ) {
					$link .= $name;
				} else {
					$link .= "<img src='" . $args['feed_image'] . "'$alt" . ' />';
				}
				$link .= '</a>';

				if ( empty( $args['feed_image'] ) ) {
					$link .= ')';
				}
			}

			if ( ! empty( $args['show_count'] ) ) {
				$link .= ' (' . number_format_i18n( $category->count ) . ')';
			}
			if ( 'list' === $args['style'] ) {
				$output .= "\t<li";

				$css_classes = array(
					'cat-item',
					'cat-item-' . $category->term_id,
				);

				if ( ! empty( $args['current_category'] ) ) {
					// 'current_category' can be an array, so we use `get_terms()`.
					$_current_terms = get_terms( $category->taxonomy, array(
						'include'    => $args['current_category'],
						'hide_empty' => false,
					) );

					foreach ( $_current_terms as $_current_term ) {
						if ( (int) $category->term_id === (int) $_current_term->term_id ) {
							$css_classes[] = 'current-cat';
						} elseif ( (int) $category->term_id === (int) $_current_term->parent ) {
							$css_classes[] = 'current-cat-parent';
						}
						while ( $_current_term->parent ) {
							if ( (int) $category->term_id === (int) $_current_term->parent ) {
								$css_classes[] = 'current-cat-ancestor';
								break;
							}
							$_current_term = get_term( $_current_term->parent, $category->taxonomy );
						}
					}
				}

				/**
				 * Filters the list of CSS classes to include with each category in the list.
				 *
				 * @param array  $css_classes An array of CSS classes to be applied to each list item.
				 * @param object $category    Category data object.
				 * @param int    $depth       Depth of page, used for padding.
				 * @param array  $args        An array of wp_list_categories() arguments.
				 */
				$css_classes = implode( ' ', apply_filters( 'category_css_class', $css_classes, $category, $depth, $args ) );

				$output .= ' class="' . $css_classes . '"';
				$output .= ">$link\n";
			} elseif ( isset( $args['separator'] ) ) {
				$output .= "\t$link" . $args['separator'] . "\n";
			} else {
				$output .= "\t$link<br />\n";
			}
		}
	}
}
add_filter( 'widget_categories_args', 'csco_widget_categories_walker' );

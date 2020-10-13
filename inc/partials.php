<?php
/**
 * These functions are used to load template parts (partials) or actions when used within action hooks,
 * and they probably should never be updated or modified.
 *
 * @package Squaretype
 */

if ( ! function_exists( 'csco_singular_post_type_before' ) ) {
	/**
	 * Add Before Singular Hooks for specific post type.
	 */
	function csco_singular_post_type_before() {
		if ( 'post' === get_post_type() ) {
			do_action( 'csco_post_content_before' );
		}
		if ( 'page' === get_post_type() ) {
			do_action( 'csco_page_content_before' );
		}
	}
}

if ( ! function_exists( 'csco_singular_post_type_after' ) ) {
	/**
	 * Add After Singular Hooks for specific post type.
	 */
	function csco_singular_post_type_after() {
		if ( 'post' === get_post_type() ) {
			do_action( 'csco_post_content_after' );
		}
		if ( 'page' === get_post_type() ) {
			do_action( 'csco_page_content_after' );
		}
	}
}

if ( ! function_exists( 'csco_singular_post_type_start' ) ) {
	/**
	 * Add Start Singular Hooks for specific post type.
	 */
	function csco_singular_post_type_start() {
		if ( 'post' === get_post_type() ) {
			do_action( 'csco_post_content_start' );
		}
		if ( 'page' === get_post_type() ) {
			do_action( 'csco_page_content_start' );
		}
	}
}

if ( ! function_exists( 'csco_singular_post_type_end' ) ) {
	/**
	 * Add End Singular Hooks for specific post type.
	 */
	function csco_singular_post_type_end() {
		if ( 'post' === get_post_type() ) {
			do_action( 'csco_post_content_end' );
		}
		if ( 'page' === get_post_type() ) {
			do_action( 'csco_page_content_end' );
		}
	}
}

if ( ! function_exists( 'csco_offcanvas' ) ) {
	/**
	 * Off-canvas
	 */
	function csco_offcanvas() {
		get_template_part( 'template-parts/offcanvas' );
	}
}

if ( ! function_exists( 'csco_header_social_links' ) ) {
	/**
	 * Header Social Links
	 */
	function csco_header_social_links() {

		if ( ! get_theme_mod( 'header_social_links', false ) ) {
			return;
		}

		if ( ! csco_powerkit_module_enabled( 'social_links' ) ) {
			return;
		}

		$scheme  = get_theme_mod( 'header_social_links_scheme', 'light' );
		$maximum = get_theme_mod( 'header_social_links_maximum', 3 );
		$counts  = get_theme_mod( 'header_social_links_counts', true );

		if ( 'csco_navbar_content_right' === current_filter() ) {
			$color_mod_name = 'color_navbar_bg';
		} else {
			$color_mod_name = 'color_large_header_bg';
		}

		$bg_scheme = csco_light_or_dark( get_theme_mod( $color_mod_name, '#FFFFFF' ), null, ' cs-bg-dark' );
		?>
		<div class="navbar-social-links <?php echo esc_attr( $bg_scheme ); ?>">
			<?php
				powerkit_social_links( false, false, $counts, 'nav', $scheme, 'mixed', $maximum );
			?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'csco_header_follow' ) ) {
	/**
	 * Header Follow
	 */
	function csco_header_follow() {
		$button = get_theme_mod( 'header_follow_button_label', esc_html__( 'Subscribe', 'squaretype' ) . '<i class="cs-icon cs-icon-send"></i>' );
		$link   = get_theme_mod( 'header_follow_button_link' );

		if ( $button && $link ) {
			?>
			<div class="navbar-follow navbar-follow-button">
				<a class="button navbar-follow-btn" href="<?php echo esc_url( $link ); ?>" target="_blank">
					<?php echo wp_kses( $button, 'post' ); ?>
				</a>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_header_offcanvas_button' ) ) {
	/**
	 * Header Offcanvas Button
	 */
	function csco_header_offcanvas_button() {
		if ( csco_offcanvas_exists() ) {

			$class = sprintf( 'toggle-offcanvas-%s', get_theme_mod( 'header_offcanvas', true ) ? 'show' : 'hide' );

			if ( ! is_active_sidebar( 'sidebar-offcanvas' ) ) {
				$class = ' cs-d-lg-none';
			}
		?>
		<button type="button" class="navbar-toggle-offcanvas toggle-offcanvas <?php echo esc_attr( $class ); ?>">
			<i class="cs-icon cs-icon-menu"></i>
		</button>
		<?php
		}
	}
}

if ( ! function_exists( 'csco_header_logo' ) ) {
	/**
	 * Header Logo
	 */
	function csco_header_logo() {
		$alignment = get_theme_mod( 'header_alignment', 'left' );

		if ( 'csco_navbar_topbar_center' === current_filter() ) {
			$logo_id = get_theme_mod( 'large_logo' );
			$class   = 'large-title';
		} elseif ( 'csco_navbar_content_left' === current_filter() && 'left' !== $alignment ) {
			return;
		} elseif ( 'csco_navbar_content_center' === current_filter() && 'center' !== $alignment ) {
			return;
		} else {
			$logo_id = get_theme_mod( 'logo' );
			$class   = 'site-title';
		}

		?>
		<div class="navbar-brand">
			<?php

			if ( $logo_id ) {
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php csco_get_retina_image( $logo_id, array( 'alt' => get_bloginfo( 'name' ) ) ); ?>
				</a>
				<?php
			} else {
				?>
				<a class="<?php echo esc_attr( $class ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php
			}

			if ( 'large' === get_theme_mod( 'header_layout', 'large' ) && get_theme_mod( 'header_tagline' ) ) {
				?>
				<span class="tagline"><?php bloginfo( 'description' ); ?></span>
				<?php
			}
			?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'csco_navbar_nav_menu' ) ) {
	/**
	 * Header Nav Menu
	 */
	function csco_navbar_nav_menu() {
		if ( ! get_theme_mod( 'header_navigation_menu', true ) ) {
			return;
		}

		if ( has_nav_menu( 'primary' ) ) {
			$submenu_scheme = csco_light_or_dark( get_theme_mod( 'color_navbar_submenu', '#000000' ), null, ' cs-navbar-nav-submenu-dark' );

			wp_nav_menu( array(
				'menu_class'      => sprintf( 'navbar-nav %s', $submenu_scheme ),
				'theme_location'  => 'primary',
				'container'       => '',
				'container_class' => '',
			) );
		}
	}
}

if ( ! function_exists( 'csco_header_search_button' ) ) {
	/**
	 * Header Social Links
	 */
	function csco_header_search_button() {
		if ( ! get_theme_mod( 'header_search_button', true ) ) {
			return;
		}
		?>
		<button type="button" class="navbar-toggle-search toggle-search">
			<i class="cs-icon cs-icon-search"></i>
		</button>
		<?php
	}
}

if ( ! function_exists( 'csco_single_share_button' ) ) {
	/**
	 * Post Share
	 */
	function csco_single_share_button() {
		if ( ! csco_powerkit_module_enabled( 'share_buttons' ) ) {
			return;
		}
		if ( is_single() ) {
			powerkit_share_buttons_location( 'after-post' );
		}
	}
}

if ( ! function_exists( 'csco_single_author' ) ) {
	/**
	 * Post Author
	 */
	function csco_single_author() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		if ( ! csco_has_post_meta( 'author' ) ) {
			return;
		}
		get_template_part( 'template-parts/post-author' );
	}
}

if ( ! function_exists( 'csco_single_subscribe' ) ) {
	/**
	 * Post Subscribe
	 */
	function csco_single_subscribe() {
		if ( false === get_theme_mod( 'post_subscribe', false ) ) {
			return;
		}

		if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {

			if ( ! is_singular( 'post' ) ) {
				return;
			}

			get_template_part( 'template-parts/post-subscribe' );
		}
	}
}

if ( ! function_exists( 'csco_single_prev_nex' ) ) {
	/**
	 * Post Prev Next
	 */
	function csco_single_prev_nex() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		if ( false === get_theme_mod( 'post_prev_next', true ) ) {
			return;
		}
		get_template_part( 'template-parts/post-prev-next' );
	}
}

if ( ! function_exists( 'csco_comments' ) ) {
	/**
	 * Post Comments
	 */
	function csco_comments() {
		if ( post_password_required() ) {
			return;
		}

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
}

if ( ! function_exists( 'csco_site_search' ) ) {
	/**
	 * Site Search
	 */
	function csco_site_search() {
		get_template_part( 'template-parts/site-search' );
	}
}

if ( ! function_exists( 'csco_post_header' ) ) {
	/**
	 * Post Header
	 */
	function csco_post_header() {
		if ( ! is_singular() ) {
			return;
		}
		if ( 'none' === csco_get_page_header_type() ) {
			return;
		}
		if ( 'large' === csco_get_page_header_type() ) {
			return;
		}
		get_template_part( 'template-parts/post-header' );
	}
}

if ( ! function_exists( 'csco_post_header_large' ) ) {
	/**
	 * Post Header Large
	 */
	function csco_post_header_large() {
		if ( ! is_singular() ) {
			return;
		}
		if ( 'large' !== csco_get_page_header_type() ) {
			return;
		}
		get_template_part( 'template-parts/post-header-large' );
	}
}

if ( ! function_exists( 'csco_page_header' ) ) {
	/**
	 * Page Header
	 */
	function csco_page_header() {
		if ( ! ( is_archive() || is_search() || is_404() ) ) {
			return;
		}
		get_template_part( 'template-parts/page-header' );
	}
}

if ( ! function_exists( 'csco_breadcrumbs' ) ) {
	/**
	 * SEO Breadcrumbs
	 *
	 * @param bool $is_singular Display the breadcrumbs in full post.
	 * @param bool $echo        Output type.
	 */
	function csco_breadcrumbs( $is_singular = false, $echo = true ) {
		if ( is_front_page() || is_category() ) {
			return;
		}

		if ( ( is_singular( 'post' ) || is_singular( 'page' ) ) && ! $is_singular ) {
			return;
		}

		ob_start();

		if ( apply_filters( 'csco_breadcrumbs', true ) ) {
			if ( ! function_exists( 'yoast_breadcrumb' ) ) {
				return;
			}
			yoast_breadcrumb( '<div class="cs-breadcrumbs" id="breadcrumbs">', '</div>' );
		}

		if ( $echo ) {
			return ob_end_flush();
		}

		return ob_get_clean();
	}
}

if ( ! function_exists( 'csco_subcategories' ) ) {
	/**
	 * Subcategories
	 */
	function csco_subcategories() {

		if ( false === get_theme_mod( 'category_subcategories', false ) ) {
			return;
		}

		if ( ! is_category() ) {
			return;
		}

		$args = apply_filters( 'csco_subcategories_args', array(
			'parent' => get_query_var( 'cat' ),
		) );

		$categories = get_categories( $args );

		if ( $categories ) {
		?>
		<section class="subcategories">
			<?php $tag = apply_filters( 'csco_section_title_tag', 'h5' ); ?>
			<<?php echo esc_html( $tag ); ?> class="title-block"><?php esc_html_e( 'Subcategories', 'squaretype' ); ?></<?php echo esc_html( $tag ); ?>>
			<ul class="cs-nav cs-nav-pills">
			<?php
			foreach ( $categories as $category ) {
				// Translators: category name.
				$title = sprintf( esc_html__( 'View all posts in %s', 'squaretype' ), $category->name );
				$link  = get_category_link( $category->term_id )
				?>
					<li class="cs-nav-item">
						<a class="cs-nav-link" data-toggle="pill" href="<?php echo esc_url( $link ); ?>" title="<?php echo esc_attr( $title ); ?>">
							<?php echo esc_html( $category->name ); ?>
						</a>
					</li>
				<?php
			}
			?>
			</ul>
		</section>
		<?php
		}
	}
}

if ( ! function_exists( 'csco_homepage_posts' ) ) {
	/**
	 * Homepage Posts Section
	 */
	function csco_homepage_posts() {

		if ( false === get_theme_mod( 'hero', false ) ) {
			return;
		}

		if ( ! ( is_front_page() || is_home() ) ) {
			return;
		}

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		if ( 1 !== $paged ) {
			return;
		}

		if ( is_front_page() && 'page' === get_option( 'show_on_front', 'posts' ) && 'home' === get_theme_mod( 'hero_location', 'front_page' ) ) {
			return;
		}

		if ( is_home() && 'page' === get_option( 'show_on_front', 'posts' ) && 'front_page' === get_theme_mod( 'hero_location', 'front_page' ) ) {
			return;
		}

		get_template_part( 'template-parts/hero' );
	}
}

if ( ! function_exists( 'csco_related_posts' ) ) {
	/**
	 * Related Posts
	 */
	function csco_related_posts() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		if ( false === get_theme_mod( 'related', true ) ) {
			return;
		}
		get_template_part( 'template-parts/related-posts' );
	}
}

if ( ! function_exists( 'csco_meet_team' ) ) {
	/**
	 * Meet Team
	 */
	function csco_meet_team() {
		if ( is_page_template( 'template-meet-team.php' ) ) {
			get_template_part( 'template-parts/meet-team' );
		}
	}
}

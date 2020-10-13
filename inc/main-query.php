<?php
/**
 * Processing the main query.
 *
 * @package Squaretype
 */

if ( ! function_exists( 'csco_exclude_general_posts_from_query' ) ) {
	/**
	 * Exclude Hero from the Main Query
	 *
	 * @param array $query Default query.
	 * @param bool  $setup Сhange the current query.
	 */
	function csco_exclude_general_posts_from_query( $query, $setup = true ) {
		if ( is_admin() ) {
			return $query;
		}

		if ( false === get_theme_mod( 'hero', false ) ) {
			return $query;
		}

		if ( ! ( $query->get( 'page_id' ) === get_option( 'page_on_front' ) || $query->is_home ) ) {
			return $query;
		}

		if ( $query->get( 'page_id' ) === get_option( 'page_on_front' ) && 'page' === get_option( 'show_on_front', 'posts' ) && 'home' === get_theme_mod( 'hero_location', 'front_page' ) ) {
			return $query;
		}

		if ( $query->is_home && 'page' === get_option( 'show_on_front', 'posts' ) && 'front_page' === get_theme_mod( 'hero_location', 'front_page' ) ) {
			return $query;
		}

		if ( false === get_theme_mod( 'general_hero_exclude', false ) && true === $setup ) {
			return $query;
		}

		if ( ! $query->is_main_query() ) {
			return $query;
		}

		$ids = csco_get_general_posts_ids();

		if ( ! $ids ) {
			return $query;
		}

		// Return only ids.
		if ( false === $setup ) {
			return $ids;
		}

		$query->set( 'post__not_in', array_merge( $query->get( 'post__not_in' ), $ids ) );

		return $query;
	}
}
add_action( 'pre_get_posts', 'csco_exclude_general_posts_from_query' );

if ( ! function_exists( 'csco_exclude_column_posts_from_query' ) ) {
	/**
	 * Exclude Hero from the Main Query
	 *
	 * @param array $query Default query.
	 * @param bool  $setup Сhange the current query.
	 */
	function csco_exclude_column_posts_from_query( $query, $setup = true ) {
		if ( is_admin() ) {
			return $query;
		}

		if ( false === get_theme_mod( 'hero', false ) ) {
			return $query;
		}

		if ( ! ( $query->get( 'page_id' ) === get_option( 'page_on_front' ) || $query->is_home ) ) {
			return $query;
		}

		if ( $query->get( 'page_id' ) === get_option( 'page_on_front' ) && 'page' === get_option( 'show_on_front', 'posts' ) && 'home' === get_theme_mod( 'hero_location', 'front_page' ) ) {
			return $query;
		}

		if ( $query->is_home && 'page' === get_option( 'show_on_front', 'posts' ) && 'front_page' === get_theme_mod( 'hero_location', 'front_page' ) ) {
			return $query;
		}

		if ( false === get_theme_mod( 'column_hero_exclude', false ) && true === $setup ) {
			return $query;
		}

		if ( ! $query->is_main_query() ) {
			return $query;
		}

		$ids = csco_get_column_posts_ids();

		if ( ! $ids ) {
			return $query;
		}

		// Return only ids.
		if ( false === $setup ) {
			return $ids;
		}

		$query->set( 'post__not_in', array_merge( $query->get( 'post__not_in' ), $ids ) );

		return $query;
	}
}
add_action( 'pre_get_posts', 'csco_exclude_column_posts_from_query' );

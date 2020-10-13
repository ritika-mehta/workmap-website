<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Squaretype
 */

?>

						<?php do_action( 'csco_main_content_end' ); ?>

					</div><!-- .main-content -->

					<?php do_action( 'csco_main_content_after' ); ?>

				</div><!-- .cs-container -->

				<?php do_action( 'csco_site_content_end' ); ?>

			</div><!-- .site-content -->

			<?php do_action( 'csco_site_content_after' ); ?>

			<?php do_action( 'csco_footer_before' ); ?>

			<footer id="colophon" class="site-footer">
				<?php
				// Subscription.
				$subscription_form = get_theme_mod( 'footer_subscribe', false );

				if ( shortcode_exists( 'powerkit_subscription_form' ) && $subscription_form ) {
					$title = get_theme_mod( 'footer_subscribe_title', esc_html__( 'Subscribe to Our Newsletter', 'squaretype' ) );
					$text  = get_theme_mod( 'footer_subscribe_text', esc_html__( 'Get notified of the best deals on our WordPress themes.', 'squaretype' ) );
					$name  = get_theme_mod( 'footer_subscribe_name', false );
					?>
					<div class="footer-subscribe">
						<div class="cs-container">
							<div class="subscribe-wrap">
								<?php echo do_shortcode( sprintf( '[powerkit_subscription_form display_name="%s" title="%s" text="%s"]', $name, $title, $text ) ); ?>
							</div>
						</div>
					</div>
					<?php
				}
				?>

				<?php
				// Instagram Timeline.
				$username = get_theme_mod( 'footer_instagram_username' );

				add_filter( 'powerkit_instagram_templates', 'csco_footer_instagram_default', 20 );

				if ( $username && csco_powerkit_module_enabled( 'instagram_integration' ) ) {
					?>
					<div class="footer-instagram">
						<div class="cs-container">
							<?php
								powerkit_instagram_get_recent( array(
									'user_id' => $username,
									'number'  => apply_filters( 'csco_instagram_footer_number', 12 ),
									'columns' => apply_filters( 'csco_instagram_footer_columns', 6 ),
									'size'    => 'small',
									'target'  => '_blank',
								) );
							?>
						</div>
					</div>
					<?php
				}

				$function = sprintf( 'remove_%s', 'filter' );

				$function( 'powerkit_instagram_templates', 'csco_footer_instagram_default', 20 );
				?>

				<div class="footer-info">

					<div class="cs-container">

						<div class="site-info">

							<div class="footer-col-info">
								<?php
								// Logo.
								$logo_id = get_theme_mod( 'footer_logo' );
								if ( $logo_id ) {
									?>
									<span class="site-title footer-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php csco_get_retina_image( $logo_id, array( 'alt' => get_bloginfo( 'name' ) ) ); ?>
									</span>
									<?php
								} else {
									?>
									<div class="footer-title"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></div>
									<?php
								}
								?>
								<?php
								/* translators: %s: Author name. */
								$footer_text = get_theme_mod( 'footer_text', sprintf( esc_html__( 'Designed & Developed by %s', 'squaretype' ), '<a href="' . esc_url( csco_get_theme_data( 'AuthorURI' ) ) . '">Code Supply Co.</a>' ) );
								if ( $footer_text ) {
									?>
									<div class="footer-copyright">
										<?php echo do_shortcode( $footer_text ); ?>
									</div>
									<?php
								}
								?>
							</div>

							<?php
							$footer_nav_col = 'full';

							// Social links.
							$social_in_footer = get_theme_mod( 'footer_social_links', false );
							if ( $social_in_footer && csco_powerkit_module_enabled( 'social_links' ) && powerkit_social_links_exists( 'social_links' ) ) {
								$footer_nav_col = 'compact';
								?>
								<div class="footer-col-social">
									<?php
										$scheme  = get_theme_mod( 'footer_social_links_scheme', 'light' );
										$maximum = get_theme_mod( 'footer_social_links_maximum', 4 );
										$counts  = get_theme_mod( 'footer_social_links_counts', true );

										powerkit_social_links( false, false, $counts, 'nav', $scheme, 'mixed', $maximum );
									?>
								</div>
								<?php
							}
							?>

							<?php
							// Navigation.
							if ( has_nav_menu( 'footer' ) ) {
								?>
								<div class="footer-col-nav footer-col-nav-<?php echo esc_attr( $footer_nav_col ); ?>">
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'footer',
											'menu_class' => 'navbar-nav',
											'container'  => 'nav',
											'container_class' => 'navbar-footer',
											'depth' => 1,
										)
									);
									?>
								</div>
								<?php
							}
							?>

						</div>

					</div>

				</div>

			</footer>

			<?php do_action( 'csco_footer_after' ); ?>

		</div>

	</div><!-- .site-inner -->

	<?php do_action( 'csco_site_end' ); ?>

</div><!-- .site -->

<?php do_action( 'csco_site_after' ); ?>

<?php wp_footer(); ?>
</body>
</html>

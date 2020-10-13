<?php
/**
 * The template part for displaying post subscribe section.
 *
 * @package Squaretype
 */

// Subscription.
$subscription_form = get_theme_mod( 'post_subscribe', false );

if ( shortcode_exists( 'powerkit_subscription_form' ) && $subscription_form ) {
	$title = get_theme_mod( 'post_subscribe_title', esc_html__( 'Sign Up for Our Newsletters', 'squaretype' ) );
	$text  = get_theme_mod( 'post_subscribe_text', esc_html__( 'Get notified of the best deals on our WordPress themes.', 'squaretype' ) );
	$name  = get_theme_mod( 'post_subscribe_name', false );

	do_action( 'csco_post_subscribe_before' );
	?>
	<div class="post-subscribe">

		<div class="subscribe-wrap">
			<?php echo do_shortcode( sprintf( '[powerkit_subscription_form display_name="%s" title="%s" text="%s"]', $name, $title, $text ) ); ?>
		</div>

	</div>

	<?php
	do_action( 'csco_post_subscribe_after' );
}

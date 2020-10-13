<?php
/**
 * The template part for displaying post author section.
 *
 * @package Squaretype
 */

$authors = array();

$layout = get_theme_mod( 'post_author_type', 'default' );

if ( csco_coauthors_enabled() ) {
	$authors = csco_get_coauthors();

	if ( count( $authors ) > 1 && 'default' === $layout ) {
		$layout .= ' authors-columns authors-col-6';
	}
}



?>

<?php do_action( 'csco_author_before' ); ?>

<section class="post-author">

	<div class="authors-<?php echo esc_html( $layout ); ?>">

	<?php
	if ( $authors ) {

		foreach ( $authors as $author ) {
			csco_post_author( $author->ID );
		}
	} else {
		csco_post_author();
	}
	?>

	</div>

</section>

<?php do_action( 'csco_author_after' ); ?>

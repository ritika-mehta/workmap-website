<?php
/**
 * Adding Custom Meta Boxes.
 *
 * @package Squaretype
 */

/**
 * Check display metabox layout options
 */
function csco_mb_display_layout_options() {
	// Check Coming Soon Page.
	if ( csco_powerkit_module_enabled( 'coming_soon' ) && powerkit_coming_soon_status() ) {

		$page_id = get_option( 'powerkit_coming_soon_page' );

		if ( (int) get_the_ID() === (int) $page_id ) {
			return;
		}
	}

	return true;
}

/**
 * ==================================
 * Layout Options
 * ==================================
 */

/**
 * Add new meta box
 */
function csco_mb_layout_options() {
	if ( ! csco_mb_display_layout_options() ) {
		return;
	}

	$function = sprintf( 'add_meta_%s', 'box' );

	$function( 'csco_mb_layout_options', esc_html__( 'Layout Options', 'squaretype' ), 'csco_mb_layout_options_callback', array( 'post', 'page', 'product' ), 'side' );
}
add_action( sprintf( 'add_meta_%s', 'boxes' ), 'csco_mb_layout_options', 100 );

/**
 * Callback meta box
 *
 * @param object $post The post object.
 */
function csco_mb_layout_options_callback( $post ) {

	$page_static = array();

	// Add pages static.
	$page_static[] = get_option( 'page_on_front' );
	$page_static[] = get_option( 'page_for_posts' );

	wp_nonce_field( 'layout_options', 'csco_mb_layout_options' );

	$sidebar            = get_post_meta( $post->ID, 'csco_singular_sidebar', true );
	$page_header_type   = get_post_meta( $post->ID, 'csco_page_header_type', true );
	$page_load_nextpost = get_post_meta( $post->ID, 'csco_page_load_nextpost', true );

	// Set Default.
	$sidebar            = $sidebar ? $sidebar : 'default';
	$page_header_type   = $page_header_type ? $page_header_type : 'default';
	$page_load_nextpost = $page_load_nextpost ? $page_load_nextpost : 'default';
	?>
		<h4><?php esc_html_e( 'Sidebar', 'squaretype' ); ?></h4>
		<select name="csco_singular_sidebar" id="csco_singular_sidebar" style="box-sizing: border-box;" class="regular-text">
			<option value="default" <?php selected( 'default', $sidebar ); ?>> <?php esc_html_e( 'Default', 'squaretype' ); ?></option>
			<option value="right" <?php selected( 'right', $sidebar ); ?>> <?php esc_html_e( 'Right Sidebar', 'squaretype' ); ?></option>
			<option value="left" <?php selected( 'left', $sidebar ); ?>> <?php esc_html_e( 'Left Sidebar', 'squaretype' ); ?></option>
			<option value="disabled" <?php selected( 'disabled', $sidebar ); ?>> <?php esc_html_e( 'No Sidebar', 'squaretype' ); ?></option>
		</select>

		<?php if ( ! in_array( (string) $post->ID, $page_static, true ) || 'posts' === get_option( 'show_on_front', 'posts' ) ) { ?>

			<?php if ( 'post' === $post->post_type || 'page' === $post->post_type ) { ?>
				<h4><?php esc_html_e( 'Page Header Type', 'squaretype' ); ?></h4>
				<select name="csco_page_header_type" id="csco_page_header_type" style="box-sizing: border-box;" class="regular-text">
					<option value="default" <?php selected( 'default', $page_header_type ); ?>> <?php esc_html_e( 'Default', 'squaretype' ); ?></option>
					<option value="standard" <?php selected( 'standard', $page_header_type ); ?>> <?php esc_html_e( 'Standard', 'squaretype' ); ?></option>
					<option value="large" <?php selected( 'large', $page_header_type ); ?>> <?php esc_html_e( 'Large', 'squaretype' ); ?></option>
					<option value="title" <?php selected( 'title', $page_header_type ); ?>> <?php esc_html_e( 'Page Title Only', 'squaretype' ); ?></option>
					<option value="none" <?php selected( 'none', $page_header_type ); ?>> <?php esc_html_e( 'None', 'squaretype' ); ?></option>
				</select>
			<?php } ?>

			<?php if ( 'post' === $post->post_type ) { ?>
				<h4><?php esc_html_e( 'Auto Load Next Post', 'squaretype' ); ?></h4>
				<select name="csco_page_load_nextpost" id="csco_page_load_nextpost" style="box-sizing: border-box;" class="regular-text">
					<option value="default" <?php selected( 'default', $page_load_nextpost ); ?>> <?php esc_html_e( 'Default', 'squaretype' ); ?></option>
					<option value="enabled" <?php selected( 'enabled', $page_load_nextpost ); ?>> <?php esc_html_e( 'Enabled', 'squaretype' ); ?></option>
					<option value="disabled" <?php selected( 'disabled', $page_load_nextpost ); ?>> <?php esc_html_e( 'Disabled', 'squaretype' ); ?></option>
				</select>
			<?php } ?>

		<?php } ?>
	<?php
}

/**
 * Save meta box
 *
 * @param int $post_id The post id.
 */
function csco_mb_layout_options_save( $post_id ) {

	// Bail if we're doing an auto save.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// if our nonce isn't there, or we can't verify it, bail.
	if ( ! isset( $_POST['csco_mb_layout_options'] ) || ! wp_verify_nonce( $_POST['csco_mb_layout_options'], 'layout_options' ) ) { // Input var ok; sanitization ok.
		return;
	}

	if ( isset( $_POST['csco_singular_sidebar'] ) ) { // Input var ok; sanitization ok.
		$sidebar = sanitize_text_field( $_POST['csco_singular_sidebar'] ); // Input var ok; sanitization ok.

		update_post_meta( $post_id, 'csco_singular_sidebar', $sidebar );
	}

	if ( isset( $_POST['csco_page_header_type'] ) ) { // Input var ok; sanitization ok.
		$page_header_type = sanitize_text_field( $_POST['csco_page_header_type'] ); // Input var ok; sanitization ok.

		update_post_meta( $post_id, 'csco_page_header_type', $page_header_type );
	}

	if ( isset( $_POST['csco_page_load_nextpost'] ) ) { // Input var ok; sanitization ok.
		$page_load_nextpost = sanitize_text_field( $_POST['csco_page_load_nextpost'] ); // Input var ok; sanitization ok.

		update_post_meta( $post_id, 'csco_page_load_nextpost', $page_load_nextpost );
	}
}
add_action( 'save_post', 'csco_mb_layout_options_save' );

/**
 * ==================================
 * Video Background
 * ==================================
 */

/**
 * Add video meta boxes
 */
function csco_meta_boxe_video_options() {
	$function = sprintf( 'add_meta_%s', 'box' );

	$function( 'csco_mb_video_background', esc_html__( 'Video Background', 'squaretype' ), 'csco_mb_video_options_callback', array( 'post', 'page' ), 'side' );
}
add_action( sprintf( 'add_meta_%s', 'boxes' ), 'csco_meta_boxe_video_options' );

/**
 * Video background markup
 *
 * @param object $post The post object.
 */
function csco_mb_video_options_callback( $post ) {
	wp_nonce_field( 'video_background', 'csco_mb_video_background' );

	$post_video_location      = get_post_meta( $post->ID, 'csco_post_video_location', true );
	$post_video_url           = get_post_meta( $post->ID, 'csco_post_video_url', true );
	$post_video_bg_start_time = get_post_meta( $post->ID, 'csco_post_video_bg_start_time', true );
	$post_video_bg_end_time   = get_post_meta( $post->ID, 'csco_post_video_bg_end_time', true );

	// Set Default Setings.
	$post_video_location      = $post_video_location ? $post_video_location : array();
	$post_video_url           = $post_video_url ? $post_video_url : '';
	$post_video_bg_start_time = $post_video_bg_start_time ? (int) $post_video_bg_start_time : 0;
	$post_video_bg_end_time   = $post_video_bg_end_time ? (int) $post_video_bg_end_time : 0;
	?>
		<!-- Locations -->
		<h4><?php esc_html_e( 'Location', 'squaretype' ); ?></h4>
		<label><input type="checkbox" id="csco_post_video_location" name="csco_post_video_location[]" value="large-header" <?php checked( in_array( 'large-header', $post_video_location, true ) ); ?>><?php esc_html_e( 'Large Header', 'squaretype' ); ?></label><br>
		<?php if ( 'post' === $post->post_type ) { ?>
			<label><input type="checkbox" id="csco_post_video_location" name="csco_post_video_location[]" value="archive" <?php checked( in_array( 'archive', $post_video_location, true ) ); ?>><?php esc_html_e( 'Post Archives', 'squaretype' ); ?></label><br>
			<label><input type="checkbox" id="csco_post_video_location" name="csco_post_video_location[]" value="hero" <?php checked( in_array( 'hero', $post_video_location, true ) ); ?>><?php esc_html_e( 'Hero Section', 'squaretype' ); ?></label><br>
		<?php } ?>
		<!-- YouTube URL -->
		<h4><?php esc_html_e( 'YouTube URL', 'squaretype' ); ?></h4>
		<input style="width:100%" type="text" id="csco_post_video_url" name="csco_post_video_url" value="<?php echo esc_attr( $post_video_url ); ?>">
		<!-- Start Time -->
		<h4><?php esc_html_e( 'Start Time (sec)', 'squaretype' ); ?></h4>
		<input class="small-text" type="number" id="csco_post_video_bg_start_time" name="csco_post_video_bg_start_time" value="<?php echo esc_attr( $post_video_bg_start_time ); ?>">
		<!-- End Time -->
		<h4><?php esc_html_e( 'End Time (sec)', 'squaretype' ); ?></h4>
		<input class="small-text" type="number" id="csco_post_video_bg_end_time" name="csco_post_video_bg_end_time" value="<?php echo esc_attr( $post_video_bg_end_time ); ?>">
	<?php
}

/**
 * Save meta box
 *
 * @param int $post_id The post id.
 */
function csco_mb_video_options_save( $post_id ) {

	// Bail if we're doing an auto save.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// if our nonce isn't there, or we can't verify it, bail.
	if ( isset( $_POST['csco_mb_video_background'] ) && wp_verify_nonce( $_POST['csco_mb_video_background'], 'video_background' ) ) { // Input var ok; sanitization ok.

		if ( isset( $_POST['csco_post_video_location'] ) ) { // Input var ok; sanitization ok.
			$post_video_location = array_map( 'sanitize_text_field', $_POST['csco_post_video_location'] ); // Input var ok; sanitization ok.

			update_post_meta( $post_id, 'csco_post_video_location', $post_video_location );
		} else {
			update_post_meta( $post_id, 'csco_post_video_location', array() );
		}

		if ( isset( $_POST['csco_post_video_url'] ) ) { // Input var ok; sanitization ok.
			$post_video_bg_start_time = esc_url( $_POST['csco_post_video_url'] ); // Input var ok; sanitization ok.

			update_post_meta( $post_id, 'csco_post_video_url', $post_video_bg_start_time );
		}

		if ( isset( $_POST['csco_post_video_bg_start_time'] ) ) { // Input var ok; sanitization ok.
			$post_video_bg_start_time = intval( $_POST['csco_post_video_bg_start_time'] ); // Input var ok; sanitization ok.

			update_post_meta( $post_id, 'csco_post_video_bg_start_time', $post_video_bg_start_time );
		}

		if ( isset( $_POST['csco_post_video_bg_end_time'] ) ) { // Input var ok; sanitization ok.
			$post_video_bg_end_time = intval( $_POST['csco_post_video_bg_end_time'] ); // Input var ok; sanitization ok.

			update_post_meta( $post_id, 'csco_post_video_bg_end_time', $post_video_bg_end_time );
		}
	}
}
add_action( 'save_post', 'csco_mb_video_options_save' );

/**
 * ==================================
 * Category Options
 * ==================================
 */

/**
 * Add fields to Category
 *
 * @param string $taxonomy The taxonomy slug.
 */
function csco_mb_category_options_add( $taxonomy ) {
	wp_nonce_field( 'category_options', 'csco_mb_category_options' );
	?>
		<div class="form-field">
			<label for="csco_brand_color"><?php esc_html_e( 'Brand Color', 'squaretype' ); ?></label>
			<input name="csco_brand_color" value="#000000" class="colorpicker" id="csco_brand_color" />
			<p class="description"><?php esc_html_e( 'The brand color applies to the category label and category title.', 'squaretype' ); ?></p>
		</div>
		<div class="form-field">
			<label for="csco_background_color"><?php esc_html_e( 'Background Color', 'squaretype' ); ?></label>
			<input name="csco_background_color" class="colorpicker" id="csco_background_color" />
			<p class="description"><?php esc_html_e( 'The background color applies to the category page header background. Will not be used, if gradient start and end colors are set.', 'squaretype' ); ?></p>
		</div>
		<div class="form-field">
			<label for="csco_gradient_start_color"><?php esc_html_e( 'Background Gradient Start Color', 'squaretype' ); ?></label>
			<input name="csco_gradient_start_color" class="colorpicker" id="csco_gradient_start_color" />
		</div>
		<div class="form-field">
			<label for="csco_gradient_end_color"><?php esc_html_e( 'Background Gradient End Color', 'squaretype' ); ?></label>
			<input name="csco_gradient_end_color" class="colorpicker" id="csco_gradient_end_color" />
		</div>
		<div class="form-field">
			<label><?php esc_html_e( 'Background Image', 'squaretype' ); ?></label>
			<div class="category-upload-image upload-img-container" data-frame-title="<?php esc_html_e( 'Select or upload image', 'squaretype' ); ?>" data-frame-btn-text="<?php esc_html_e( 'Set image', 'squaretype' ); ?>">
				<p class="uploaded-img-box">
					<span class="uploaded-image"></span>
					<input id="csco_background_image" class="uploaded-img-id" name="csco_background_image" type="hidden"/>
				</p>
				<p class="hide-if-no-js">
					<a class="upload-img-link button button-primary" href="#"><?php esc_html_e( 'Upload image', 'squaretype' ); ?></a>
					<a class="delete-img-link button button-secondary hidden" href="#"><?php esc_html_e( 'Remove image', 'squaretype' ); ?></a>
				</p>
			</div>
		</div>
		<br><br>
	<?php
}
add_action( 'category_add_form_fields', 'csco_mb_category_options_add', 10 );

/**
 * Edit fields from Category
 *
 * @param object $term     Current taxonomy term object.
 * @param string $taxonomy Current taxonomy slug.
 */
function csco_mb_category_options_edit( $term, $taxonomy ) {
	wp_nonce_field( 'category_options', 'csco_mb_category_options' );

	$csco_background_image = get_term_meta( $term->term_id, 'csco_background_image', true );

	$csco_background_image_url = wp_get_attachment_image_url( $csco_background_image, 'large' );

	$color            = get_term_meta( $term->term_id, 'csco_brand_color', true );
	$background_color = get_term_meta( $term->term_id, 'csco_background_color', true );
	$start_color      = get_term_meta( $term->term_id, 'csco_gradient_start_color', true );
	$end_color        = get_term_meta( $term->term_id, 'csco_gradient_end_color', true );

	$color            = ( ! empty( $color ) ) ? $color : '#000000';
	$background_color = ( ! empty( $background_color ) ) ? $background_color : '';
	$start_color      = ( ! empty( $start_color ) ) ? $start_color : '';
	$end_color        = ( ! empty( $end_color ) ) ? $end_color : '';
	?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="csco_brand_color"><?php esc_html_e( 'Brand Color', 'squaretype' ); ?></label></th>
		<td>
			<input name="csco_brand_color" value="<?php echo esc_attr( $color ); ?>" class="colorpicker" id="csco_brand_color" />
			<p class="description"><?php esc_html_e( 'The brand color applies to the category label and category title.', 'squaretype' ); ?></p>
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="csco_background_color"><?php esc_html_e( 'Background Color', 'squaretype' ); ?></label></th>
		<td>
			<input name="csco_background_color" value="<?php echo esc_attr( $background_color ); ?>" class="colorpicker" id="csco_background_color" />
			<p class="description"><?php esc_html_e( 'The background color applies to the category page header background. Will not be used, if gradient start and end colors are set.', 'squaretype' ); ?></p>
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="csco_gradient_start_color"><?php esc_html_e( 'Background Gradient Start Color', 'squaretype' ); ?></label></th>
		<td>
			<input name="csco_gradient_start_color" value="<?php echo esc_attr( $start_color ); ?>" class="colorpicker" id="csco_gradient_start_color" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="csco_gradient_end_color"><?php esc_html_e( 'Background Gradient End Color', 'squaretype' ); ?></label></th>
		<td>
			<input name="csco_gradient_end_color" value="<?php echo esc_attr( $end_color ); ?>" class="colorpicker" id="csco_gradient_end_color" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="csco_background_image"><?php esc_html_e( 'Background Image', 'squaretype' ); ?></label></th>
		<td>
			<div class="category-upload-image upload-img-container" data-frame-title="<?php esc_html_e( 'Select or upload image', 'squaretype' ); ?>" data-frame-btn-text="<?php esc_html_e( 'Set image', 'squaretype' ); ?>">
				<p class="uploaded-img-box">
					<span class="uploaded-image">
						<?php if ( $csco_background_image_url ) : ?>
							<img src="<?php echo esc_url( $csco_background_image_url ); ?>" style="max-width:100%;" />
						<?php endif; ?>
					</span>

					<input id="csco_background_image" class="uploaded-img-id" name="csco_background_image" type="hidden" value="<?php echo esc_attr( $csco_background_image ); ?>" />
				</p>
				<p class="hide-if-no-js">
					<a class="upload-img-link button button-primary <?php echo esc_attr( $csco_background_image_url ? 'hidden' : '' ); ?>" href="#"><?php esc_html_e( 'Upload image', 'squaretype' ); ?></a>
					<a class="delete-img-link button button-secondary <?php echo esc_attr( ! $csco_background_image_url ? 'hidden' : '' ); ?>" href="#"><?php esc_html_e( 'Remove image', 'squaretype' ); ?></a>
				</p>
			</div>
		</td>
	</tr>
	<?php
}
add_action( 'category_edit_form_fields', 'csco_mb_category_options_edit', 10, 2 );

/**
 * Save meta box
 *
 * @param int    $term_id  ID of the term about to be edited.
 * @param string $taxonomy Taxonomy slug of the related term.
 */
function csco_mb_category_options_save( $term_id, $taxonomy ) {

	// Bail if we're doing an auto save.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// if our nonce isn't there, or we can't verify it, bail.
	if ( ! isset( $_POST['csco_mb_category_options'] ) || ! wp_verify_nonce( $_POST['csco_mb_category_options'], 'category_options' ) ) { // Input var ok; sanitization ok.
		return;
	}

	if ( isset( $_POST['csco_brand_color'] ) && ! empty( $_POST['csco_brand_color'] ) ) { // Input var ok; sanitization ok.
		update_term_meta( $term_id, 'csco_brand_color', maybe_hash_hex_color( $_POST['csco_brand_color'] ) ); // Input var ok; sanitization ok.
	} else {
		delete_term_meta( $term_id, 'csco_brand_color' );
	}
	if ( isset( $_POST['csco_background_image'] ) ) { // Input var ok; sanitization ok.
		$csco_background_image = sanitize_text_field( $_POST['csco_background_image'] ); // Input var ok; sanitization ok.

		update_term_meta( $term_id, 'csco_background_image', $csco_background_image );
	}
	if ( isset( $_POST['csco_background_color'] ) && ! empty( $_POST['csco_background_color'] ) ) { // Input var ok; sanitization ok.
		update_term_meta( $term_id, 'csco_background_color', maybe_hash_hex_color( $_POST['csco_background_color'] ) ); // Input var ok; sanitization ok.
	} else {
		delete_term_meta( $term_id, 'csco_background_color' );
	}
	if ( isset( $_POST['csco_gradient_start_color'] ) && ! empty( $_POST['csco_gradient_start_color'] ) ) { // Input var ok; sanitization ok.
		update_term_meta( $term_id, 'csco_gradient_start_color', maybe_hash_hex_color( $_POST['csco_gradient_start_color'] ) ); // Input var ok; sanitization ok.
	} else {
		delete_term_meta( $term_id, 'csco_gradient_start_color' );
	}
	if ( isset( $_POST['csco_gradient_end_color'] ) && ( ! empty( $_POST['csco_gradient_end_color'] ) ) ) { // Input var ok; sanitization ok.
		update_term_meta( $term_id, 'csco_gradient_end_color', maybe_hash_hex_color( $_POST['csco_gradient_end_color'] ) ); // Input var ok; sanitization ok.
	} else {
		delete_term_meta( $term_id, 'csco_gradient_end_color' );
	}
}
add_action( 'created_category', 'csco_mb_category_options_save', 10, 2 );
add_action( 'edited_category', 'csco_mb_category_options_save', 10, 2 );

/**
 * Meta box Enqunue Scripts
 *
 * @param string $page Current page.
 */
function csco_mb_category_enqueue_scripts( $page ) {
	$screen = get_current_screen();

	if ( null !== $screen && 'edit-category' !== $screen->id ) {
		return;
	}

	// Colorpicker Scripts.
	wp_enqueue_script( 'wp-color-picker' );

	// Colorpicker Styles.
	wp_enqueue_style( 'wp-color-picker' );

	// Init Colorpicker.
	ob_start();
	?>
	<script>
	jQuery( document ).ready( function( $ ) {
		$( '.colorpicker' ).wpColorPicker();
	} );
	</script>
	<?php
	wp_add_inline_script( 'wp-color-picker', str_replace( array( '<script>', '</script>' ), '', ob_get_clean() ) );

	// Init Media Control.
	wp_enqueue_media();

	ob_start();
	?>
	<script>
	jQuery( document ).ready(function( $ ) {

		var powerkitMediaFrame;
		/* Set all variables to be used in scope */
		var metaBox = '.category-upload-image';

		/* Add Image Link */
		$( metaBox ).find( '.upload-img-link' ).live( 'click', function( event ){
			event.preventDefault();

			var parentContainer = $( this ).parents( metaBox );

			// Options.
			var options = {
				title: parentContainer.data( 'frame-title' ) ? parentContainer.data( 'frame-title' ) : 'Select or Upload Media',
				button: {
					text: parentContainer.data( 'frame-btn-text' ) ? parentContainer.data( 'frame-btn-text' ) : 'Use this media',
				},
				library : { type : 'image' },
				multiple: false // Set to true to allow multiple files to be selected.
			};

			// Create a new media frame
			powerkitMediaFrame = wp.media( options );

			// When an image is selected in the media frame...
			powerkitMediaFrame.on( 'select', function() {

				// Get media attachment details from the frame state.
				var attachment = powerkitMediaFrame.state().get('selection').first().toJSON();

				// Send the attachment URL to our custom image input field.
				parentContainer.find( '.uploaded-image' ).html( '<img src="' + attachment.url + '" style="max-width:100%;"/>' );
				parentContainer.find( '.uploaded-img-id' ).val( attachment.id ).change();
				parentContainer.find( '.upload-img-link' ).addClass( 'hidden' );
				parentContainer.find( '.delete-img-link' ).removeClass( 'hidden' );

				powerkitMediaFrame.close();
			});

			// Finally, open the modal on click.
			powerkitMediaFrame.open();
		});


		/* Delete Image Link */
		$( metaBox ).find( '.delete-img-link' ).live( 'click', function( event ){
			event.preventDefault();

			$( this ).parents( metaBox ).find( '.uploaded-image' ).html( '' );
			$( this ).parents( metaBox ).find( '.upload-img-link' ).removeClass( 'hidden' );
			$( this ).parents( metaBox ).find( '.delete-img-link' ).addClass( 'hidden' );
			$( this ).parents( metaBox ).find( '.uploaded-img-id' ).val( '' ).change();
		});
	});

	jQuery( document ).ajaxSuccess(function(e, request, settings){
		let action   = settings.data.indexOf( 'action=add-tag' );
		let screen   = settings.data.indexOf( 'screen=edit-category' );
		let taxonomy = settings.data.indexOf( 'taxonomy=category' );

		if( action > -1 && screen > -1 && taxonomy > -1 ){
			$( '.delete-img-link' ).click();
		}
	});
	</script>
	<?php
	wp_add_inline_script( 'jquery-core', str_replace( array( '<script>', '</script>' ), '', ob_get_clean() ) );
}
add_action( 'admin_enqueue_scripts', 'csco_mb_category_enqueue_scripts' );

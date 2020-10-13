<?php
/**
 * Customizer theme presets.
 *
 * @package Squaretype
 */

add_action( 'customize_register', function( $wp_customize ) {
	if ( class_exists( 'Kirki_Control_Base' ) ) {
		/**
		 * The custom control class
		 */
		class CSCO_Presets_Core extends Kirki_Control_Base {
			/**
			 * Control's Type.
			 *
			 * @since 3.4.0
			 * @var string
			 */
			public $type = 'presets';

			/**
			 * Renders the control content.
			 *
			 * @since 0.1
			 * @access protected
			 * @return void
			 */
			protected function render_content() {
				?>
					<?php $presets = apply_filters( 'csco_theme_presets', array() ); ?>

					<?php if ( $presets ) { ?>
						<label>
							<span class="customize-control-title"><?php esc_html_e( 'Color Palettes', 'squaretype' ); ?></span>
						</label>

						<div class="csco-theme-presets">
							<?php
							foreach ( $presets as $key => $preset ) {
								$c1 = isset( $preset[0] ) ? $preset[0] : 'transparent';
								$c2 = isset( $preset[1] ) ? $preset[1] : 'transparent';
								$c3 = isset( $preset[2] ) ? $preset[2] : 'transparent';
								$c4 = isset( $preset[3] ) ? $preset[3] : 'transparent';
								$c5 = isset( $preset[4] ) ? $preset[4] : 'transparent';

								$style = "background: linear-gradient(to right, {$c1} 20%, {$c2} 20%, {$c2} 40%, {$c3} 40%, {$c3} 60%, {$c4} 60%, {$c4} 80%, {$c5} 80%)";
								?>
									<div class="preset">
										<div class="gradient" style="<?php echo esc_attr( $style ); ?>"></div>
										<button preset="<?php echo esc_attr( $key ); ?>" type="button" class="csco-set-preset button"><?php esc_html_e( 'Activate', 'squaretype' ); ?></button>
									</div>
								<?php
							}
							?>
						</div>
					<?php } ?>
				<?php
			}
		}

		// Register our custom control with Kirki.
		add_filter( 'kirki_control_types', function( $controls ) {
			$controls['presets'] = 'CSCO_Presets_Core';
			return $controls;
		} );
	}
} );

/**
 * The main theme presets class.
 *
 * @since 0.1
 */
class CSCO_Presets_Init {

	/**
	 * WP_Customize_Manager
	 *
	 * @var array $wp_customize  WP_Customize_Manager.
	 */
	private $wp_customize;

	/**
	 * __construct
	 *
	 * This function will setup the field type data
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register' ) );

		add_action( 'wp_ajax_customizer_set_preset', array( $this, 'set_preset_customizer_ajax' ) );
		add_action( 'customize_controls_print_scripts', array( $this, 'set_preset_customizer_script' ) );
	}

	/**
	 * Init in customizer.
	 *
	 * @since 0.1
	 * @param object $wp_customize An instance of WP_Customize_Manager.
	 * @return void
	 */
	public function register( $wp_customize ) {
		$this->wp_customize = $wp_customize;
	}

	/**
	 * Handler customizer ajax
	 */
	public function set_preset_customizer_ajax() {
		if ( ! $this->wp_customize->is_preview() ) {
			wp_send_json_error( 'not_preview' );
		}

		if ( ! check_ajax_referer( 'customizer-preset', 'nonce', false ) ) {
			wp_send_json_error( 'invalid_nonce' );
		}

		if ( ! isset( $_POST['pkey'] ) ) { // Input var ok.
			wp_send_json_error( 'invalid_preset' );
		}

		$this->set_preset( sanitize_text_field( $_POST['pkey'] ) ); // Input var ok.

		wp_send_json_success();
	}

	/**
	 * Lightens/darkens a given colour.
	 *
	 * @param string $hexcolor Hexcolor.
	 * @param float  $percent  Decima.
	 */
	public function color_luminance( $hexcolor, $percent ) {
		if ( strlen( $hexcolor ) < 6 ) {
			$hexcolor = $hexcolor[0] . $hexcolor[0] . $hexcolor[1] . $hexcolor[1] . $hexcolor[2] . $hexcolor[2];
		}
		$hexcolor = array_map( 'hexdec', str_split( str_pad( str_replace( '#', '', $hexcolor ), 6, '0' ), 2 ) );

		foreach ( $hexcolor as $i => $color ) {
			$from           = $percent < 0 ? 0 : $color;
			$to             = $percent < 0 ? $color : 255;
			$pvalue         = ceil( ( $to - $from ) * $percent );
			$hexcolor[ $i ] = str_pad( dechex( $color + $pvalue ), 2, '0', STR_PAD_LEFT );
		}

		return '#' . implode( $hexcolor );
	}

	/**
	 * Set settings of preset.
	 *
	 * @param int $key The key of preset.
	 */
	public function set_preset( $key ) {
		$presets = apply_filters( 'csco_theme_presets', array() );

		if ( ! isset( $presets[ $key ] ) ) {
			return;
		}

		$settings = $presets[ $key ];

		// Primary Color.
		if ( isset( $settings[0] ) ) {
			set_theme_mod( 'color_primary', $settings[0] );
		}

		// Terms.
		$args = array(
			'taxonomy'        => 'category',
			'hide_empty'      => false,
			'fields'          => 'ids',
			'parent'          => 0,
			'suppress_filter' => true,
		);

		$terms = get_terms( $args );

		$counter = 1;

		foreach ( $terms as $term_id ) {

			if ( $counter > 4 ) {
				$counter = 1;
			}

			if ( ! isset( $settings[ $counter ] ) ) {
				continue;
			}

			$color = $settings[ $counter ];

			update_term_meta( $term_id, 'csco_brand_color', $color );
			update_term_meta( $term_id, 'csco_gradient_start_color', $this->color_luminance( $color, -0.2 ) );
			update_term_meta( $term_id, 'csco_gradient_end_color', $this->color_luminance( $color, 0.2 ) );

			// Get children terms.
			$args = array(
				'taxonomy'        => 'category',
				'hide_empty'      => false,
				'fields'          => 'ids',
				'suppress_filter' => true,
				'child_of'        => $term_id,
			);

			$children = get_terms( $args );

			foreach ( $children as $child_id ) {
				update_term_meta( $child_id, 'csco_brand_color', $color );
				update_term_meta( $child_id, 'csco_gradient_start_color', $this->color_luminance( $color, -0.2 ) );
				update_term_meta( $child_id, 'csco_gradient_end_color', $this->color_luminance( $color, 0.2 ) );
			}

			$counter++;
		}
	}

	/**
	 * Enqueue customizer script
	 */
	public function set_preset_customizer_script() {
	?>
		<script>
			jQuery(function ($) {
				$('body').on('click', '.csco-set-preset', function (event) {
					event.preventDefault();

					var data = {
						wp_customize: 'on',
						action: 'customizer_set_preset',
						pkey: $(this).attr( 'preset' ),
						nonce: '<?php echo esc_attr( wp_create_nonce( 'customizer-preset' ) ); ?>'
					};

					var r = confirm( "<?php esc_html_e( 'Warning: activating a preset will reset all unsaved changes, the current primary color and all category colors. Make sure you save your current modifications by clicking the “Publish” button before proceeding.', 'squaretype' ); ?>" );

					if (!r) return;

					$(this).attr('disabled', 'disabled');

					$(this).siblings('.spinner').addClass('is-active');

					$('#customize-preview').css( 'opacity', ' 0.6' );

					$.post(ajaxurl, data, function ( response ) {
						wp.customize.state('saved').set(true);

						try {
							var info = $.parseJSON( JSON.stringify(response) );

							if( typeof info.success != 'undefined' && info.success == true ){
								location.reload();
							} else {
								if( typeof info.data != 'undefined' ){
									alert( info.data );
								} else {
									alert( '<?php esc_html_e( 'Server error!', 'squaretype' ); ?>' );
								}
							}
						} catch (e) {
							alert( response );
						}
					});

					return false;
				});
			});
		</script>
	<?php
	}
}
new CSCO_Presets_Init();

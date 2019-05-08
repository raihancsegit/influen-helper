<?php

if ( ! class_exists( 'TB_VC_Radio' ) ) {

	class TB_VC_Radio {

		public function __construct() {
			add_action( 'vc_before_init', array( $this, 'register' ) );
			add_action( 'admin_head', array( $this, 'add_style' ) );
		}

		public function add_style() {
			?>
			<style>
				.tb-radio label {
					display: block;
					margin-bottom: 5px;
				}
				.tb-radio-input {
					width: auto !important;
				}
			</style>
			<?php
		}

		public function render( $settings, $value ) {
			if ( empty( $settings['value'] ) || ! is_array( $settings['value'] ) ) {
				return sprintf( esc_html__( 'Misconfiguration of param: %s, expected an array.', 'domain' ),
					$settings['param_name']
				);
			}

			foreach ( $settings['value'] as $label => $val ) {
				$html .= sprintf(
					'<label><input type="radio" name="%s" class="tb-radio-input js-vc-radio-input" value="%s" %s> %s</label>',
					esc_attr( $settings['param_name'] . '_input' ),
					esc_attr( $val ),
					checked( $val, $value, false ),
					esc_html( $label )
				);
			}

			$html .= sprintf(
				'<input type="hidden" name="%s" value="%s" class="%s">',
				esc_attr( $settings['param_name'] ),
				esc_attr( $value ),
				esc_attr( 'wpb_vc_param_value ' . $settings['param_name'] . ' ' . $settings['type'] . '_field' )
			);

			return '<div class="tb-radio js-vc-radio">' . $html . '</div>';
		}

		public function register() {
			vc_add_shortcode_param( 'tb_radio', array( $this, 'render' ), get_template_directory_uri() . '/radio-image.js?10' );
		}

	}

	new TB_VC_Radio;
}

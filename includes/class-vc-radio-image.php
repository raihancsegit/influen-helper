<?php

if ( ! class_exists( 'TB_VC_Radio_Image' ) ) {

    class TB_VC_Radio_Image {

        public function __construct() {
            add_action( 'vc_before_init', array( $this, 'register' ) );
            add_action( 'admin_head', array( $this, 'add_style' ) );
        }

        public function add_style() {
            ?>
            <style>
                .tb-radio-image,
                .tb-radio-image * {
                    -webkit-box-sizing: border-box;
                    box-sizing: border-box;
                }
                .tb-radio-image {
                    margin: -5px;
                }
                .tb-radio-image label {
                    display: inline-block;
                    padding: 5px;
                    width: 25%;
                }
                .tb-radio-image label > img {
                    max-width: 100%;
                    vertical-align: bottom;
                    background-color: #fff;
                    border: 3px solid #ddd;
                    padding: 5px;
                    border-radius: 3px;
                    opacity: 0.75;
                    -moz-transition: all 0.15s ease-out;
                    -o-transition: all 0.15s ease-out;
                    -webkit-transition: all 0.15s ease-out;
                    transition: all 0.15s ease-out;
                }
                .tb-radio-image-input {
                    display: none !important;
                }
                .tb-radio-image-input:checked + img {
                    border-color: #0073aa;
                    opacity: 1;
                }
            </style>
            <?php
        }

        public function render( $settings, $value ) {
            if ( empty( $settings['value'] ) || ! is_array( $settings['value'] ) ) {
                return sprintf( esc_html__( 'Misconfiguration of param: %s, expected an array.', 'cibus' ),
                    $settings['param_name']
                );
            }

            foreach ( $settings['value'] as $src => $val ) {
                $html .= sprintf(
                    '<label><input type="radio" name="%s" class="tb-radio-image-input js-vc-radio-input" value="%s" %s><img src="%s" alt="%s"></label>',
                    esc_attr( $settings['param_name'] . '_input' ),
                    esc_attr( $val ),
                    checked( $val, $value, false ),
                    esc_url( $src ),
                    esc_attr( $val )
                );
            }

            $html .= sprintf(
                '<input type="hidden" name="%s" value="%s" class="%s">',
                esc_attr( $settings['param_name'] ),
                esc_attr( $value ),
                esc_attr( 'wpb_vc_param_value ' . $settings['param_name'] . ' ' . $settings['type'] . '_field' )
            );

            return '<div class="tb-radio-image js-vc-radio">' . $html . '</div>';
        }

        public function register() {
            vc_add_shortcode_param( 'tb_radio_image', array( $this, 'render' ), CIBUS_HELPER_URL . 'assets/js/radio-image.js' );
        }

    }

    new TB_VC_Radio_Image;
}

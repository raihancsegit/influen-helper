<?php
/**
 * Influen shortcode
 *
 * @package Influen helper
 * @author shifftechbd <shifftechbd@gmail.com>
 */

class Influen_Pricing extends Influen_Shortcode
{

    protected $tag = 'roots_heading';

    /**
     * Set shortcode directory
     * @return string Directory path
     */
    protected function set_dir()
    {
        return __DIR__;
    }

    /**
     * Map this shortcode with visual composer
     * @return array
     */
    protected function map()
    {
        return array(
            'name'        => esc_html__('Pricing', 'influen'),
            'description' => esc_html__('Pricing Section', 'influen'),
            'base'        => $this->get_tag(),
            'category'    => esc_html__('Influen', 'influen'),
            'icon'        => $this->get_icon('heading'),
            'params'      => array(

                array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__( 'Visual Style', 'influen' ),
                    'param_name' => 'style',
                    'value'      => array(
                            esc_html__( 'Style One', 'influen' )   => 'styleone',
                            esc_html__( 'Style Two', 'influen' )   => 'styletwo',
                            esc_html__( 'Style There', 'influen' ) => 'stylethere',
                        ),
                    ),

                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Title', 'influen' ),
                        'param_name'  => 'title',
                        'admin_label' => true,
                        'value'       => esc_html__( 'Standard', 'influen' )
                        ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__( 'Currency', 'influen' ),
                        'param_name' => 'currency',
                        'value'      => '$',
                        ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Price', 'influen' ),
                        'description' => esc_html__( 'Add price without currency.', 'influen' ),
                        'param_name'  => 'price',
                        'value'       => '9.99',
                        ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Duration', 'influen' ),
                        'param_name'  => 'duration',
                        'value'       => esc_html__( 'Per Month', 'influen' )
                        ),
                    array(
                        'type'        => 'textarea',
                        'heading'     => esc_html__( 'Features', 'influen' ),
                        'description' => esc_html__( 'Add each feature in new line.', 'influen' ),
                        'param_name'  => 'content',
                        'value'       => esc_html__( "- Entrance \n- Free Lunch & Snacks\n- Custom Badge", 'influen' )
                        ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Button Text', 'influen' ),
                        'param_name'  => 'button_text',
                        'value'       => esc_html__( 'Purchase', 'influen' )
                        ),
                    array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__( 'Button Link', 'influen' ),
                        'param_name' => 'button_link',
                        'value'      => '#'
                        ),
                    array(
                        'type'        => 'checkbox',
                        'heading'     => esc_html__( 'Featured Package', 'influen' ),
                        'param_name'  => 'featured',
                        'value'       => 'false',
                        ),



            ),
        );
    }

    /**
     * Render this shortcode
     * @param  array $atts
     * @param  string $content
     * @return string
     */
    public function render($atts, $content = null)
    {
        $defaults = array(
            'style'       => 'styleone',
            'title'       => __( 'Standard', 'tevent' ),
            'currency'    => '$',
            'price'       => '10',
            'duration'    => __( 'Per Month', 'tevent' ),
            'button_text' => __( 'Purchase', 'tevent' ),
            'button_link' => '#',
            'featured'    => 'false',
            
        );

        $atts  = shortcode_atts($defaults, $atts);
        $type  = influen_sanitize_param( $atts['style'] );
        $types = array('styleone', 'styletwo','stylethere');
        $view  = $this->get_view( $type );

        ob_start();
        if ( in_array( $type, $types ) && file_exists( $view ) ) {
            include( $view );
        }
        return ob_get_clean();
    }
}

new Influen_Pricing;

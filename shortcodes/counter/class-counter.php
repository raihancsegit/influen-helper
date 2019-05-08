<?php
/**
 * Influen shortcode
 *
 * @package Influen helper
 * @author shifftechbd <shifftechbd@gmail.com>
 */

class Influen_Counter extends Influen_Shortcode
{

    protected $tag = 'roots_counter';

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
            'name'        => esc_html__('Counter', 'influen'),
            'description' => esc_html__('Counter Section', 'influen'),
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
                            esc_html__( 'Style There', 'influen' )   => 'stylethere',
                        ),
                    ),

                    array(
                        'type'       => 'attach_image',
                        'heading'    => esc_html__('BG Image', 'influen'),
                        'param_name' => 'image',
                    ),
    
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Counter Section', 'influen'),
                        'param_name' => 'counter',
                        'params' => array(
                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__('Title', 'influen'),
                                'param_name'  => 'title',
                                'admin_label' => true,
                                'description' => esc_html__('Add counter  title text.', 'influen'),
                                'value'       => esc_html__('EXPART MEMBER', 'influen'),
                                
                            ),
                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__('Counter Value', 'influen'),
                                'param_name'  => 'cou_val',
                                'admin_label' => true,
                                'description' => esc_html__('Add counter value', 'influen'),
                                'value'       => esc_html__('1000', 'influen'),
            
                            ),
                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__('Icon Class', 'influen'),
                                'param_name'  => 'icon_class',
                                'admin_label' => true,
                                'description' => esc_html__('Add counter value', 'influen'),
                                'value'     => 'flaticon-replace'
            
                            ),
                            
                        ),
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
            'style'   => 'styleone',
            'image'   => '',
            'counter' => '',
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

new Influen_Counter;

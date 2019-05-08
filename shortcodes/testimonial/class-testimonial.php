<?php
/**
 * Influen shortcode
 *
 * @package Influen helper
 * @author shifftechbd <shifftechbd@gmail.com>
 */

class Influen_Testimonial extends Influen_Shortcode
{

    protected $tag = 'roots_testimonial';

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
            'name'        => esc_html__('Testimonial', 'influen'),
            'description' => esc_html__('Counter Testimonial', 'influen'),
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
                        'param_name' => 'testimonial',
                        'params' => array(

                            array(
                                'type'       => 'attach_image',
                                'heading'    => esc_html__('Image', 'influen'),
                                'param_name' => 'image',
                            ),

                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__('Title One', 'influen'),
                                'param_name'  => 'title_one',
                                'admin_label' => true,
                                'description' => esc_html__('Add testimonial title one text.', 'influen'),
                                'value'       => esc_html__('Customer', 'influen'),
                                'dependency' => array(
                                    'element' => 'style',
                                    'value'   => array('styleone')
                                    ),
                                
                            ),
                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__('Title Two', 'influen'),
                                'param_name'  => 'title_two',
                                'admin_label' => true,
                                'description' => esc_html__('Add testimonial title two text.', 'influen'),
                                'value'       => esc_html__('Says', 'influen'),
                                'dependency' => array(
                                    'element' => 'style',
                                    'value'   => array('styleone')
                                    ),
                                
                            ),
                            array(
                                'type'        => 'textarea',
                                'heading'     => esc_html__('Content', 'influen'),
                                'param_name'  => 'con',
                                'admin_label' => true,
                                'description' => esc_html__('Add testimonial content', 'influen'),
                                'value'       => esc_html__('Customer is a branch of mathematics concerned with questionss of shape, size, relative position of figures, and the properti space. A mathematician who works in the field of unknown printer took a galley of type and scrambledgeometry.', 'influen'),
            
                            ),
                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__('Name', 'influen'),
                                'param_name'  => 'name',
                                'admin_label' => true,
                                'description' => esc_html__('Add testmonials name', 'influen'),
                                'value'       => esc_html__('Emily Dickinson', 'influen'),
            
                            ),
                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__('Position', 'influen'),
                                'param_name'  => 'position',
                                'admin_label' => true,
                                'description' => esc_html__('Add testmonials position', 'influen'),
                                'value'       => esc_html__('Senior Executive', 'influen'),
            
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
            'style'       => 'styleone',
            'testimonial' => '',
            'image'       => '',
            'counter'     => '',
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

new Influen_Testimonial;

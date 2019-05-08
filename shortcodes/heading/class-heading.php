<?php
/**
 * Influen shortcode
 *
 * @package Influen helper
 * @author shifftechbd <shifftechbd@gmail.com>
 */

class Influen_Heading extends Influen_Shortcode
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
            'name'        => esc_html__('Heading', 'influen'),
            'description' => esc_html__('Heading Section', 'influen'),
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
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Title', 'influen' ),
                    'param_name' => 'title',
                    'dependency' => array(
                        'element' => 'style',
                        'value'   => array('styleone')
                        ),
                    'value' => esc_html__('latest news','influen')
                    ),

                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__( 'Pre Title', 'influen' ),
                    'param_name' => 'pre_title',
                    'dependency' => array(
                        'element' => 'style',
                        'value'   => 'styletwo',
                        ),
                    'value' => esc_html__('Our blog','influen')
                    ),

                array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__( 'Title One', 'influen' ),
                        'param_name' => 'heading2_title_one',
                        'dependency' => array(
                            'element' => 'style',
                            'value'   => array('styletwo')
                            ),
                        'value' => esc_html__('latest','influen')
                    ),

                array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__( 'Title Two', 'influen' ),
                        'param_name' => 'heading2_title_two',
                        'dependency' => array(
                            'element' => 'style',
                            'value'   => array('styletwo')
                            ),
                        'value' => esc_html__('News','influen')
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
            'style'              => 'styleone',
            'title'              => '',
            'heading2_title_one' => '',
            'heading2_title_two' => '',
            'pre_title'          => '',
            
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

new Influen_Heading;

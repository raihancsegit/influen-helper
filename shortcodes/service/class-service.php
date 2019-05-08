<?php
/**
 * Influen shortcode
 *
 * @package Influen helper
 * @author shifftechbd <shifftechbd@gmail.com>
 */

class Influen_Service extends Influen_Shortcode
{

    protected $tag = 'roots_service';

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
            'name'        => esc_html__('Service', 'influen'),
            'description' => esc_html__('Service Section', 'influen'),
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
                            esc_html__( 'Style Four', 'influen' )  => 'stylefour',
                            esc_html__( 'Style Five', 'influen' )  => 'stylefive',
                            esc_html__( 'Style Six', 'influen' )   => 'stylesix',
                            esc_html__( 'Style Six', 'influen' )   => 'stylesix',
                            esc_html__( 'Style Seven', 'influen' ) => 'styleseven',
                            esc_html__( 'Style Eight', 'influen' ) => 'styleeight',
                        ),
                    ),

              
                array(
                        'type'       => 'textfield',
                        'heading'    => esc_html__( 'Pre Title', 'influen' ),
                        'param_name' => 'pre_title',
                        'dependency' => array(
                            'element' => 'style',
                            'value'   => 'stylefour',
                            ),
                        'value' => esc_html__('Our blog','influen')
                        ),
    
                array(
                            'type'       => 'textfield',
                            'heading'    => esc_html__( 'Title One', 'influen' ),
                            'param_name' => 'heading2_title_one',
                            'dependency' => array(
                                'element' => 'style',
                                'value'   => array('stylefour')
                                ),
                            'value' => esc_html__('latest','influen')
                        ),
    
                array(
                            'type'       => 'textfield',
                            'heading'    => esc_html__( 'Title Two', 'influen' ),
                            'param_name' => 'heading2_title_two',
                            'dependency' => array(
                                'element' => 'style',
                                'value'   => array('stylefour')
                                ),
                            'value' => esc_html__('News','influen')
                        ),

                array(
                    "type"          => "dropdown_multi",
                    "heading"       => esc_html__("Category Filter:", 'influen'),
                    "param_name"    => "categories",
                    "value"         => influen_get_custom_terms_vc('service-category'),
                    "description"   => esc_html__("Select categories to display post by filtering with category", 'influen'),
                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Number Of Item', 'influen' ),
                    'param_name'  => 'items',
                    'description' => esc_html__( 'keep the field blank to show all item', 'influen' ),
                    ),

                array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__( 'Order by', 'influen' ),
                    'param_name' => 'orderby',
                    'value'      => array(
                        esc_html__( 'Date', 'influen' )          => 'date',
                        esc_html__( 'Title', 'influen' )         => 'title',
                        esc_html__( 'Menu order', 'influen' )    => 'menu_order',
                        ),
                    
                    ),

                array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__( 'Order', 'influen' ),
                    'param_name' => 'order',
                    'value'      => array(
                        esc_html__( 'Descending', 'influen' ) => 'DESC',
                        esc_html__( 'Ascending', 'influen' )  => 'ASC'
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
            'style'              => 'styleone',
            'pre_title'          => '',
            'heading2_title_one' => '',
            'heading2_title_two' => '',
            'categories'         => '',
            'items'              => '',
            'orderby'            => '',
            'order'              => '',
        );

        $atts  = shortcode_atts($defaults, $atts);
        $type  = influen_sanitize_param( $atts['style'] );
        $types = array('styleone', 'styletwo','stylethere','stylefour','stylefive','stylesix','styleseven','styleeight');
        $view  = $this->get_view( $type );

        ob_start();
        if ( in_array( $type, $types ) && file_exists( $view ) ) {
            include( $view );
        }
        return ob_get_clean();
    }
}

new Influen_Service;

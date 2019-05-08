<?php
/**
 * Influen shortcode
 *
 * @package Influen helper
 * @author shifftechbd <shifftechbd@gmail.com>
 */

class Influen_Client extends Influen_Shortcode
{

    protected $tag = 'roots_client';

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
            'name'        => esc_html__('Client Logo', 'influen'),
            'description' => esc_html__('Client Logo Section', 'influen'),
            'base'        => $this->get_tag(),
            'category'    => esc_html__('Influen', 'influen'),
            'icon'        => $this->get_icon('heading'),
            'params'      => array(

                
    
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Counter Section', 'influen'),
                        'param_name' => 'client',
                        'params' => array(

                            array(
                                'type'       => 'attach_image',
                                'heading'    => esc_html__('BG Image', 'influen'),
                                'param_name' => 'image',
                            ),
                            array(
                                'type'        => 'textfield',
                                'heading'     => esc_html__('Logo URL', 'influen'),
                                'param_name'  => 'logo_url',
                                'admin_label' => true,
                                'description' => esc_html__('Add logo url here.', 'influen'),
                                'value'       => esc_html__('#', 'influen'),
                                
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
            'client'  => '',
        );

        $atts = shortcode_atts($defaults, $atts);
        $view = $this->get_view('view');

        ob_start();
        if (file_exists($view)) {
            include $view;
        }
        return ob_get_clean();
    }
}

new Influen_Client;

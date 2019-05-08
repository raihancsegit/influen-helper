<?php
/**
 * about  shortcode
 *
 * @package influen helper
 * @author ThemeRoots <shifttech@gmail.com>
 */

class Influen_About extends Influen_Shortcode
{

    protected $tag = 'roots_about';

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
            'name'        => esc_html__('About', 'influen'),
            'description' => esc_html__('About Section', 'influen'),
            'base'        => $this->get_tag(),
            'category'    => esc_html__('Influen', 'influen'),
            'icon'        => $this->get_icon('heading'),
            'params'      => array(

                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Title', 'influen'),
                    'param_name'  => 'title',
                    'admin_label' => true,

                ),

                array(
                    'type'       => 'textarea_html',
                    'heading'    => esc_html__( 'Content', 'influen' ),
                    'param_name' => 'content',
                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Time Table Link', 'influen'),
                    'param_name'  => 't_link',
                    'admin_label' => true,

                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Video URL', 'influen'),
                    'param_name'  => 'v_url',
                    'admin_label' => true,

                ),
                array(
                    'type'       => 'attach_image',
                    'heading'    => esc_html__('Image', 'influen'),
                    'param_name' => 'image',
                ),

                array(
                    'type'       => 'param_group',
                    'heading'    => esc_html__('Item List', 'influen'),
                    'param_name' => 'item',
                    'params'     => array(
                        array(
                            'type'       => 'textfield',
                            'heading'    => esc_html__('Title', 'influen'),
                            'param_name' => 'title',
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
            'title'  => '',
            't_link' => '',
            'v_url'  => '',
            'image'  => '',
            'item'   => '',
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

new Influen_About;

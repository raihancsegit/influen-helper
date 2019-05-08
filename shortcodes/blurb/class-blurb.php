<?php
/**
 * about  shortcode
 *
 * @package influen helper
 * @author ThemeRoots <shifttech@gmail.com>
 */

class Influen_Blurb extends Influen_Shortcode
{

    protected $tag = 'roots_blurb';

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
            'name'        => esc_html__('Blurb', 'influen'),
            'description' => esc_html__('Blurbs Section', 'influen'),
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
                    'type'       => 'textarea',
                    'heading'    => esc_html__( 'Content', 'influen' ),
                    'param_name' => 'desc',
                ),

                array(
                    'type'       => 'attach_image',
                    'heading'    => esc_html__('Image', 'influen'),
                    'param_name' => 'image',
                ),
                array(
                    'type'       => 'attach_image',
                    'heading'    => esc_html__('Icon Image', 'influen'),
                    'param_name' => 'icon_image',
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
            'title'      => '',
            'desc'       => '',
            'image'      => '',
            'icon_image' => '',
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

new Influen_Blurb;

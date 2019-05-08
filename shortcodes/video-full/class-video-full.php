<?php
/**
 * about  shortcode
 *
 * @package influen helper
 * @author ThemeRoots <shifttech@gmail.com>
 */

class Influen_Video_full extends Influen_Shortcode
{

    protected $tag = 'roots_video_full';

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
            'name'        => esc_html__('Video Full Width', 'influen'),
            'description' => esc_html__('Video Full Width Section', 'influen'),
            'base'        => $this->get_tag(),
            'category'    => esc_html__('Influen', 'influen'),
            'icon'        => $this->get_icon('heading'),
            'params'      => array(

            
                array(
                    'type'       => 'textarea',
                    'heading'    => esc_html__( 'Content', 'influen' ),
                    'param_name' => 'text',
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
            'text'  => '',
            'v_url' => '',
            'image' => '',
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

new Influen_Video_full;

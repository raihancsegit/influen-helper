<?php
// Adds widget: footer one newslatter
class Footeronenewslatter_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'footeronenewslatter_widget',
			esc_html__( 'MEDIM:Footer One Newslatter', 'medim' )
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Content',
			'id' => 'content_textarea',
			'default' => 'Lorem ipsum dolor sit amet, conse ctetu Aenean commodo ',
			'type' => 'textarea',
		),
		array(
			'label' => 'Facebook URL',
			'id' => 'facebookurl_text',
			'default' => '#',
			'type' => 'text',
		),
		array(
			'label' => 'Twitter URL',
			'id' => 'twitterurl_text',
			'default' => '#',
			'type' => 'text',
		),
		array(
			'label' => 'Instagram URL',
			'id' => 'instagramurl_text',
			'default' => '#',
			'type' => 'text',
		),
		array(
			'label' => 'Pinterest URL',
			'id' => 'pinteresturl_text',
			'default' => '#',
			'type' => 'text',
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

        ?>
                    <div class="footer-widget">
                        
                        <p>
                           <?php echo $instance['content_textarea'];?>
                        </p>
                        <?php echo do_shortcode('[mc4wp_form id="684"]')?>
                        <div class="social-icon circle-link position-relative">
                            <a href="<?php echo esc_url($instance['facebookurl_text']);?>" class="text-default rounded-circle s-dp-1-3-15">
                                    <i class="icofont-facebook"></i>
                                </a>
                            <a href="<?php echo esc_url($instance['twitterurl_text']);?>" class="text-default rounded-circle s-dp-1-3-15">
                                    <i class="icofont-twitter"></i>
                                </a>
                            <a href="<?php echo esc_url($instance['instagramurl_text']);?>" class="text-default rounded-circle s-dp-1-3-15">
                                    <i class="icofont-instagram"></i>
                                </a>
                            <a href="<?php echo esc_url($instance['pinteresturl_text']);?>" class="text-default rounded-circle s-dp-1-3-15">
                                    <i class="icofont-pinterest"></i>
                                </a>
                        </div>
                    </div>
              
        <?php
		
		echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'medim' );
			switch ( $widget_field['type'] ) {
				case 'textarea':
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'medim' ).':</label> ';
					$output .= '<textarea class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" rows="6" cols="6" value="'.esc_attr( $widget_value ).'">'.$widget_value.'</textarea>';
					$output .= '</p>';
					break;
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'medim' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'medim' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'medim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_footeronenewslatter_widget() {
	register_widget( 'Footeronenewslatter_Widget' );
}
add_action( 'widgets_init', 'register_footeronenewslatter_widget' );
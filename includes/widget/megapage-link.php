<?php
// Adds widget: page link
class MegaPagelink_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'megapagelink_widget',
			esc_html__( 'MEDIM::Mega Page Link', 'medim' )
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Page One Name',
			'id' => 'pageonename_text',
			'default' => 'about',
			'type' => 'text',
		),
		array(
			'label' => 'Page One Link',
			'id' => 'pageonelink_text',
			'default' => '#',
			'type' => 'text',
		),
		array(
			'label' => 'Page Two Name',
			'id' => 'pagetwoname_text',
			'default' => 'home',
			'type' => 'text',
		),
		array(
			'label' => 'Page Two Link',
			'id' => 'pagetwolink_text',
			'default' => '#',
			'type' => 'text',
		),
		array(
			'label' => 'Page There Name',
			'id' => 'pagetherename_text',
			'default' => 'home2',
			'type' => 'text',
		),
		array(
			'label' => 'Page There Link',
			'id' => 'pagetherelink_text',
			'default' => '#',
			'type' => 'text',
		),
		array(
			'label' => 'Page Four Name',
			'id' => 'pagefourname_text',
			'default' => 'home4',
			'type' => 'text',
		),
		array(
			'label' => 'Page Four Link',
			'id' => 'pagefourlink_text',
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
                <ul class="bcbd_dropdown">
                          
                            <li>
                                <a href="<?php echo $instance['pageonelink_text'];?>">
                                    <?php echo $instance['pageonename_text'];?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $instance['pagetwolink_text'];?>">
                                    <?php echo $instance['pagetwoname_text'];?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $instance['pagetherelink_text'];?>">
                                    <?php echo $instance['pagetherename_text'];?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $instance['pagefourlink_text']?>">
                                    <?php echo $instance['pagefourname_text']?>
                                </a>
                            </li>
                           
                          
                        </ul>
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

function megaregister_pagelink_widget() {
	register_widget( 'megapagelink_widget' );
}
add_action( 'widgets_init', 'megaregister_pagelink_widget' );
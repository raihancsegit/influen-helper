<?php
// Adds widget: logo
class Logo_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'logo_widget',
			esc_html__( 'MEDIM::About', 'medim' )
		);
		add_action( 'admin_footer', array( $this, 'media_fields' ) );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'media_fields' ) );
	}

	private $widget_fields = array(
		array(
			'label' => 'logo URL',
			'id' => 'logo_media',
			'type' => 'text',
			'default' => '#',
		),
		array(
			'label' => 'About',
			'id' => 'about_textarea',
			'type' => 'textarea',
			'default' => 'about',
		),
		array(
			'label' => 'Email',
			'id' => 'email_textarea',
			'type' => 'text',
			'default' => 'email',
		),
		array(
			'label' => 'Phone',
			'id' => 'Phone',
			'type' => 'text',
			'default' => 'phone',
		),
		array(
			'label' => 'Address One',
			'id' => 'address_one',
			'type' => 'text',
			'default' => 'address',
		),
		array(
			'label' => 'Address Two',
			'id' => 'address_two',
			'type' => 'text',
			'default' => 'Address 2',
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		?>
	
                    <div class="footer-widget">
                        <div class="logo">
                            <a href="<?php echo home_url('/');?>" class="d-inline-block mb-5">
                                    <img src="<?php echo $instance['logo_media'];?>" alt="">
                                </a>
                        </div>
                        <p>
							<?php echo $instance['about_textarea'];?>
                        </p>
                        <div class="media text-light-dark mb-3">
                            <i class="icofont-ui-touch-phone mr-2 mt-2 "></i>
                            <div class="media-body">
                                <p class="m-0  fz-poppins"><?php echo $instance['Phone'];?></p>
                                <p class="m-0  fz-poppins"><?php echo $instance['email_textarea'];?></p>
                            </div>
                        </div>
                        <div class="media text-light-dark">
                            <i class="icofont-location-pin mr-2 mt-2 text-light-dark"></i>
                            <div class="media-body">
                                <p class="m-0  fz-poppins"><?php echo $instance['address_one'];?></p>
                                <p class="m-0  fz-poppins"><?php echo $instance['address_two'];?></p>
                            </div>
                        </div>
                    </div>
              

		<?php
		echo $args['after_widget'];
	}

	public function media_fields() {
		?><script>
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$(document).on('click','.custommedia',function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						var id = button.attr('id');
						_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								$('input#'+id).val(attachment.id);
								$('span#preview'+id).css('background-image', 'url('+attachment.url+')');
								$('input#'+id).trigger('change');
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
					$('.add_media').on('click', function(){
						_custom_media = false;
					});
					$('.remove-media').on('click', function(){
						var parent = $(this).parents('p');
						parent.find('input[type="text"]').val('');
						parent.find('span').css('background-image', 'url()');
					});
				}
			});
		</script><?php
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $widget_field['default'], 'medim' );
			switch ( $widget_field['type'] ) {
				case 'media':
					$media_url = '';
					if ($widget_value) {
						$media_url = wp_get_attachment_url($widget_value);
					}
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'medim' ).':</label> ';
					$output .= '<input style="display:none;" class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.$widget_value.'">';
					$output .= '<span id="preview'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" style="margin-right:10px;border:2px solid #eee;display:block;width: 100px;height:100px;background-image:url('.$media_url.');background-size:contain;background-repeat:no-repeat;"></span>';
					$output .= '<button id="'.$this->get_field_id( $widget_field['id'] ).'" class="button select-media custommedia">Add Media</button>';
					$output .= '<input style="width: 19%;" class="button remove-media" id="buttonremove" name="buttonremove" type="button" value="Clear" />';
					$output .= '</p>';
					break;
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

function register_logo_widget() {
	register_widget( 'Logo_Widget' );
}
add_action( 'widgets_init', 'register_logo_widget' );
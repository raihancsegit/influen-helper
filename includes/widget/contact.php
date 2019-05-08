<?php
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'Contact_Us' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget
class Contact_Us extends WP_Widget {

function __construct() {
		parent::__construct(

		// Base ID of your widget
		'Contact_Us',

		// Widget name will appear in UI
		__('LEADSPLUS :: Contact Us', 'leadsplus'),

		// Widget description
		array( 'description' => __( 'Sample widget leadsplus Contact Us', 'leadsplus' ), )
	);
}

// Creating widget front-end

public function widget( $args, $instance ) {
	echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }
        ?>
                        <div class="contact-info flex">
                            <a href="#"><span><i class="fa fa-map"></i></span>
                               <?php echo esc_html($instance['contact_location']); ?>
                            </a>
                            <a href="mailto:themeRoots.com"><span><i class="fa fa-envelope"></i></span>
                                <?php echo esc_html($instance['contact_email']); ?>
                            </a>
                            <a href="cell:+0000123456789"><span><i class="fa fa-phone"></i></span>
                                 <?php echo esc_html($instance['contact_phone']); ?>
                            </a>
                        </div>
                        <div class="social-butns footer-social-butns">
                            <a href="<?php echo esc_url($instance['facebook_url']); ?>"><i class="fa fa-facebook"></i></a>
                            <a href="<?php echo esc_url($instance['twitter_url']); ?>"><i class="fa fa-twitter"></i></a>
                            <a href="<?php echo esc_url($instance['instagram_url']); ?>"><i class="fa fa-instagram"></i></a>
                            <a href="<?php echo esc_url($instance['dribbble_url']); ?>"><i class="fa fa-dribbble"></i></a>
                        </div>


        <?php
        echo $args['after_widget'];
}

// Widget Backend
public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
	    $title = $instance[ 'title' ];
	}
	else {
	    $title = __( 'Contact', 'leadsplus' );
	}

	if ( isset( $instance[ 'contact_location' ] ) ) {
            $contact_location = $instance[ 'contact_location' ];
	}
	else {
	    $contact_location = __('2352 Lake Avenue Georgetown, SC 29440', 'leadsplus' );
    }

	if ( isset( $instance['contact_email' ] ) ) {
            $contact_email = $instance['contact_email' ];
	}
	else {
            $contact_email = __('2352 Lake Avenue Georgetown, SC 29440', 'leadsplus' );
	}
	if ( isset( $instance['contact_phone' ] ) ) {
            $contact_phone = $instance['contact_phone' ];
	}
	else {
            $contact_phone = __('+000 0123 456 789', 'leadsplus' );
	}
	if ( isset( $instance['facebook_url' ] ) ) {
            $facebook_url = $instance['facebook_url' ];
	}
	else {
            $facebook_url = __('www.facebook.com', 'leadsplus' );
	}
	if ( isset( $instance['twitter_url' ] ) ) {
            $twitter_url = $instance['twitter_url'];
	}
	else {
            $twitter_url = __('www.twitter.com', 'leadsplus' );
	}
	if ( isset( $instance['instagram_url' ] ) ) {
            $instagram_url = $instance['instagram_url'];
	}
	else {
            $instagram_url = __('www.instagram.com', 'leadsplus' );
	}
	if ( isset( $instance['dribbble_url' ] ) ) {
            $dribbble_url = $instance['instagram_url'];
	}
	else {
            $dribbble_url = __('www.dribbble.com', 'leadsplus' );
	}


	// Widget admin form
	?>
		<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
				<label for="<?php echo $this->get_field_id( 'contact_location' ); ?>"><?php _e( 'Contact Location:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'contact_location' ); ?>" name="<?php echo $this->get_field_name( 'contact_location' ); ?>" type="text" value="<?php echo esc_attr( $contact_location ); ?>" />
		</p>
		<p>
				<label for="<?php echo $this->get_field_id( 'contact_email' ); ?>"><?php _e( 'Contact Email:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'contact_email' ); ?>" name="<?php echo $this->get_field_name( 'contact_email' ); ?>" type="text" value="<?php echo esc_attr( $contact_email ); ?>" />
		</p>
		<p>
				<label for="<?php echo $this->get_field_id( 'contact_phone' ); ?>"><?php _e( 'Contact Phone:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'contact_phone' ); ?>" name="<?php echo $this->get_field_name( 'contact_phone' ); ?>" type="text" value="<?php echo esc_attr( $contact_phone ); ?>" />
		</p>
		<p>
				<label for="<?php echo $this->get_field_id( 'facebook_url' ); ?>"><?php _e( 'Facebook URL:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'facebook_url' ); ?>" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" type="text" value="<?php echo esc_attr( $facebook_url ); ?>" />
		</p>
		<p>
				<label for="<?php echo $this->get_field_id('twitter_url' ); ?>"><?php _e( 'Twitter URL:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" type="text" value="<?php echo esc_attr( $facebook_url ); ?>" />
		</p>
		<p>
				<label for="<?php echo $this->get_field_id('instagram_url' ); ?>"><?php _e('Instagram URL:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_url' ); ?>" name="<?php echo $this->get_field_name( 'instagram_url' ); ?>" type="text" value="<?php echo esc_attr( $instagram_url ); ?>" />
		</p>
		<p>
				<label for="<?php echo $this->get_field_id('dribbble_url' ); ?>"><?php _e('Dribbble URL:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'dribbble_url' ); ?>" name="<?php echo $this->get_field_name( 'dribbble_url' ); ?>" type="text" value="<?php echo esc_attr( $dribbble_url ); ?>" />
		</p>

	<?php
}


} // Class wpb_widget ends here

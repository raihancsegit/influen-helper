<?php
function Medim_slider_shortcode($atts,$content){
    ob_start();
        $cibus_slider_atts = shortcode_atts(array(
            'slider_id' => '',
        ),$atts);

        $slider_id = $cibus_slider_atts['slider_id'];
            $args = array(
                'post_type' => array( 'slider' ),
                'p' => $slider_id
            );
        $query = new WP_Query( $args );
        $slider_section = get_post_meta(get_the_ID(),'_sliderpage' , true );
        $slider_sections = isset($slider_section ['banner_style']) ? $slider_section ['banner_style'] : array();

    ?>
         <!-- Start Hero section -->
        <section class="owl-carousel hero-slider">
        	<?php 
        		while ( $query->have_posts() ) : $query->the_post();
			         $slider_metadata = get_post_meta($slider_id, '_slider_metabox', true );
			         $meta_groups = isset( $slider_metadata['slider_group_option'] ) ? $slider_metadata['slider_group_option'] : array();
			         if(!empty($meta_groups)):
			         foreach ( $meta_groups as  $value) {
			        $imgurl= wp_get_attachment_image_url( $value['slider_image'], 'full' );
		     ?>
            <div class="single-slider">
            	<img src="<?php echo esc_url($imgurl);?>" alt="">
            	<div class="overlay"></div>
                <div class="container">
                    <div class="slider-text">
                    	<h1><?php echo esc_html ($value['slider_title']);?></h1>
                    	<h4><?php echo esc_html ($value['slider_subtitle']);?></h4>
                    	<div class="slider-btn-group">
                    		<a href="<?php echo esc_url ($value['btn_one_link']);?>" class="t-btn"><?php echo esc_html ($value['btn_one_text']);?></a>
                    		<a href="<?php echo esc_url ($value['btn_two_link']);?>" class="t-btn t-btn-red"><?php echo esc_html ($value['btn_two_text']);?></a>
                    	</div>
                    </div>
                </div>
            </div><!-- .single-slider -->
             <?php
                }
                endif;
                endwhile;
                wp_reset_postdata();
             ?>
        </section>
        <!-- End Hero section -->
   <?php  }

add_shortcode('Medim_slider','Medim_slider_shortcode');


add_action("manage_posts_custom_column",  "Medim_slider_shortcode_column");
add_filter("manage_edit-slider_columns", "Medim_slider_post_type_columns");
function Medim_slider_post_type_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Slider Name",
    "shortcode" => "Slider Shortcode",
    "Date" => "Date",
  );
  return $columns;
}

function Medim_slider_shortcode_column($column){
  global $post;

  if ( 'shortcode' == $column) {
      $shortcode = "[Medim_slider slider_id=".$post->ID."]";
      echo '<input type="text" readonly value="'.$shortcode.'">';
  }
}


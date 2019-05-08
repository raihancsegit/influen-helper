<?php $image = wp_get_attachment_url($atts['image']);?>
<!-- Testimonial Section Start -->
<div class="testimonial-sec pt-100 pb-100 " style="background-image:url(<?php echo esc_url($image)?>)">
		<div class="container">	
			<div class="row">
				<div class="col-md-12">
					<div class="all-testimonial">
					<?php
                        $testimonial = (array) vc_param_group_parse_atts($atts['testimonial']);
                        if (!empty($testimonial)):
                        foreach ($testimonial as $item):
                        $image_url = wp_get_attachment_image_src($item['image']);
                        $image_alt = get_post_meta($item['image'], '_wp_attachment_image_alt', true);
                            ?> 	
						<div class="single-testimonial">					
							<div class="client-comment">
								<div class="client-thumb">
									<img src="<?php echo esc_url($image_url[0]);?>" alt=""/>
								</div>							
								<h2><?php echo esc_html($item['title_one']);?> <span><?php echo esc_html($item['title_two']);?></span></h2>						
								<p><?php echo esc_html($item['con']);?></p>		
								<div class="client-meta">
									<h4><?php echo esc_html($item['name']);?></h4>
									<h5><?php echo esc_html($item['position']);?></h5>
								</div>
							</div>													
						</div>								
						<?php
                            endforeach;
                            endif;
                        ?>		
					</div>			
				</div>
			</div>
		</div>
	</div>
	<!-- Testimonial Section End -->

<?php //$image = wp_get_attachment_url($atts['image']);?>
<!-- Testimonial Section Start -->	
<div class="testimonial-v1-sec pt-100">
		<div class="container">		
			<div class="row">
				<div class="sec-v2-title text-center mb-50">		
					<span class="sec-sub-title">testimonial</span>
					<h1>customer <span class="high-light">says</span></h1>
					<div class="simple-border"></div>
				</div>			
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="testimonial-v1-all">
                    <?php
                        $testimonial = (array) vc_param_group_parse_atts($atts['testimonial']);
                        if (!empty($testimonial)):
                        foreach ($testimonial as $item):
                        $image_url = wp_get_attachment_image_src($item['image']);
                        $image_alt = get_post_meta($item['image'], '_wp_attachment_image_alt', true);
                            ?> 
                            <div class="single-testimonial-v1">
                                <div class="testimonial-v1-img">
                                <img src="<?php echo esc_url($image_url[0]);?>" alt="">
                                <div class="shape-box"></div>
                                </div>
                                <div class="details">
                                <h4><?php echo esc_html($item['name']);?></h4>
                                <span><?php echo esc_html($item['position']);?></span>
                                <div class="testimonial-quote">
                                    <img src="assets/img/icon/quote.png" alt=""/>
                                </div>
                                </div>
                                <div class="testimonial-text">
                                <p><?php echo esc_html($item['con']);?></p>
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
	<!--Testimonial Section End -->
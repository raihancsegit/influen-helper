<?php $image = wp_get_attachment_url($atts['image']);?>
<?php $image2 = wp_get_attachment_url($atts['icon_image']);?>
            <div class="service-v7-wrapper">
					<div class="service-v7-inner">
						<div class="service-v7-inner-thumb">
							<img src="<?php echo esc_url($image);?>" alt="">
						</div>
						<div class="service-v7-inner-text-caption">
							<div class="service-v7-inner-text">
								<div class="service-v7-inner-icon">
									<img src="<?php echo esc_url($image2);?>" alt="">
								</div>
								<h4><a href="#"><?php echo esc_html($atts['title']);?></a></h4>
								<p><?php echo esc_html($atts['desc']);?></p>
							</div>
						</div>
                    </div>	
            </div>				

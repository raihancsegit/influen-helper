<?php $image = wp_get_attachment_url($atts['image']);?>
<div class="count-up-sec" style="background-image:url(<?php echo esc_url($image)?>)">
		<div class="count-up-sec-overlay"></div>
		<div class="container">
			<div class="row">
            <?php
                    $counter = (array) vc_param_group_parse_atts($atts['counter']);
                    if (!empty($counter)):
                    foreach ($counter as $item):
                    //$image_url = wp_get_attachment_url($item['image']);
                    //$image_alt = get_post_meta($item['image'], '_wp_attachment_image_alt', true);
                ?> 	
				<div class="col-md-3 col-sm-6 col-xs-12 inner">
					<div class="counting_sl">
						<div class="countup-icon">
							<i class="<?php echo esc_attr($item['icon_class']);?>"></i>
						</div>
						<div class="countup-text">
							<h2 class="counter"><?php echo esc_html($item['cou_val']);?></h2>
							<h4><?php echo esc_html($item['title']);?></h4>						
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
 

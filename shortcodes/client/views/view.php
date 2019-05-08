<!-- All Patner Section Start -->
<div class="all-patner-sec">
		<div class="container">
			<div class="row">				
				<div class="col-md-12">				
					<div class="col-md-12">				
						<div class="all-patner">
                            <?php
                                $client = (array) vc_param_group_parse_atts($atts['client']);
                                if (!empty($client)):
                                foreach ($client as $item):
                                $image_url = wp_get_attachment_image_src($item['image'],'client');
                                $image_alt = get_post_meta($item['image'], '_wp_attachment_image_alt', true);
                            ?> 	
							<div class="single-patner">
								<a href="<?php echo esc_url($item['logo_url']);?>"><img src="<?php echo esc_url($image_url[0]);?>" alt="<?php echo esc_attr($image_alt);?>"/></a>
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
	</div>
	<!-- All Patner Section End -->
<?php $image = wp_get_attachment_url($atts['image']);?>
<div class="vedio-v2-sec" style="background-image:url(<?php echo esc_url($image);?>);">
		<div class="container">
			<div class="row">	
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="vedio-v2-button">
						<a href="<?php echo esc_url($atts['v_url']);?>" class="mfp-iframe vedio-play"><i class="fa fa-play" aria-hidden="true"></i></a>
					</div>
					<div class="video-inner-text">
                        <h1><?php echo wp_kses_post( $atts['text'] );?>	</h1>
										
					</div>
				</div>
				<div class="col-md-2"></div>				
			</div>					
		</div>
	</div>
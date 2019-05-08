<?php //$image = wp_get_attachment_url($atts['image']);?>
<div class="single-price">
						<div class="pricing-heading">
							<h2 class="pricing-title"><?php echo esc_html($atts['title']);?></h2>
							<div class="price-meta">
								<h1>
									<span class="price-curency">
										<?php echo esc_html($atts['currency']);?></span>
									<?php echo esc_html($atts['price']);?>
								</h1>
								<span class="subscription-time"><?php echo esc_html($atts['duration']);?></span>							
							</div>
							<div class="pakage-icon">
								<img src="assets/img/icon/i1.png" alt="">
							</div>								
						</div>
						
							<?php echo wp_kses_post( $content ); ?>
						
						<div class="pricing-button">
							<a href="<?php echo esc_url( $atts['button_link'] ); ?>" class="price-order-btn"><?php echo esc_html( $atts['button_text'] ); ?></a>
						</div>							
</div>


 

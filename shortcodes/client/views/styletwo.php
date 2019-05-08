<?php //$image = wp_get_attachment_url($atts['image']);?>
<?php
    $items   = $atts['items'];
    //$categories    = $atts['categories'];
    $args = array(
        'post_type'      => 'service',
        'posts_per_page' => $items,
        'order'          => $atts['order'],
        'orderby'        => $atts['orderby'],
    );
    $categories   = $atts['categories'];
    $cats = array_filter(explode(',' , $categories ) );

    if ( count( $cats ) ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'service-category',
                'field'    => 'id',
                'terms'    => $cats,
            ),
        );
    }
    
?>
<div class="row">
                <!-- Single service 1 start !-->
                <?php 
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) { $loop->the_post();
                        $title   = get_the_title();
                        $pLink   = get_permalink();
                        $content = get_the_content();
                        $icons   = get_post_meta(get_the_ID(),'_service' , true );
                        $icon    = isset($icons ['icon']) ? $icons ['icon'] : array();
                    ?>
				<div class="col-md-4 col-sm-6 service-inner-box">
					<div class="service-inner" >
						<div class="service-item" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?> '); background-size: cover; background-position: center center;">		      	
							<div class="service-content">
								<div class="service-icon">
									<i class="<?php echo esc_attr($icon);?>"></i>
								</div>
								<div class="service-text">
									<div class="services-border"></div>
									<div class="services-title">
                                        <h2><a href="<?php the_permalink();?>"><?php echo $title;?></a></h2>
									</div>
								</div>
								<p><?php echo wp_trim_words( get_the_content(), 15, ' ' )?></p>
								<a href="<?php the_permalink();?>" class="service-button"><?php echo esc_html_e('Learn More');?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
							</div>
							<div class="service-content-over">
								<div class="service-content-middle">
									<div class="service-content-icon">
											<i class="flaticon-portfolio"></i>
										<div class="service-content-border"></div>	
									</div>
									<h2><a href="<?php the_permalink();?>"><?php echo $title;?></a></h2>
									<a href="<?php the_permalink();?>" class="primary-btn"><?php echo esc_html_e('Learn More');?></a>
								</div>	
							</div>
						</div>
					</div>
				</div>			
				<!-- Single service 1 End !-->
				<?php // end loop
             }
        wp_reset_postdata();
        ?>
</div>
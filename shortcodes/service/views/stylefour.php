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
<div class="service-v3-sec pt-100 pb-70">
		<div class="container">	
			<!-- Section Title Start -->	
			<div class="row">
				<div class="col-md-12">
					<div class="sec-v2-title">		
						<span class="sec-sub-title"><?php echo esc_html($atts['pre_title']);?></span>
						<h1><?php echo esc_html($atts['heading2_title_one']);?> <span class="high-light"><?php echo esc_html($atts['heading2_title_two']);?></span></h1>
						<div class="simple-border"></div>
					</div>
				</div>
			</div>
			<!-- Section Title Start -->			
			<div class="row">			
								
            <?php 
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) { $loop->the_post();
                    $title   = get_the_title();
                     $pLink   = get_permalink();
                    $content = get_the_content();
                    $icons   = get_post_meta(get_the_ID(),'_service' , true );
                    $icon    = isset($icons ['icon']) ? $icons ['icon'] : array();
                    ?>		
						
				<div class="col-md-4 col-sm-6 service-v3-inner">
					<div class="service-v3-item">
						<div class="service-v3-img">
							<?php the_post_thumbnail();?>
						</div>								
						<div class="service-v3-content">
							<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>									
							<p><?php echo wp_trim_words( get_the_content(), 10, ' ' )?></p>
							<a href="<?php the_permalink();?>" class="service-v3-button"><i class="flaticon-right-arrow"></i></a>
						</div>
					</div>										
                </div>	
                <!-- Single service 1 End !-->
                <?php // end loop
                    }
                 wp_reset_postdata();
                 ?>
                
			</div>
		</div>		
	</div>
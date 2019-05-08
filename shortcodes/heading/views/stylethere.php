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
<div class="service-v2-sec pt-100 pb-70">
		<div class="container">	
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
                    <div class="col-md-4 col-sm-6 service-v2-inner">
                        <div class="service-v2-item">
                            <div class="service-v2-icon">
                                <i class="<?php echo esc_attr($icon);?>"></i>
                            </div>								
                            <div class="service-v2-content">
                                <h2><a href="<?php the_permalink();?>"><?php echo $title;?></a></h2>									
                                <p><?php echo wp_trim_words( get_the_content(), 15, ' ' )?></p>
                                <a href="<?php the_permalink();?>" class="service-v2-button">Learn More</a>
                            </div>
                        </div>										
                    </div>			
				<?php // end loop
                    }
                 wp_reset_postdata();
                 ?>			
										
			</div>
		</div>		
	</div>  
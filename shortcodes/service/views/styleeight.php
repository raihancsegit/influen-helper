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
<div class="page-content pt-100 pb-60">
		<div class="container">
			<div class="row">

                <?php 
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) { $loop->the_post();
                    $title   = get_the_title();
                    $pLink   = get_permalink();
                    $content = get_the_content();
                    $info    = get_post_meta(get_the_ID(),'_service' , true );
                    $image   = wp_get_attachment_image_url( $info['image'], 'full');
                ?>
				<div class="col-md-4 col-sm-6 service-v8-wrapper">				
					<div class="service-v8-inner">
						<div class="service-v8-thumb">
                            <?php the_post_thumbnail();?>
						</div>					
						<div class="service-v8-text">
							<div class="service-v8-title">
								<div class="service-v8-icon">
									<i class="fa fa-cog" aria-hidden="true"></i>
								</div>							
								<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>							
							</div>	
							<p><?php echo wp_trim_words( get_the_content(), 15, ' ' )?></p>
							<a href="<?php the_permalink();?>" class="service-v8-btn">Continue Reading<i class="fa fa-caret-right" aria-hidden="true"></i></a>		
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
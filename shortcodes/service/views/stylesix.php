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
            <?php 
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) { $loop->the_post();
                    $title   = get_the_title();
                    $pLink   = get_permalink();
                    $content = get_the_content();
                    $info    = get_post_meta(get_the_ID(),'_service' , true );
                    $image   = wp_get_attachment_image_url( $info['image'], 'full');
                ?>		
				<div class="col-md-3 col-sm-6">
					<div class="service-v5-inner">
						<div class="service-v5-thumb">
							<?php the_post_thumbnail();?>		
						</div>	
						<div class="service-v5-desc">
							<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
							<div class="service-v5-border"></div>
							<p><?php echo wp_trim_words( get_the_content(), 10, ' ' )?></p>
						</div>						
					</div>							
				</div>				
				<?php // end loop
                    }
                 wp_reset_postdata();
                 ?>				
							
</div>
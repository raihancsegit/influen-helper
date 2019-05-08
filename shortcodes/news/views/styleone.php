<?php //$image = wp_get_attachment_url($atts['image']);?>
<?php
    $items   = $atts['items'];
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $items,
        'order'          => $atts['order'],
        'orderby'        => $atts['orderby'],
    );
    $categories   = $atts['categories'];
    $cats = array_filter(explode(',' , $categories ) );

    if ( count( $cats ) ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field'    => 'id',
                'terms'    => $cats,
            ),
        );
    }
    
?>
<div class="blog-sec pt-100 pb-70">
	<div class="container">	
        <div class="row">
                        <?php 
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) { $loop->the_post();
                                $title   = get_the_title();
                                $pLink   = get_permalink();
                                $content = get_the_content();
                            // $team    = get_post_meta(get_the_ID(),'_team' , true );
                            
                            ?>

                        <div class="col-md-4 col-sm-6">
                            <div class="single-post">
                                <div class="post-thumb">
                                    <?php the_post_thumbnail();?>
                                    <div class="post-description">
                                        <div class="post-meta">
                                            <ul>
                                                <li><a href="#"><?php the_time('F j,Y');?></a></li>
                                                <li><a href="#">TECHNOLOGY</a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                        <a href="<?php the_permalink();?>" class="post-readmore">Read More <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                    </div>
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
 

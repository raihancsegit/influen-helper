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
    <!-- Start Section -->
    <section class="sec">
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
                    <div class="col-md-4">
                        <div class="single-service bg-white type-2 radius-10 position-relative service-wrapper S-dp-1-3 H-dp-10-60 m-mb-50">
                            <div class="media">
                            <div class="service-circle position-relative mb-4 text-active M-bg-4 rounded-circle d-flex align-items-center justify-content-center">
                                <span class="<?php echo esc_attr($icon);?> text-grad-1"></span>
                            </div>
                            <div class="media-body">
                                <h4 class="text-dark2 mb-3 position-relative pt-2"><?php echo $title;?></h4>
                                    <p class="mb-4">
                                        <?php echo wp_trim_words( get_the_content(), 12, ' ' );?>
                                    </p>
                                    <a href="<?php echo $pLink;?>" class="text-default d-inline-block pt-2 fz-poppins text-Underline">
                                        Read More
                                    </a>
                            </div>
                            </div>
                        </div> <!-- col-->
                    </div>
                <?php // end loop
                    }
                 wp_reset_postdata();
                 ?>
            </div>
        </div>
</section>

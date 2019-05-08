<?php //$image = wp_get_attachment_url($atts['image']);?>
<?php
    $items   = $atts['items'];
    //$categories    = $atts['categories'];
    $args = array(
        'post_type'      => 'team',
        'posts_per_page' => $items,
        'order'          => $atts['order'],
        'orderby'        => $atts['orderby'],
    );
    $categories   = $atts['categories'];
    $cats = array_filter(explode(',' , $categories ) );

    if ( count( $cats ) ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'team-category',
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
                        $team    = get_post_meta(get_the_ID(),'_team' , true );
                        $pos     = isset($team ['pos']) ? $team ['pos'] : array();
                        $fb_url  = isset($team ['fb_url']) ? $team ['fb_url'] : array();
                        $tw_url  = isset($team ['tw_url']) ? $team ['tw_url'] : array();
                        $vm_url  = isset($team ['vm_url']) ? $team ['vm_url'] : array();
                        $li_url  = isset($team ['li_url']) ? $team ['li_url'] : array();
                    ?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="team-member">
						<div class="team-thumb">
							<?php the_post_thumbnail();?>
							<div class="team-overlay">
								<ul>
									<li><a href="<?php echo esc_url($fb_url);?>"><i class="fa fa-facebook"></i></a></li>
									<li><a href="<?php echo esc_url($tw_url);?>"><i class="fa fa-twitter"></i></a></li>
									<li><a href="<?php echo esc_url($vm_url);?>"><i class="fa fa-vimeo"></i></a></li>
									<li><a href="<?php echo esc_url($li_url);?>"><i class="fa fa-linkedin"></i></a></li>
								</ul>							
							</div>							
						</div>
						<h2><?php the_title();?></h2>
						<span><?php echo esc_html($pos);?></span>
					</div>
                </div>
                <?php // end loop
                    }
                 wp_reset_postdata();
                 ?>
</div>
 

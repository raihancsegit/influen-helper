<?php $image = wp_get_attachment_url($atts['image']);?>
<section class="about-area m-pb-140 m-pt-140 type-3 m-bg-1">
    	<div class="container">
    		<div class="row flex-column-reverse flex-sm-row">
    			<div class="col-lg-6 col-xl-5  col-sm-6 col-md-7 ">
                    <h2 class="text-dark pb-40 mb-0 ">
                        <?php echo wp_kses_post($atts['title']);?>
                    </h2>
                    <p class="mt-20">
                        <?php echo wp_kses_post( do_shortcode( $content ) ); ?>
                    </p>
                    <div class="row">
                        <?php
                            $items = (array) vc_param_group_parse_atts($atts['item']);
                            if (!empty($items)):
                            foreach ($items as $item):
                        ?>
                        <div class="col-md-6">
                            <div class="media align-items-center">
                                <i class="icofont-check-circled mr-3 text-active"></i>
                                <div class="media-bodys">
                                    <p class="mb-0 text-medium"><?php echo esc_html($item['title']);?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                            endforeach;
                            endif;
                        ?>
                    </div>
                    <h5 class="text-dark2 m-mt-40 mb-0 ">
                    Check Our  
                    <a href="<?php echo esc_url($atts['t_link']);?>" class="text-active text-Underline"><?php esc_html_e('Time Table','medim');?></a></h5>
                </div>
                <div class="col-lg-6 col-xl-5 offset-xl-2  col-sm-6 col-md-5 ">
                	<div class="department-imag position-relative radius-5 s-dp-1-3 bg-white">
                		<div class="overlay"></div>
                		<a class="banner-circle position-absolute venobox" data-vbtype="youtube" data-autoplay="true"  href="<?php echo esc_url($atts['v_url'])?>">
                            <img src="<?php echo get_template_directory_uri();?>/assets/icon/play.svg" class="svg" alt="">
                        </a>
                        <img src="<?php echo esc_url($image);?>" alt="">
                    </div>
                </div>
    		</div>
    	</div>
    </section>
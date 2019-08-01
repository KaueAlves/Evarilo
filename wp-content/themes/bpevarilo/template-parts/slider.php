<?php
global $post;
$ids = explode(",", get_post_meta($post->ID, 'guiaaps_slider_img_ids',true));
$urls = explode(",", get_post_meta($post->ID, 'guiaaps_slider_img_urls',true)); 
?>
<!-- Slider principal -->
<section class="bg-f7f7f7 main-slider espaco">
    <div class="container slider-title-mobile">
        <div class="col-6 slider-title-mobile">
            <div class="slider-title text-center w-100">
                <h2><?php echo get_the_title();?></h2>
            </div>
        </div>
    </div>
    <section class="container">
        <div class="row">
            <div class="container">
                <div class="slider-img col-12 col-md-10 mx-auto">
                    <div id="carouselSliderIndicators" class="carousel slide" data-ride="carousel">

                        <?php 
                            if($ids[0]):
                                include( locate_template( 'template-parts/sliders/slider-id.php'));
                            elseif($urls[0]): 
                                include( locate_template( 'template-parts/sliders/slider-url.php'));
                            else: 
                                include( locate_template( 'template-parts/sliders/slider-default.php'));
                            endif; 
                        ?>

                        <a class="carousel-control-prev" href="#carouselSliderIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselSliderIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

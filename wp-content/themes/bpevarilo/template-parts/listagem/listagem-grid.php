<section class="altespaco60 row">
    <?php  
    global $horizon_theme_options; 

    if(have_posts( )):
        while ( have_posts() ) : the_post();
    ?>
    
    <div class="col-12 col-md-6 col-lg-3 item-post-pa espaco grid-item">
 
        <div class="">
            <a href="<?php echo get_permalink(); ?>">
                <div class="card" >
                    <img src="<?php echo get_the_post_thumbnail_url($post,'medium') ?>" alt="" srcset="" class="card-img-top p-2">
                    <div class="card-body text-center">
                        <h2><?php echo get_the_title(); ?></h2>
                        <h3 class="card-text"><?php echo get_the_excerpt();?></h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <?php
        endwhile; wp_reset_postdata();
    ?>
        <?php if($wp_query->found_posts > 10):?>
            <div class="post-pagination col-12 grid-item">
                <?php 
                the_posts_pagination( array(
                    'screen_reader_text' => ' ', 
                    'mid_size'  => 2,
                    'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'textdomain' ),
                    'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'textdomain' ),
                ) ); 
                
                ?>
            </div>
        <?php endif;?>
    <?php
    else:
    ?>
    <div class="row item-post espaco">
        <div class="col-md-12 wrap-item-post-info">
            <div class="item-post-info">
                <p class="text-center">Não há itens relacionados</p>
            </div>
        </div>
    </div>
    <?php
        endif;
    ?>
</section>
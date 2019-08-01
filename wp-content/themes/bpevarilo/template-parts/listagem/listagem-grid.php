<section class="altespaco60 row">
    <?php  
    global $horizon_theme_options; 

    if(have_posts( )):
        while ( have_posts() ) : the_post();
    ?>
    
    <div class="col-12 col-lg-6 item-post-pa espaco grid-item">
    
    
        <?php if(has_post_thumbnail( $post )) {?>
            <figure class="<?php if(has_post_thumbnail( $post )){echo "w-100 h-auto";}else{echo "w-25 h-25 padding-top-0";} ?>" style="background-image:url('<?php echo get_the_post_thumbnail_url($post,'large') ?>')">
            </figure>
        <?php } ?>

        <div class="<?php echo has_post_thumbnail( $post ) ? 'item-post-info':'' ?>" >
            <a href="<?php echo get_permalink(); ?>"><h2 class=" t-26"><?php echo get_the_title() ?></h2></a>
          <?php if(isset($horizon_theme_options['mostrar_datas'])){ ?>  
            <p class="text-right texto-verde espaco-0 item-post-data"><?php echo get_the_date('d/m/Y') ?></p>
          <?php } ?>

        </div>
        <div class="item-post-info-resumo espaco ">
        <p class="list-min-height"><?php echo strip_shortcodes( wp_trim_words( get_post_field('post_content', $post ),25,'...') ); ?></p>
        </div>
        <div class="row metade-espaco">
            <div class="col-6 redes-sociais metade-espaco">
                <?php if(isset($horizon_theme_options['mostrar_compartilhamentos']) && $horizon_theme_options['mostrar_compartilhamentos']){compartilharRedesListagem();}?>
            </div>
            <div class="col-6 metade-espaco ml-auto">
                <a href="<?php the_permalink();?>" class="btn w-100 text-md-right">Veja mais</a>
            </div>
            <div class="col-12">
                <span class="separador"></span>
            </div>
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
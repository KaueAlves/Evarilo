<section class="altespaco60">
    <?php 

global $horizon_theme_options; 

    if(have_posts( )):
        while ( have_posts() ) : the_post();
    ?>
    
    <div class="row item-post espaco">
    <?php
     $col=12;
        if(has_post_thumbnail()){ 
            $col=8;
            ?>
            <div class="col-md-4 text-center">
            <figure class="w-100 h-auto">
                <img class="thumbnail" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium') ?>" />
            </figure>
            </div>
        <?php } ?>
        <div class="col-md-<?php echo $col ?> wrap-item-post-info">
            <div class="item-post-info">
                <a href="<?php echo get_permalink() ?>"><h3 class=" text-left"><?php the_title(); ?></h3></a>
                <?php if(isset($horizon_theme_options['mostrar_datas'])){ ?>  
                  <p><?php echo get_the_date(); ?></p>
                <?php } ?>

                <p class="list-min-height"><?php 

                 //TODO colocar a quantidade de palavras no theme options
                if (get_the_excerpt() != '') {
                echo  wp_trim_words(get_the_excerpt(), 50, '');
                } else {
                    echo wp_trim_words(get_post_field('post_content'), 50, '');
                }?>

            </p>
            </div>
            <div class="row metade-espaco">
            <div class="col-6 redes-sociais metade-espaco">
                <?php if(isset($horizon_theme_options['mostrar_compartilhamentos']) && $horizon_theme_options['mostrar_compartilhamentos']){compartilharRedesListagem();}?>
            </div>
            <div class="col-6 metade-espaco ml-auto">
                <a href="<?php the_permalink();?>" class="btn w-100 max-w-150 pull-right">Veja mais</a>
            </div>
            <div class="col-12">
                <span class="separador"></span>
            </div>
        </div>
        </div>
    </div>
    
    <?php
        endwhile; wp_reset_postdata();
    ?>

        <div class="post-pagination">
            <?php 
            the_posts_pagination( array(
                'screen_reader_text' => ' ', 
                'mid_size'  => 2,
                'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'textdomain' ),
                'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'textdomain' ),
            ) ); 
            ?>
        </div>

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
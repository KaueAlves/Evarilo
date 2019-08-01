<section class="altespaco60 row">
    <?php  
    $size = 10;
    $eventos_data = isset($_GET['data_eventos']) ? $_GET['data_eventos'] : "";
    $eventos_data_final = isset($_GET['eventos_data_final']) ? $_GET['eventos_data_final'] : "";
    //get_except_tribe_events($post);
    $wp_query = montaQueryEvents();

    if($eventos_data){
        $day = date('w',strtotime($eventos_data));
    }

    if($wp_query->have_posts( )):
        while ( $wp_query->have_posts() ) : $wp_query->the_post();
            // $data_excecao = get_except_tribe_events($post);
            if(true):
            $meta = get_post_meta($post->ID);
    ?>
    
    <div class="col-12 col-lg-6 item-post-pa espaco">
        <figure class="w-100 h-auto" style="background-image:url('<?php echo get_the_post_thumbnail_url($post,'large') ?>')">
        </figure>
        <div class="item-post-info">
            <a href="<?php echo get_permalink(); ?>"><h2 class=" t-26"><?php echo get_the_title() ?></h2></a>
            <p class="text-right texto-verde espaco-0 item-post-data"><?php echo getCustomDateEvent($meta['_EventStartDate'][0],$meta['_EventEndDate'][0]) ?></p>
        </div>
        <div class="item-post-info-resumo espaco ">
        <p class="list-min-height"><?php echo strip_shortcodes( wp_trim_words( get_post_field('post_content', $post ),25,'...') ); ?></p>
        </div>
        <div class="row metade-espaco">
            <div class="col-6 redes-sociais metade-espaco">
                <?php compartilharRedesListagem();?>
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
        else:
            $size--;
        endif;
        endwhile; wp_reset_postdata();
    ?>
        <?php if($wp_query->found_posts > $size):?>
            <div class="post-pagination col-12">
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
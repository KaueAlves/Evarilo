<section class="altespaco60">
    <?php 
    if(have_posts( )):
        while ( have_posts() ) : the_post();
        $imgDestaque = get_post_meta($post->ID, 'horizon_imgDestaque',true) ?? 'false';
        if( has_post_thumbnail() && $imgDestaque !== 'false'){
            include( locate_template( 'template-parts/tools/content-imgDestaque.php' ));
        }   
            
    ?>
        <div class="wp-content">
            <?php echo apply_filters('the_content', get_the_content() ); ?>
        </div>

    <?php
        endwhile;
    else:
    ?>
    <div class="row item-parque espaco">
        <div class="col-md-12 wrap-item-parque-info">
            <div class="item-parque-info">
                <p class="text-center">Não há posts relacionados</p>
            </div>
        </div>
    </div>
    <?php
        endif;
    ?>
</section>
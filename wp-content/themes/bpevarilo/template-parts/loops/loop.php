<section class="altespaco60">
    <?php 
    if(have_posts( )):
        while ( have_posts() ) : the_post();
    ?>
        <div class="wp-content espaco">
            <div class="entry-header">
            <?php
                if (get_post_meta($post->ID, "description", true)) {
                    echo "<h3 class='sma_subtitulo'>" . get_post_meta($post->ID, "description", true) . "</h3>";
                    }
                ?>
            </div>
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
<section class="altespaco60">
    <?php 
    if(have_posts( )):
        while ( have_posts() ) : the_post();
        $imgDestaque = get_post_meta($post->ID, 'horizon_imgDestaque',true) ?? 'false';
        if( has_post_thumbnail() && $imgDestaque !== 'false'){
            include( locate_template( 'template-parts/tools/content-imgDestaque.php' ));
        }   
            
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
        <div class="espaco">
            <?php
                $tags = wp_get_post_tags($post->ID, array('fields' => 'ids'));
                if ($tags) {
                    ?>
                    <section class="posts-relacionados">
                        <h4>Notícias relacionadas</h4>
                        <ul class="styled-list-one normal-font">
                            <?php
                            $today = getdate();
                            $args = array(
                                'tag__in' => $tags,
                                'date_query' => array(
                                    array(
                                        'after' => array(
                                            'year' => 2017,
                                            'month' => 9,
                                            'day' => 28,
                                        ), 'before' => array(
                                            'year' => $today['year'],
                                            'month' => $today['mon'],
                                            'day' => $today['mday'],
                                        ),
                                        'inclusive' => true,
                                    ),
                                ),
                                'post__not_in' => array($post->ID),
                                'posts_per_page' => 3,
                                'ignore_sticky_posts' => 1,
                                'orderby' => 'rand'
                            );
                            $query_relacionados = new WP_Query($args);
                            if ($query_relacionados->have_posts()) {
                                while ($query_relacionados->have_posts()) : $query_relacionados->the_post();
                                    ?>
                                    <li>  <a href="<?php the_permalink() ?>" title="Link para <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>

                                    <?php
                                endwhile;
                            }
                            wp_reset_query();
                            ?>

                        </ul>
                    </section>
                    <?php
                }
            ?>
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
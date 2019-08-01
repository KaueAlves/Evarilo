<?php

    $horizon_relacionados_titulo = isset($horizon_relacionados_titulo) ? $horizon_relacionados_titulo : "TÁ NA MIDIA";
    $horizon_relacionados_categorias = isset($horizon_relacionados_categorias) ? $horizon_relacionados_categorias : array('ta-na-midia','deu-na-imprensa');

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => '4',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => $horizon_relacionados_categorias,
            ),
        ),
    );
    $queryTaNaMidia = new WP_Query( $args );
    $post_tanamidia_ids = wp_list_pluck( $queryTaNaMidia->posts, 'ID' );

?>

<div class="container espaco">
        <div class="row">
            <div class="tanamidia">

                <div class="col-md-12 metade-espaco bloco-veja-mais">
                    <h3><?php echo $horizon_relacionados_titulo;?></h3>
                </div>

                <div class="col-12">
                    <div class="row">


                        <?php 
                        
                        foreach ($post_tanamidia_ids as $key => $value) :
                        
                        ?>

                        <div class="col-lg-3 col-md-4 espaco">
                            <div class="card padding-0" >
                                <figure style="position:relative;"> 
                                    <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url( $value, 'large') ;?>" alt="Imagem Ta na Midia 1">
                                    <span style="position:absolute;" class="card-overlay"><?php echo get_the_date('d/m/Y',$value);?></span>
                                </figure>
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo get_the_title( $value ); ?></h3>
                                    <p class="card-text">
                                        <?php
                                            $resumo = apply_filters('the_excerpt', get_post_field('post_excerpt', $value));
                                            if($resumo != ''){
                                                echo $resumo;
                                            }else{
                                                echo wp_trim_words( get_post_field('post_content', $value ),12,'...');
                                            }
                                        ?>
                                    </p>
                                    <a href="<?php echo get_permalink( $value );?>" class="btn">Veja mais</a>
                                </div>
                            </div>                  
                        </div>

                        <?php 
                            endforeach;
                        ?>

                    </div>
                </div>
            </div>  
        </div>
    </div>
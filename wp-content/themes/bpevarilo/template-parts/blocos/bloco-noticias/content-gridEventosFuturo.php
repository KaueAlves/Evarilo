<?php

   //próximos eventos
   $args= array(
        'posts_per_page' => 3,
        'start_date' => date( 'Y-m-d H:i:s' ),
        'post__not_in' => array($post->ID),
    
    );

    $queryEventos=tribe_get_events($args);

?>

<div class="container espaco">
        <div class="row">
            <div class="tanamidia col-12">

                <div class="col-md-12 metade-espaco bloco-veja-mais">
                  <h4 class="texto-verde">MAIS EVENTOS</h4>
                </div>

                <div class="col-12">
                    <div class="row">
                        <?php 
                        
                        foreach ($queryEventos as $key => $evento) :
                            $value=$evento->ID;
                            $event_start_date = mysql2date('d/m/Y',$evento->EventStartDate,true);
                        ?>

                        <div class="col-lg-4 col-md-4 espaco">
                            <div class="card padding-0" >
                                <figure style="position:relative;"> 
                                    <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url( $value, 'large') ;?>" alt="Imagem Ta na Midia 1">
                                    <span style="position:absolute;" class="card-overlay"><?php echo $event_start_date ?></span>
                                </figure>
                                <div class="card-body">
                                    <h3 class="card-title"> <a href="<?php echo get_permalink( $value );?>"><?php echo get_the_title( $value ); ?></a></h3>
                                    <p class="card-text">
                                        <?php
                                            $resumo = wp_trim_words(apply_filters('the_excerpt', get_post_field('post_excerpt', $value)),20,'...');
                                            if($resumo != ''){
                                                echo $resumo;
                                            }else{
                                                echo wp_trim_words( get_post_field('post_content', $value ),20,'...');
                                            }
                                        ?>
                                    </p>
                                   
                                    
                                    </a>
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
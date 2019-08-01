<?php

    $horizon_destaques_titulo = isset($horizon_destaques_titulo) ? $horizon_destaques_titulo : "Destaques";
    $horizon_destaques_categorias = isset($horizon_destaques_categorias) ? $horizon_destaques_categorias : array('educacao-ambiental', 'politicas-de-meio-ambiente', 'vidas-sustentaveis','destaque-home');

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => '4',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => $horizon_destaques_categorias,
            ),
        ),
    );
    $queryDestaques = new WP_Query( $args );
    $post_destaque_ids = wp_list_pluck( $queryDestaques->posts, 'ID' );

?>

<section class="container-fluid bg-f7f7f7 padding-top espaco" >

    <div class="container"  >
        <div class="post-destaques row" >
            <div class="col-md-12 metade-espaco bloco-veja-mais">
                <?php

                    // Get the ID of a given category
                    $category_id = get_cat_ID( 'Destaques' );
                    // Get the URL of this category
                    $category_link = get_category_link( $category_id );
                
                ?>
                <h3 class="m-0"><?php echo $horizon_destaques_titulo;?></h3>
            </div>

            <div class=" col-12 col-lg-6 mb-4 metade-espaco">
                <div class="card destaque-1 text-white" style="background: url('<?php echo get_the_post_thumbnail_url( $post_destaque_ids[0], 'large') ;?>')">
                    <a class="destaque-link" href="<?php echo get_permalink( $post_destaque_ids[0] );?>">
                        <div class="text">
                            <div class="text-content">
                                <?php 
                                    $resumo = apply_filters('the_excerpt', get_post_field('post_excerpt', $post_destaque_ids[0]));
                                    if($resumo != '' && $resumo != null){
                                        echo "<p class='text-white metade-espaco'>".$resumo."</p>";
                                    }else{
                                        echo "<p class='text-white metade-espaco'>".wp_trim_words( get_post_field('post_content', $post_destaque_ids[0] ),12,'...')."</p>";
                                    }
                                ?> 
                                <p class="destaquesData"><?php echo get_the_date('d M Y',$post_destaque_ids[0]);?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 col-12">
                <div class="row">  
                    <div class="col-md-12 mb-4">
                        <div class="card destaque-2 text-white" style="background: url('<?php echo get_the_post_thumbnail_url( $post_destaque_ids[1], 'large') ;?>')">
                            <a class="destaque-link" href="<?php echo get_permalink( $post_destaque_ids[1] );?>">   
                                <div class="text">
                                    <div class="text-content">
                                        <?php 
                                            $resumo = apply_filters('the_excerpt', get_post_field('post_excerpt', $post_destaque_ids[1]));
                                            if($resumo != '' && $resumo != null){
                                                echo "<p class='text-white metade-espaco'>".$resumo."</p>";
                                            }else{
                                                echo "<p class='text-white metade-espaco'>".wp_trim_words( get_post_field('post_content', $post_destaque_ids[0] ),12,'...')."</p>";
                                            }
                                        ?>    
                                        <p class="destaquesData"><?php echo get_the_date('d M Y',$post_destaque_ids[1]);?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 metade-espaco">
                        <div class="card destaque-3 text-white" style="background: url('<?php echo get_the_post_thumbnail_url( $post_destaque_ids[2], 'large') ;?>')">
                            <a class="destaque-link" href="<?php echo get_permalink( $post_destaque_ids[2] );?>">
                                <div class="text">
                                    <div class="text-content">
                                        <?php 
                                            $resumo = apply_filters('the_excerpt', get_post_field('post_excerpt', $post_destaque_ids[2]));
                                            if($resumo != '' && $resumo != null){
                                                echo "<p class='text-white metade-espaco'>".$resumo."</p>";
                                            }else{
                                                echo "<p class='text-white metade-espaco'>".wp_trim_words( get_post_field('post_content', $post_destaque_ids[0] ),12,'...')."</p>";
                                            }
                                        ?> 
                                        <p class="destaquesData"><?php echo get_the_date('d M Y',$post_destaque_ids[2]);?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class=" col-12 col-md-6 espaco">
                        <div class="card destaque-4 text-white" style="background: url('<?php echo get_the_post_thumbnail_url( $post_destaque_ids[3], 'large') ;?>')">
                            <a class="destaque-link" href="<?php echo get_permalink( $post_destaque_ids[3] );?>">
                                <div class="text">
                                    <div class="text-content">
                                        <?php 
                                            $resumo = apply_filters('the_excerpt', get_post_field('post_excerpt', $post_destaque_ids[3]));
                                            if($resumo != '' && $resumo != null){
                                                echo "<p class='text-white metade-espaco'>".$resumo."</p>";
                                            }else{
                                                echo "<p class='text-white metade-espaco'>".wp_trim_words( get_post_field('post_content', $post_destaque_ids[0] ),12,'...')."</p>";
                                            }
                                        ?> 
                                        <p class="destaquesData"><?php echo get_the_date('d M Y',$post_destaque_ids[3]);?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>

</section>
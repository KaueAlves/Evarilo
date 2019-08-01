<?php

get_header(); 

//Post Type
$post_type = get_post_type();

global $horizon_theme_options;
$horizon_theme_options['tipo_de_listagem'] = isset($horizon_theme_options['tipo_de_listagem']) ? $horizon_theme_options['tipo_de_listagem'] : 'grid';
?>

<section class="content-area metade-espaco-top">
    <main class="container"> 
        <section class="row">
            <article class="col-12 col-md-8">
                <div id="content" class="site-content espaco <?php if($horizon_theme_options['tipo_de_listagem'] == "grid"){echo "gallery-wrapper";}?>" role="main">
                <div class="col-md-6 grid-sizer"></div>
                    <?php
                        include( locate_template( 'template-parts/listagem/listagem-'.$horizon_theme_options['tipo_de_listagem'].'.php' ));
                    ?>
                </div>
            </article>
            <?php 
                get_sidebar();  
            ?>
        </section>
    </main>
</section>

<?php get_footer(); ?>
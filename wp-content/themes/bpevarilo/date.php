<?php

get_header(); 

//Post Type
$post_type = get_post_type();

global $wp_query;
global $horizon_theme_options;
$horizon_theme_options['tipo_de_listagem'] = isset($horizon_theme_options['tipo_de_listagem']) ? $horizon_theme_options['tipo_de_listagem'] : 'grid';
$cat_name = isset($_GET['category']) ? $_GET['category'] : "";
$year     = get_query_var('year');
$monthnum = get_query_var('monthnum') != 0 ? get_query_var('monthnum') : '';

$args = array(
    'posts_per_page' => 10,
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    'orderby'   => 'ID',
    'order'     => 'DESC',
    'category_name' => $cat_name,
    'ignore_sticky_posts' => 1,
    'date_query' => array(
        array(
            'year' => $year,
            'month' => $monthnum,
        ),
    ),      
);

$wp_query = new WP_Query($args);
?>

<section class="content-area metade-espaco-top">
    <main class="container"> 
        <section class="row">
            <?php
                if(single_cat_title('', false)){
                    $title = single_cat_title('', false);
                }elseif($post->post_type){
                    $title = get_post_type_object( $post->post_type )->label;
                }else{
                    $title = "Voltar";
                }
                if(!is_home()){
                     echo "<div class='link-back espaco t-26 col-12'><a href='javascript:history.go(-1)' class='t-26'><i class='icon-ic_arrow_back_24px'></i></a><h2 class='text-uppercase t-26'>".$title."</h2></div>";
                }else{ ?>
                    <div class='link-back espaco t-26 col-12'><h2 class='text-uppercase t-26'><?php echo bloginfo('name') ?></h2></div>
               <?php }
            ?>
            <article class="col-12 col-md-8">
                <div id="content" class="site-content" role="main">
                    <?php
                        include( locate_template( 'template-parts/listagem/listagem-'.$horizon_theme_options['tipo_de_listagem'].'.php' ));
                    ?>
                </div>
            </article>

            <?php 
                get_sidebar();  
            ?>
            
        </section>
        <?php imprimirTagsCompartilhamento(); ?>
    </main>
</section>

<?php get_footer(); ?>
<?php
/**
* Template Name: Listagem
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
    get_header(); 

    $wp_query = new WP_Query( array(
        'post_type' => 'universo',
        'orderby' => 'post_date',
        'order' => 'ASC',
      )); 
?>

<section class="content-area metade-espaco-top">
    <main class="container"> 
        <section class="row">
            <article class="col-12 col-md-12">
                <div id="content" class="site-content espaco" role="main">
                    <?php
                        include( locate_template( 'template-parts/listagem/listagem-grid.php' ));
                    ?>
                </div>
            </article>
        </section>
    </main>
</section>

<?php get_footer(); ?>



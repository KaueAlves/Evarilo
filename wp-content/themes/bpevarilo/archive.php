<?php
    get_header(); 
?>

<section class="content-area metade-espaco-top">
    <main class="container"> 
        <section class="row">
            <article class="col-12 col-md-12">
                <div id="content" class="site-content espaco gallery-wrapper" role="main">
                <div class="col-md-4 grid-sizer"></div>
                    <?php
                        include( locate_template( 'template-parts/listagem/listagem-grid.php' ));
                    ?>
                </div>
            </article>
        </section>
    </main>
</section>

<?php get_footer(); ?>
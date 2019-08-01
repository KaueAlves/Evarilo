<?php
/*
Template Name: SEARCH
*/
?>
<?php 
    global $horizon_theme_options;
    $horizon_theme_options['tipo_de_listagem'] = isset($horizon_theme_options['tipo_de_listagem']) ? $horizon_theme_options['tipo_de_listagem'] : 'grid';
    get_header(); 
    get_template_part( 'template-parts/subheaders/content', 'search' );
?>

<section class="">
    <div class="container">
        <div class="row">
        <?php echo "<div class='link-back metade-espaco t-26 col-12'><a href='javascript:history.go(-1)' class='t-26'><i class='icon-ic_arrow_back_24px'></i></a><h2 class='text-uppercase t-26'>Pesquisa</h2></div>"; ?>
            <div class="col-md-8">
                <?php get_template_part( 'template-parts/listagem/listagem', $horizon_theme_options['tipo_de_listagem'] ); ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
        <div>
            <?php imprimirTagsCompartilhamento();?>
        </div>
    </div>
</section>

<?php get_footer();?>



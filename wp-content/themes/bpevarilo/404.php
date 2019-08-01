<?php 
get_header(); 

?>
<section class="content-area espaco-top espaco">
    <main class="container"> 
    <?php echo "<div class='link-back t-26 espaco'><a href='javascript:history.go(-1)' class='t-26'><i class='icon-ic_arrow_back_24px'></i></a><h2 class='text-uppercase t-26'>Voltar</h2></div>"; ?>
        <section class="row">
            <article class="col-12">

                <div id="content" class="site-content" role="main">
                    <div class="row espaco">
                        <div class="col-md-6 h-100">
                            <h2 class="text-center t-164 t-verde">404</h2>
                            <h3 class="text-center t-40 t-verde espaco">PÁGINA NÃO ENCONTRADA</h3>
                            <div class="div-btn-right">
                                <a href="<?php echo get_site_url();?>" class="btn-2">Início</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <img class="w-100 h-100"src="<?php echo get_site_url();?>\wp-content\themes\horizon\img\conheca-3.jpg" alt="">
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
</section>

<?php get_footer();?>


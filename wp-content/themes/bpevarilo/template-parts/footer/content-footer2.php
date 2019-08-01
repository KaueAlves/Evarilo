<?php 
    global $horizon_theme_options; 

    $horizon_theme_options['endereco_parte_1'] = isset($horizon_theme_options['endereco_parte_1']) ? $horizon_theme_options['endereco_parte_1'] : "Av. Professor Frederico Hermann Junior, 345";
    $horizon_theme_options['endereco_parte_2'] = isset($horizon_theme_options['endereco_parte_2']) ? $horizon_theme_options['endereco_parte_2'] : "Alto de Pinheiros - CEP 05459-900 - São Paulo";
    
    $horizon_theme_options['telefone_1'] = isset($horizon_theme_options['telefone_1']) ? $horizon_theme_options['telefone_1'] : "+55 11 3133-3000";
    $horizon_theme_options['telefone_2'] = isset($horizon_theme_options['telefone_2']) ? $horizon_theme_options['telefone_2'] : "";

    $horizon_theme_options['facebook'] = isset($horizon_theme_options['facebook']) ? $horizon_theme_options['facebook'] : "https://www.facebook.com/infraeambiente";
    $horizon_theme_options['twitter'] = isset($horizon_theme_options['twitter']) ? $horizon_theme_options['twitter'] : "https://twitter.com/infraeambiente";
    $horizon_theme_options['instagram'] = isset($horizon_theme_options['instagram']) ? $horizon_theme_options['instagram'] : "https://www.instagram.com/reporterambiental";
    $horizon_theme_options['flicker'] = isset($horizon_theme_options['flicker'] ) ? $horizon_theme_options['flicker'] : "";
    $horizon_theme_options['youtube'] = isset($horizon_theme_options['youtube']) ? $horizon_theme_options['youtube'] : "https://www.youtube.com/user/ambientesp";

?>
    <footer class="main-footer footer2">
        <section class="footer-content">
            <section class="container footer-content-container">

                <section class="row footer-content-row flex-row-reverse">
                    <div class="text-center text-md-right footer-instituicoes ">
                        <?php // dynamic_sidebar( 'footer-1' ); ?>
                        <a href="http://ambiente.sp.gov.br"><img style="height:50px;" class="t109" src="<?php echo SMA_HORIZON_THEME_URL; ?>/img/icones/SMA.png" alt="SMA"></a>
                        <a href="http://www.saopaulo.sp.gov.br/"><img style="height:120px;" class="t109" src="<?php echo SMA_HORIZON_THEME_URL; ?>/img/icones/BRASAO_GOV_SP_V.png" alt="Governo São Paulo"></a>
                    </div>
                </section>

                <section class="bar-green-container">
                    <section class="row bar-green-row flex-row-reverse">
                        <div class="col-md-6 "><div class="col-12 bar-green"></div></div>
                    </section>
                </section>
                <section class="row footer-content-row flex-row-reverse">
                    <div class="col-md-6 d-flex flex-row-reverse text-right telefone">
                        <?php /// dynamic_sidebar( 'footer-2' );?>
                        <i class="fa fa-phone"></i>
                        <p><?php echo $horizon_theme_options['telefone_1']." ".$horizon_theme_options['telefone_2']; ?></p>
                    </div>
                    <div class="col-12 d-flex flex-row-reverse text-right endereco">
                        <?php // dynamic_sidebar( "footer-3" ); ?>
                        <i class="fa fa-globe"></i>
                        <p><?php echo $horizon_theme_options['endereco_parte_1'] ;?><br>
                        <?php echo $horizon_theme_options['endereco_parte_2'] ;?></p>
                    </div>
                </section>
            </section>
        </section>
        <a id="back-to-top" href="#top"><i class="fa fa-long-arrow-up"></i></a>
        
       <?php include(locate_template('template-parts/footer/social.php')); ?>
    </footer>
    <?php wp_footer();?>
</body>
</html>
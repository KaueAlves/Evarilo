<?php global $horizon_theme_options; 

$horizon_theme_options['endereco_parte_1'] = isset($horizon_theme_options['endereco_parte_1']) ? $horizon_theme_options['endereco_parte_1'] : "Av. Professor Frederico Hermann Junior, 345";
$horizon_theme_options['endereco_parte_2'] = isset($horizon_theme_options['endereco_parte_2']) ? $horizon_theme_options['endereco_parte_2'] : "Alto de Pinheiros - CEP 05459-900 - São Paulo";

$horizon_theme_options['telefone_1'] = isset($horizon_theme_options['telefone_1']) ? $horizon_theme_options['telefone_1'] : "+55 11 3133-3000";
$horizon_theme_options['telefone_2'] = isset($horizon_theme_options['telefone_2']) ? $horizon_theme_options['telefone_2'] : "";

$horizon_theme_options['facebook'] = isset($horizon_theme_options['facebook']) ? $horizon_theme_options['facebook'] : "https://www.facebook.com/infraeambiente";
$horizon_theme_options['twitter'] = isset($horizon_theme_options['twitter']) ? $horizon_theme_options['twitter'] : "https://twitter.com/infraeambiente";
$horizon_theme_options['instagram'] = isset($horizon_theme_options['instagram']) ? $horizon_theme_options['instagram'] : "https://www.instagram.com/reporterambiental";
$horizon_theme_options['flicker'] = isset($horizon_theme_options['flicker'] ) ? $horizon_theme_options['flicker'] : "";
$horizon_theme_options['youtube'] = isset($horizon_theme_options['youtube']) ? $horizon_theme_options['youtube'] : "https://www.youtube.com/user/ambientesp";

$horizon_theme_options['divisoes_footer'] = isset($horizon_theme_options['divisoes_footer']) ?  $horizon_theme_options['divisoes_footer'] : 4;
$horizon_theme_options['mostrar_borda_top'] = isset($horizon_theme_options['mostrar_borda_top']) ?  $horizon_theme_options['mostrar_borda_top'] : false;
$horizon_theme_options['cor_footer'] = isset($horizon_theme_options['cor_footer']) ?  $horizon_theme_options['cor_footer'] : "#494d50";
$horizon_theme_options['cor_borda_top'] = isset($horizon_theme_options['cor_borda_top']) ?  $horizon_theme_options['cor_borda_top'] : "#dfdfdf";

?>

    <footer class="main-footer footer3" style="<?php footer_class($horizon_theme_options['cor_footer'],$horizon_theme_options['mostrar_borda_top'],$horizon_theme_options['cor_borda_top']); ?>">
        <section class="footer-content padding-top espaco">
            <div class="container">

                <div class="row footer-content-row">
                   <div class="col-md-8">
                        <div class="col-12 row">

                            <?php 
                            
                                for ($i=1; $i <= $horizon_theme_options['divisoes_footer']; $i++) { 
                                    $divAux = "col-md-".(12/$horizon_theme_options['divisoes_footer']);
                                    ?>
                                        <div class="<?php echo $divAux;?>">
                                            <?php if ( is_active_sidebar( 'footer-'.$i) ) : ?>
                                                <div class="mb-2"><?php dynamic_sidebar("footer-".$i) ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php
                                }
                            
                            ?>
                       </div>
                   </div>                  
                    <div class="col-md-4">
                    <?php if ( is_active_sidebar( 'footer-5') ) : ?>

                        <div class="text-center text-md-right footer-instituicoes  bar-white">
                             <div class="mb-2"><?php dynamic_sidebar("footer-5") ?></div>
                        </div>
                        <?php else: ?>
                            <div class="text-center text-md-right footer-instituicoes  bar-white"></div>
                        <?php endif ?>

                        <div class="row footer-content-row flex-row-reverse">
                            <div class="col-md-12 d-flex flex-row-reverse text-right telefone">
                                <?php if(isset($horizon_theme_options['telefone_1']) && !empty($horizon_theme_options['telefone_1'])){ ?>
                                    <i class="fa fa-phone"></i>
                                    <p><?php echo (isset($horizon_theme_options['telefone_1'])?$horizon_theme_options['telefone_1']:'')." ".(isset($horizon_theme_options['telefone_2'])?$horizon_theme_options['telefone_2']:''); ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-12 d-flex flex-row-reverse text-right endereco">
                                 <?php if(isset($horizon_theme_options['endereco_parte_1']) && !empty($horizon_theme_options['endereco_parte_1'])){ ?>
                                    <i class="fa fa-globe"></i>
                                    <p><?php echo isset($horizon_theme_options['endereco_parte_1'])?$horizon_theme_options['endereco_parte_1']:'' ;?><br>
                                    <?php echo isset($horizon_theme_options['endereco_parte_2'])?$horizon_theme_options['endereco_parte_2']:'' ;?></p>
                                <?php } ?>
                            </div>
                         </div>
                    </div>
               </div>
            
            </div>
        </section>
        <a id="back-to-top" href="#top"><i class="fa fa-long-arrow-up"></i></a>
        <?php include(locate_template('template-parts/footer/social.php')); ?>
    </footer>
    <?php wp_footer();?>
</body>
</html>

<?php wp_footer();?>
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

//logo e brasao padrões
$url_logo_sma = SMA_HORIZON_THEME_URL . '/img/logo_sma_white.png';
$url_brasao_gov=SMA_HORIZON_THEME_URL . '/img/brasao_gov_sp.png';

?>

    <footer class="main-footer">
        <section class="footer-content padding-top espaco">
            <div class="container">

                <div class="row footer-content-row">
                   <div class="col-md-8">
                        <div class="col-12 row">
                                <div class="col-md-3">
                                    <?php if ( is_active_sidebar( 'footer-1') ) : ?>
                                        <div class="mb-2"><?php dynamic_sidebar("footer-1") ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-3">  
                                    <?php if ( is_active_sidebar( 'footer-2') ) : ?>
                                          <div class="mb-2"><?php dynamic_sidebar("footer-2") ?></div>
                                     <?php endif; ?>
                                </div>
                                <div class="col-md-3"> 
                                     <?php if ( is_active_sidebar( 'footer-3') ) : ?>
                                        <div class="mb-2"><?php dynamic_sidebar("footer-3") ?></div>
                                    <?php endif; ?>
                                 </div>
                                <div class="col-md-3">  
                                    <?php if ( is_active_sidebar( 'footer-4') ) : ?>
                                        <div class="mb-2"><?php dynamic_sidebar("footer-4") ?></div>
                                     <?php endif; ?>
                                 </div>
                       </div>
                   </div>                  
                    <div class="col-md-4">
                    <?php if ( is_active_sidebar( 'footer-5') ) : ?>

                        <div class="text-center text-md-right footer-instituicoes  bar-white">
                             <div class="mb-2"><?php dynamic_sidebar("footer-5") ?></div>
                        </div>
                       <?php else: ?>
                        <div class="text-center text-md-right footer-instituicoes  bar-white">
                                <div class="mb-2">
                                    <li id="media_image-6" class="widget widget_media_image">
                                        <a href="https://www.ambiente.sp.gov.br/">
                                        <img width="320" height="136" src="<?php echo $url_logo_sma ?>" class="image wp-image-80932  attachment-medium size-medium" alt="" style="max-width: 100%; height: auto;">
                                    </a>
                                    </li>
                                    <li id="media_image-7" class="widget widget_media_image">
                                        <a href="http://www.saopaulo.sp.gov.br/">
                                            <img width="192" height="136" src="<?php echo $url_brasao_gov ?>" class="image wp-image-83106  attachment-full size-full" alt="" style="max-width: 100%; height: auto;">
                                        </a>
                                    </li>
                                </div>
                         </div>
                         <?php endif ?>

                        <div class="row footer-content-row flex-row-reverse">
                            <div class="col-md-12 d-flex flex-row-reverse text-right telefone">
                                <?php if(isset($horizon_theme_options['telefone_1']) && !empty($horizon_theme_options['telefone_1'])){ ?>
                                    <i class="fa fa-2x fa-phone"></i>
                                    <p><?php echo (isset($horizon_theme_options['telefone_1'])?$horizon_theme_options['telefone_1']:'')." ".(isset($horizon_theme_options['telefone_2'])?$horizon_theme_options['telefone_2']:''); ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-12 d-flex flex-row-reverse text-right endereco">
                                 <?php if(isset($horizon_theme_options['endereco_parte_1']) && !empty($horizon_theme_options['endereco_parte_1'])){ ?>
                                    <i class="fa fa-2x fa-globe"></i>
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
        <?php get_template_part("template-parts/footer/ext/ext","barradogovernofooter");?>
    </footer>
</body>
</html>
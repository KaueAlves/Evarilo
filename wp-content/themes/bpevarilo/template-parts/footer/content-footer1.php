<?php global $horizon_theme_options; 

$horizon_theme_options['endereco_parte_1'] = isset($horizon_theme_options['endereco_parte_1']) ? $horizon_theme_options['endereco_parte_1'] : "Av. Professor Frederico Hermann Junior, 345";
$horizon_theme_options['endereco_parte_2'] = isset($horizon_theme_options['endereco_parte_2']) ? $horizon_theme_options['endereco_parte_2'] : "Alto de Pinheiros - CEP 05459-900 - São Paulo";

$horizon_theme_options['telefone_1'] = isset($horizon_theme_options['telefone_1']) ? $horizon_theme_options['telefone_1'] : "+55 11 3133-3000";
$horizon_theme_options['telefone_2'] = isset($horizon_theme_options['telefone_2']) ? $horizon_theme_options['telefone_2'] : "";

$horizon_theme_options['facebook'] = isset($horizon_theme_options['facebook']) ? $horizon_theme_options['facebook'] : "";
$horizon_theme_options['twitter'] = isset($horizon_theme_options['twitter']) ? $horizon_theme_options['twitter'] : "";
$horizon_theme_options['instagram'] = isset($horizon_theme_options['instagram']) ? $horizon_theme_options['instagram'] : "";
$horizon_theme_options['flicker'] = isset($horizon_theme_options['flicker'] ) ? $horizon_theme_options['flicker'] : "";
$horizon_theme_options['youtube'] = isset($horizon_theme_options['youtube']) ? $horizon_theme_options['youtube'] : "";

$horizon_theme_options['divisoes_footer'] = isset($horizon_theme_options['divisoes_footer']) ?  $horizon_theme_options['divisoes_footer'] : 4;
$horizon_theme_options['mostrar_borda_top'] = isset($horizon_theme_options['mostrar_borda_top']) ?  $horizon_theme_options['mostrar_borda_top'] : false;
$horizon_theme_options['cor_footer'] = isset($horizon_theme_options['cor_footer']) ?  $horizon_theme_options['cor_footer'] : "#494d50";
$horizon_theme_options['cor_borda_top'] = isset($horizon_theme_options['cor_borda_top']) ?  $horizon_theme_options['cor_borda_top'] : "#dfdfdf";

?>

    <footer class="main-footer footer ">
        <section class="footer-content padding-top footer-evarilo">
            <div class="container">
                <img width="75%" src="<?php echo SMA_HORIZON_THEME_URL."/img/sombra-evarilo-e-zunto-1-e1509368932158-1.png";?>" alt="">
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
                    
               </div>
            
            </div>
        </section>
        <?php include(locate_template('template-parts/footer/social.php')); ?>
    </footer>
    <?php wp_footer();?>
</body>
</html>
<section class="main-footer-copyright">
            <section class="container footer-copyright-container">
                <section class="row flex-row-reverse footer-copyright-row">
                    <div class="col-12 col-md-2 social-icon text-center">

                        <?php if(isset($horizon_theme_options['twitter']) && !empty($horizon_theme_options['twitter'])){?>
                          <a href="<?php echo $horizon_theme_options['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                        <?php } ?>
                        <?php if(isset($horizon_theme_options['facebook']) && !empty($horizon_theme_options['facebook'])){?>
                            <a href="<?php echo $horizon_theme_options['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                        <?php } ?>
                        <?php if(isset($horizon_theme_options['instagram']) && !empty($horizon_theme_options['instagram'])){?>
                            <a href="<?php echo $horizon_theme_options['instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                        <?php } ?>

                        <?php if(isset($horizon_theme_options['youtube']) && !empty($horizon_theme_options['youtube'])){?>
                            <a href="<?php echo $horizon_theme_options['youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                        <?php } ?>

                    </div>
                    <div class="col-12 col-md-10 text-center copyright">
                    <?php if(is_main_site()) {?>
                        <?php echo date('Y'); ?> | Secretaria de Infraestrutura e Meio Ambiente 
                    <?php }else{ ?>
                        <?php echo date('Y'); ?> | Secretaria de Infraestrutura e Meio Ambiente | <?php bloginfo('name') ?>
                    <?php } ?>
                    </div>
                    
                </section>
            </section>
        </section>
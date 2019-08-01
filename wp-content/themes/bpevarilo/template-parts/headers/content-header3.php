<?php

    //Carrega as opções do personalizar 
    global $horizon_theme_options;

    $horizon_theme_options['header_padrao'] = isset($horizon_theme_options['header_padrao']) ? $horizon_theme_options['header_padrao'] : "header1";
    $horizon_theme_options['header_padrao_2'] = isset($horizon_theme_options['header_padrao_2']) ? $horizon_theme_options['header_padrao_2'] : "header2";

?>
<header style="background-image: url(<?php header_image(); ?>);" class="main-header header3">
    
    <section class="container">
        <section class="header-content row">
            <?php includeLogo();?>
            <div class="primary-title col-12 col-md-10 ?>" <?php if(!has_custom_logo()){echo "style='margin-left: 1.2%;'";}?>>
                <h1><span class="guia-espaco"><?php
                    if(isset($horizon_theme_options['title_parte_1']) && !empty($horizon_theme_options['title_parte_1'])){ ?>
                    <a href="<?php echo bloginfo('url') ?>"> <?php echo $horizon_theme_options['title_parte_1'] ?></a>
                <?php  }else{ ?>
                <a href="<?php echo bloginfo('url') ?>/"> <?php echo bloginfo('name'); ?></a>
                <?php  }?></span><br>
                <span class="areasp-espaco"><?php 
                if(isset($horizon_theme_options['title_parte_2']) && !empty($horizon_theme_options['title_parte_2']) ){
                    echo $horizon_theme_options['title_parte_2'];}
                else{
                    echo 'Secretaria de Infraestrutura e Meio Ambiente do Estado de São Paulo'; //default
                }?></span></h1>
            </div>
        </section>
    </section>

    <?php
        get_template_part('template-parts/menus/menu', 'duplo');
    ?>
</header>

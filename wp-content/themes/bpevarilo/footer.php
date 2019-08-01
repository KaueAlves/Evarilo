<?php
    global $horizon_theme_options;

    $mod_footer = isset($horizon_theme_options['modelo_de_footer']) ? $horizon_theme_options['modelo_de_footer'] : "footer1";

    switch ($mod_footer) {
        case 'footer2':
            include(locate_template('template-parts/footer/content-footer2.php'));
            break;
        
        default:
            include(locate_template('template-parts/footer/content-footer1.php'));
            break;
    }

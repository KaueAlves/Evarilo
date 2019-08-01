<?php
    //Carrega as opções do personalizar 
    global $horizon_theme_options;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <?php insert_fb_in_head(); ?>
    <title><?php echo get_bloginfo( 'name' );?></title>
    <?php get_template_part( 'template-parts/headers/content','analytics' ); ?>
    <?php wp_head();?>
</head>
<body <?php body_class()?>>

<?php
    do_action("before-evarilo-menu");
    get_template_part( 'template-parts/headers/content','evarilo' );
?>
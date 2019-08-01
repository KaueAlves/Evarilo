<?php
    $wp_customize->add_section('horizon_general_options', array(
        'title'    => __('Horizon Options', 'horizon'),
        'description' => '',
        'priority' => 120,
    ));

    // Titulo Principal

    $wp_customize->add_setting('horizon_theme_options[title_parte_1]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('horizon_title_parte_1', array(
        'label'      => __('Primeira parte do titulo', 'horizon'),
        'section'    => 'horizon_general_options',
        'settings'   => 'horizon_theme_options[title_parte_1]',
    ));

    $wp_customize->add_setting('horizon_theme_options[title_parte_2]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('horizon_title_parte_2', array(
        'label'      => __('Segunda parte do titulo', 'horizon'),
        'section'    => 'horizon_general_options',
        'settings'   => 'horizon_theme_options[title_parte_2]',
    ));


    // Redes Sociais 

    $wp_customize->add_setting('horizon_theme_options[facebook]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    
      ));
    
    $wp_customize->add_control('horizon_facebook', array(
        'label'      => __('Link completo para Facebook', 'horizon'),
        'section'    => 'horizon_general_options',
        'settings'   => 'horizon_theme_options[facebook]',
    ));
    
    $wp_customize->add_setting('horizon_theme_options[twitter]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    
      ));
    
    $wp_customize->add_control('horizon_twitter', array(
        'label'      => __('Link completo para Twitter', 'horizon'),
        'section'    => 'horizon_general_options',
        'settings'   => 'horizon_theme_options[twitter]',
    ));

    $wp_customize->add_setting('horizon_theme_options[instagram]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    
      ));
    
    $wp_customize->add_control('horizon_instagram', array(
        'label'      => __('Link completo para Instagram', 'horizon'),
        'section'    => 'horizon_general_options',
        'settings'   => 'horizon_theme_options[instagram]',
    ));

    $wp_customize->add_setting('horizon_theme_options[flickr]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    
      ));
    
    $wp_customize->add_control('horizon_flickr', array(
        'label'      => __('Link completo para Flickr', 'horizon'),
        'section'    => 'horizon_general_options',
        'settings'   => 'horizon_theme_options[flickr]',
    ));

    $wp_customize->add_setting('horizon_theme_options[youtube]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    
      ));
    
    $wp_customize->add_control('horizon_youtube', array(
        'label'      => __('Link completo para YouTube', 'horizon'),
        'section'    => 'horizon_general_options',
        'settings'   => 'horizon_theme_options[youtube]',
    ));

// Informações do Site

    $wp_customize->add_setting('horizon_theme_options[endereco_parte_1]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    
      ));
    
    $wp_customize->add_control('horizon_endereco_parte_1', array(
        'label'      => __('Endereço parte 1', 'horizon'),
        'section'    => 'horizon_general_options',
        'settings'   => 'horizon_theme_options[endereco_parte_1]',
    ));

    $wp_customize->add_setting('horizon_theme_options[endereco_parte_2]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    
      ));
    
    $wp_customize->add_control('horizon_endereco_parte_2', array(
        'label'      => __('Endereço parte 2', 'horizon'),
        'section'    => 'horizon_general_options',
        'settings'   => 'horizon_theme_options[endereco_parte_2]',
    ));

    $wp_customize->add_setting('horizon_theme_options[telefone_1]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    
      ));
    
    $wp_customize->add_control('horizon_telefone_1', array(
        'label'      => __('Telefone 1', 'horizon'),
        'section'    => 'horizon_general_options',
        'settings'   => 'horizon_theme_options[telefone_1]',
    ));

    $wp_customize->add_setting('horizon_theme_options[telefone_2]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    
      ));
    
    $wp_customize->add_control('horizon_telefone_2', array(
        'label'      => __('Telefone 2', 'horizon'),
        'section'    => 'horizon_general_options',
        'settings'   => 'horizon_theme_options[telefone_2]',
    ));

// ============= Mostrar ou Esconder as Datas ====================

    $wp_customize->add_setting('horizon_theme_options[mostrar_datas]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('mostrar_datas', array(
        'type'        => 'checkbox',
        'description' => 'Marque caso deseje que as datas das postagens sejam mostradas',
        'label'       => __('Mostrar Datas', 'horizon'),
        'section'     => 'horizon_general_options',
        'settings'    => 'horizon_theme_options[mostrar_datas]',
    ));

// =============  

// ============= Mostrar ou Esconder as Compartilhamento nos arquivos ====================

$wp_customize->add_setting('horizon_theme_options[mostrar_compartilhamentos]', array(
    'default'        => '',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',

));

$wp_customize->add_control('mostrar_compartilhamentos', array(
    'type'        => 'checkbox',
    'description' => 'Marque caso deseje que os links de compartilhamentos das postagens sejam mostrados',
    'label'       => __('Mostrar Compartilhamentos', 'horizon'),
    'section'     => 'horizon_general_options',
    'settings'    => 'horizon_theme_options[mostrar_compartilhamentos]',
));

// =============

    $wp_customize->add_setting('horizon_theme_options[header_padrao]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('header_padrao', array(
        'type'        => 'select',
        'description' => 'Escolha o tipo de header primario do site, referente a home',
        'label'       => __('Header primário', 'horizon'),
        'section'     => 'horizon_general_options',
        'settings'    => 'horizon_theme_options[header_padrao]',
        'default'     => 'header1',
        'choices'     => array('header1' => 'header1','header2'=>'header2','header3'=>'header3','header4'=>'header4'),
    ));

    $wp_customize->add_setting('horizon_theme_options[header_padrao_2]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('header_padrao_2', array(
        'type'        => 'select',
        'description' => 'Escolha o tipo de header secundario do site, referente a páginas internas',
        'label'       => __('Header secundário', 'horizon'),
        'section'     => 'horizon_general_options',
        'settings'    => 'horizon_theme_options[header_padrao_2]',
        'default'     => 'header1',
        'choices'     => array('header1' => 'header1','header2'=>'header2','header3'=>'header3','header4'=>'header4'),
    ));

// ================= Tipo de Listagem

$wp_customize->add_setting('horizon_theme_options[tipo_de_listagem]', array(
    'default'        => '',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
));

$wp_customize->add_control('tipo_de_listagem', array(
    'type'        => 'select',
    'description' => 'Escolha o tipo de listagem do site, referente a páginas arquivos',
    'label'       => __('Tipo de Listagem', 'horizon'),
    'section'     => 'horizon_general_options',
    'settings'    => 'horizon_theme_options[tipo_de_listagem]',
    'default'     => 'post',
    'choices'     => array('grid' => 'grid','blog'=>'blog'),
));

// ================ Footer

    $wp_customize->add_section('horizon_theme_footer', array(
        'title'    => __('Horizon Footer', 'horizon'),
        'description' => '',
        'priority' => 120,
    ));

    // ================= Modelo de Footer

    $wp_customize->add_setting('horizon_theme_options[modelo_de_footer]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    
    $wp_customize->add_control('modelo_de_footer', array(
        'type'        => 'select',
        'description' => 'Escolha o modelo do footer do site',
        'label'       => __('Modelo de Footer', 'horizon'),
        'section'     => 'horizon_theme_footer',
        'settings'    => 'horizon_theme_options[modelo_de_footer]',
        'default'     => 'footer1',
        'choices'     => array('footer1' => 'footer1','footer2'=>'footer2'),
    ));

    // ================= Cor do background

    $wp_customize->add_setting('horizon_theme_options[cor_footer]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('cor_footer', array(
        'type'        => 'color',
        'description' => 'Escolha a cor de fundo do Footer',
        'label'       => __('Cor de fundo', 'horizon'),
        'section'     => 'horizon_theme_footer',
        'settings'    => 'horizon_theme_options[cor_footer]',
        'default'    => '#494d50',
    ));

    // Cor dos titulos do Footer

    $wp_customize->add_setting('horizon_theme_options[cor_titulos]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('cor_titulos', array(
        'type'        => 'color',
        'description' => 'Escolha a cor dos titulos do Footer',
        'label'       => __('Cor dos titulos', 'horizon'),
        'section'     => 'horizon_theme_footer',
        'settings'    => 'horizon_theme_options[cor_titulos]',
        'default'    => '#B6D369',
    ));

    // Cor dos textos do Footer

    $wp_customize->add_setting('horizon_theme_options[cor_texto]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('cor_texto', array(
        'type'        => 'color',
        'description' => 'Escolha a cor dos textos do Footer',
        'label'       => __('Cor dos textos e links', 'horizon'),
        'section'     => 'horizon_theme_footer',
        'settings'    => 'horizon_theme_options[cor_texto]',
        'default'    => '#fff',
    ));

    // Cor do hover dos links

    $wp_customize->add_setting('horizon_theme_options[cor_texto_hover]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('cor_texto_hover', array(
        'type'        => 'color',
        'description' => 'Escolha a cor dos textos do Footer',
        'label'       => __('Cor do hover dos textos e links', 'horizon'),
        'section'     => 'horizon_theme_footer',
        'settings'    => 'horizon_theme_options[cor_texto_hover]',
        'default'    => '#62B200',
    ));

    // ============= Mostrar ou Esconder as Datas ====================

    $wp_customize->add_setting('horizon_theme_options[mostrar_borda_top]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('mostrar_borda_top', array(
        'type'        => 'checkbox',
        'description' => 'Adicionar uma borda ao footer',
        'label'       => __('Mostrar borda top', 'horizon'),
        'section'     => 'horizon_theme_footer',
        'settings'    => 'horizon_theme_options[mostrar_borda_top]',
    ));

    // ================= Cor da Borda

     $wp_customize->add_setting('horizon_theme_options[cor_borda_top]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('cor_borda_top', array(
        'type'        => 'color',
        'description' => 'Escolha a cor da borda',
        'label'       => __('Cor da borda', 'horizon'),
        'section'     => 'horizon_theme_footer',
        'settings'    => 'horizon_theme_options[cor_borda_top]',
        'default'    => '#dfdfdf',
    ));

    // ================= Cor da Borda

    $wp_customize->add_setting('horizon_theme_options[cor_borda_mid]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('cor_borda_mid', array(
        'type'        => 'color',
        'description' => 'Escolha a cor da borda',
        'label'       => __('Cor da borda meio', 'horizon'),
        'section'     => 'horizon_theme_footer',
        'settings'    => 'horizon_theme_options[cor_borda_mid]',
        'default'    => '#dfdfdf',
    ));

    // ================= Quant. Divisões    

    $wp_customize->add_setting('horizon_theme_options[divisoes_footer]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('divisoes_footer', array(
        'type'        => 'select',
        'description' => 'Escolha a quantidade de divisões adicionais no footer',
        'label'       => __('Quant. Divisões', 'horizon'),
        'section'     => 'horizon_theme_footer',
        'settings'    => 'horizon_theme_options[divisoes_footer]',
        'default'     => '1',
        'choices'     => array('1'=>1,'2'=>2,'3'=>3,'4'=>4),
    ));


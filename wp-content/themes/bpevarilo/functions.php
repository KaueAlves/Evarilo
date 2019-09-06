<?php

//Define variaveis de caminho

$includes_path = get_template_directory() . '/inc/';

define('SMA_HORIZON_THEME_URL',get_template_directory_uri());
define('SMA_HORIZON_THEME_PATH',get_template_directory());
define('SMA_HORIZON_INCLUDES',$includes_path);

//Menu personalizado Bootstrap 4
require_once(SMA_HORIZON_INCLUDES . "templates/class-wp-bootstrap-navwalker.php");

class SmaHorizon_Init {
    public function __construct() {

        /**
         * Admin Custom Meta Boxes
         */
        include_once SMA_HORIZON_INCLUDES . 'metaboxes.php';
    
        /**
         * Admin Custom Meta Box Fields
         */
        include_once SMA_HORIZON_INCLUDES . 'register-metabox-types.php';
        
        
    }
}

global $horizon_theme_options; 
$horizon_theme_options = get_option('horizon_theme_options');

$sma_horizon = new SmaHorizon_Init();

//Theme Options

if ( ! function_exists( 'horizon_config' ) ) {
    function horizon_config(){
    
        //Registra Menus do Tema
        register_nav_menus(
            array(
                'sma-horizon_main_menu' => 'Main Menu',
                'sma-horizon_secondary_menu' => 'Secondary Menu',
                'sma-horizon_footer_menu' => 'Footer Menu',
                'sma-horizon_fsecondary_menu' => 'FSecondary Menu'
            )
        );

        
    
        //Registra SideBars
        function horizon_widgets_init() {

            // Sidebar Principal
            register_sidebar( array(
                'name'          => esc_html__( 'Sidebar Principal' ),
                'id'            => 'primary',
                'before_widget' => '<li id="%1$s" class="widget %2$s metade-espaco-top">',
                'after_widget'  => "<div class='borda-bottom-clara'></div></li>\n",
                'before_title'  => '<h3 class="widgettitle metade-espaco">',
                'after_title'   => "</h3>\n",
                'description'   => esc_html__( 'The default sidebar used in two or three-column layouts.', 'greenture' ),
                 )
             );

            $args = array(
                'name'          => 'Barra Lateral %d',
                'id'            => "sidebar",
                'description'   => '',
                'class'         => '',
                'before_widget' => '<li id="%1$s" class="widget %2$s metade-espaco-top">',
                'after_widget'  => "<div class='borda-bottom-clara'></div></li>\n",
                'before_title'  => '<h3 class="widgettitle metade-espaco">',
                'after_title'   => "</h3>\n",
            );
            register_sidebars( 3, $args );

            register_sidebar( array(
                'name'          => 'Widget Ta na mídia/Na Imprensa HOME' ,
                'id'            => 'ta-na-midia-home',
                'description'   => __( 'Exibe úlltimos posts da categoria Ta na mídia ou Na imprensa', 'textdomain' ),
                'before_widget' => '<li id="%1$s" class="widget %2$s">',
                'after_widget'  => "</li>\n",
                'before_title'  => '<h3 class="widgettitle metade-espaco">',
                'after_title'   => "</h3>\n",
            ) );
    
            register_sidebar( array(
                'name'          => 'Footer 1' ,
                'id'            => 'footer-1',
                'description'   => __( 'Orgãos.', 'textdomain' ),
                'before_widget' => '<li id="%1$s" class="widget %2$s">',
                'after_widget'  => "</li>\n",
                'before_title'  => '<h3 class="widgettitle metade-espaco">',
                'after_title'   => "</h3>\n",
            ) );
    
            register_sidebar( array(
                'name'          => 'Footer 2' ,
                'id'            => 'footer-2',
                'description'   => __( '', 'textdomain' ),
                'before_widget' => '<li id="%1$s" class="widget %2$s">',
                'after_widget'  => "</li>\n",
                'before_title'  => '<h3 class="widgettitle metade-espaco">',
                'after_title'   => "</h3>\n",
            ) );
    
            register_sidebar( array(
                'name'          => 'Footer 3' ,
                'id'            => 'footer-3',
                'description'   => __( '', 'textdomain' ),
                'before_widget' => '<li id="%1$s" class="widget %2$s">',
                'after_widget'  => "</li>\n",
                'before_title'  => '<h3 class="widgettitle metade-espaco">',
                'after_title'   => "</h3>\n",
            ) );
    
            register_sidebar( array(
              'name'          => 'Footer 4' ,
              'id'            => 'footer-4',
              'description'   => __( '', 'textdomain' ),
              'before_widget' => '<li id="%1$s" class="widget %2$s">',
              'after_widget'  => "</li>\n",
              'before_title'  => '<h3 class="widgettitle metade-espaco">',
              'after_title'   => "</h3>\n",
          ) );
    
          register_sidebar( array(
            'name'          => 'Footer 5' ,
            'id'            => 'footer-5',
            'description'   => __( '', 'textdomain' ),
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => "</li>\n",
            'before_title'  => '<h3 class="widgettitle metade-espaco">',
            'after_title'   => "</h3>\n",
        ) );      
    
        }add_action( 'widgets_init', 'horizon_widgets_init' );
    
        //Theme Support
        horizon_theme_support_init();
    }
}add_action( 'after_setup_theme', 'horizon_config', 0 );

//Theme Support

if ( ! function_exists( 'horizon_theme_support_init' ) ) {
    function horizon_theme_support_init(){
        //Suporte a Thumbnails
        add_theme_support( 'post-thumbnails' );

        //Suporte a Custom Header
        $args = array(
            'default-image' => SMA_HORIZON_THEME_URL.'/img/header1.jpeg',
            'width'  => 2000,
            'height' => 924
        );
        add_theme_support( 'custom-header', $args );

        //Suporte a Custom Logo
        $args = array(
            'height'      => 109,
            'width'       => 109
        );
        add_theme_support( 'custom-logo', $args );
    }
}

//Enqueue Scripts
if ( ! function_exists( 'load_scripts' ) ) {
    function load_scripts(){
        //Scripts
        wp_enqueue_script('sma-horizon-bootstrap-jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', array( ), '3.2.1', true);
        wp_enqueue_script('sma-horizon-bootstrap-jquery-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery'), '1.12.9', true);
        wp_enqueue_script('sma-horizon-datepicker-jquery', 'https://code.jquery.com/ui/1.12.0/jquery-ui.min.js', array(), '1.12.0', true );
        wp_enqueue_script('sma-horizon-bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), '4.0.0', true);
        wp_enqueue_script('sma-horizon-masonry-js','https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array(), '4.0.0', true);
        wp_enqueue_script('sma-horizon-horizon-js',SMA_HORIZON_THEME_URL.'/js/script.js', array('sma-horizon-masonry-js','sma-horizon-datepicker-jquery','sma-horizon-popup-js'), '1.0.0', true);
        wp_enqueue_script('sma-horizon-sticky-js',SMA_HORIZON_THEME_URL.'/js/sticky.js', array('sma-horizon-horizon-js'), '1.0.0', true);
        wp_enqueue_script('sma-horizon-popup-js', SMA_HORIZON_THEME_URL.'/inc/magnificpopup/jquery.magnific-popup.min.js', array(), '1.0.0', true );      

        //Styles
        wp_enqueue_style('sma-horizon-bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), '4.0.0', 'all');
        wp_enqueue_style('sma-horizon-default-css', SMA_HORIZON_THEME_URL.'/style.css', array('sma-horizon-bootstrap-css'), '1.1.1', 'all');
        wp_enqueue_style('sma-horizon-jquery-ui-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '1.12.1', 'all');
        wp_enqueue_style('sma-horizon-popup-js', SMA_HORIZON_THEME_URL.'/inc/magnificpopup/magnific-popup.css', array(), '1.12.1', 'all');
        wp_add_inline_style( 'sma-horizon-default-css', add_personalizar_css() );
    }
}add_action('wp_enqueue_scripts','load_scripts');

if( ! function_exists( 'add_personalizar_css' )){
    function add_personalizar_css(){
        global $horizon_theme_options;
        $horizon_theme_options['cor_texto'] = isset($horizon_theme_options['cor_texto']) ?  $horizon_theme_options['cor_texto'] : "#fff";
        $horizon_theme_options['cor_texto_hover'] = isset($horizon_theme_options['cor_texto_hover']) ?  $horizon_theme_options['cor_texto_hover'] : "#62B200";
        $horizon_theme_options['cor_borda_mid'] = isset($horizon_theme_options['cor_borda_mid']) ?  $horizon_theme_options['cor_borda_mid'] : "#fff";;
        $horizon_theme_options['cor_titulos'] = isset($horizon_theme_options['cor_titulos']) ?  $horizon_theme_options['cor_titulos'] : "#b6d369";

        $custom_css="
            .footer-content-row h3{
                color: {$horizon_theme_options['cor_titulos']} !important;
            }
            .footer-content-row p, .footer-content-row a{
                color: {$horizon_theme_options['cor_texto']} !important;
            }
            .footer-content-row a:hover{
                color: {$horizon_theme_options['cor_texto_hover']} !important;
            }
            .footer-instituicoes{
                border-bottom: 5px solid {$horizon_theme_options['cor_borda_mid']};
            }

        ";
        return $custom_css;
    }
}

//Shortcode
if ( ! function_exists( 'horizon_create_minislider' ) ) {
    function horizon_create_minislider($atts){
        ob_start();
            $a = shortcode_atts( array(
                'img' => null,
                'ids' => null,
            ), $atts );
    
            $urls = isset($a['img']) ? explode(',',$a['img']) : null;
            $ids = isset($a['ids']) ? explode(',',$a['ids']) : null;
    
            include_once(SMA_HORIZON_THEME_PATH."/template-parts/minislider.php");
    
            $content = ob_get_contents();
        ob_end_clean();  
        return $content;  
    }
}add_shortcode( 'horizon_minislider', 'horizon_create_minislider' );

if ( ! function_exists( 'horizon_create_destaques' ) ) {
    function horizon_create_destaques($atts){
        ob_start();
            $a = shortcode_atts( array(
                'titulo' => null,
                'categorias' => null,
            ), $atts );

            $horizon_destaques_titulo = isset($a['titulo']) ? $a['titulo'] : null;
            $horizon_destaques_categorias = isset($a['categorias']) ? explode(',',$a['categorias']) : null;

            include_once(SMA_HORIZON_THEME_PATH."/template-parts/blocos/bloco-noticias/content-destaques.php");

            $content = ob_get_contents();
        ob_end_clean();  
        return $content;  
    }
}add_shortcode( 'horizon_destaques', 'horizon_create_destaques' );

if ( ! function_exists( 'horizon_create_relacionados' ) ) {
    function horizon_create_relacionados($atts){
        ob_start();
        $a = shortcode_atts( array(
            'titulo' => null,
            'categorias' => null,
        ), $atts );

        $horizon_relacionados_titulo = isset($a['titulo']) ? $a['titulo'] : null;
        $horizon_relacionados_categorias = isset($a['categorias']) ? explode(',',$a['categorias']) : null;

        include_once(SMA_HORIZON_THEME_PATH."/template-parts/blocos/bloco-noticias/content-sliderRelacionados.php");

        $content = ob_get_contents();
        ob_end_clean();  
        return $content;  
    }
}add_shortcode( 'horizon_relacionados', 'horizon_create_relacionados' );

//// BREADCRUMB START ////   
if ( ! function_exists( 'the_breadcrumb' ) ) {
    function the_breadcrumb() {
 
        $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = '&#47;'; // delimiter between crumbs
        $home = '<i class="fa fa-home" style="font-size:18px;"></i>'; // text for the 'Home' link
        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $before = '<span class="current">'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb
       
        global $post;
        $homeLink = get_bloginfo('url');
       
        if (is_home() || is_front_page()) {
       
          if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
       
        } else {
       
          echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
       
          if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo $before . single_cat_title('', false) . $after;
       
          } elseif ( is_search() ) {
            echo $before . 'Resultados da busca por "' . get_search_query() . '"' . $after;
       
          } elseif ( is_day() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
       
          } elseif ( is_month() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
       
          } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
       
          } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
              $post_type = get_post_type_object(get_post_type());
              $slug = $post_type->rewrite;
              echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
              if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            } else {
              $cat = get_the_category(); $cat = $cat[0];
              $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
              if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
              echo $cats;
              if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }
       
          } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
       
          } elseif ( is_attachment() ) {
            // $parent = get_post($post->post_parent);
            // $cat = get_the_category($parent->ID); $cat = $cat[0];
            // echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            // echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) echo ' ' . $before . get_the_title() . $after;
       
          } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;
       
          } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
              $page = get_page($parent_id);
              $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
              $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
              echo $breadcrumbs[$i];
              if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
            }
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
       
          } elseif ( is_tag() ) {
            echo $before . 'Posts com a tag "' . single_tag_title('', false) . '"' . $after;
       
          } elseif ( is_author() ) {
             global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
       
          } elseif ( is_404() ) {
            echo $before . 'Erro 404' . $after;
          }
       
          if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo " / ".__('Página') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
          }
       
          echo '</div>';
       
        }
    } // end the_breadcrumb()
}    
 
if ( ! function_exists( 'set_default_custom_fields' ) ) {
    function set_default_custom_fields($post_id){
        add_post_meta($post_id, 'horizon_sidebar', '', true);
        add_post_meta($post_id, 'horizon_theme_layout', '', true);
        return true;
    }
}add_action('wp_insert_post', 'set_default_custom_fields');


if ( ! function_exists( 'horizon_customize_register' ) ) {
    function horizon_customize_register($wp_customize){
        include_once( SMA_HORIZON_THEME_PATH.'/personalizar/horizon-options.php' );
    }
}add_action('customize_register', 'horizon_customize_register');

// ===================== The Events Calendar =======================

if ( ! function_exists( 'montaQueryEvents' ) ) {
    function montaQueryEvents($size = 10){

        $eventos_tipodeatividade = isset($_GET['tipodeatividade_eventos']) ? $_GET['tipodeatividade_eventos'] : "";
        $eventos_municipio  = isset($_GET['municipios_eventos']) ? $_GET['municipios_eventos'] : "";
        $eventos_bompara = isset($_GET['bompara_eventos']) ? $_GET['bompara_eventos'] : "";
        $eventos_data = isset($_GET['data_eventos']) ? str_replace('%2F','-',$_GET['data_eventos']) : date('Y-m-d H:i:s', time());
        $data_escolhida = isset($_GET['data_escolhida']) ? $_GET['data_escolhida'] : false; 
        
        if($eventos_tipodeatividade != ''){
            $eventos_tipodeatividade = array(
                'taxonomy' => 'tipodeatividade',
                'field'    => 'slug',
                'terms'    => $eventos_tipodeatividade,
            );
        }

        if($eventos_municipio != ''){
            $eventos_municipio = array(
                'taxonomy' => 'municipios',
                'field'    => 'slug',
                'terms'    => sanitize_title( $eventos_municipio ),
            );
        }

        if($eventos_bompara != ''){
            $eventos_bompara = array(
                'taxonomy' => 'bompara',
                'field'    => 'slug',
                'terms'    => $eventos_bompara,
            );
        }

        $inicio = array(
            'key' => '_EventStartDate',
        );

        if($eventos_data != ''){
            $eventos_data = str_replace("/", "-", $eventos_data);
            $eventos_data = date("Y-m-d H:i:s", strtotime($eventos_data));

            if(isset($_GET['data_eventos'])){
                $day = date("w", strtotime($eventos_data));
                $data_escolhida = array(
                    'key' => 'horizon_dayofweek_'.$day,
                    'value' => '0',
                    'compare' => '=',
                );
            }
            
            if($eventos_data != date('Y-m-d H:i:s', time())){
                $inicio = array(
                    'key' => '_EventStartDate',
                    'value' => date("Y-m-d H:i:s", strtotime("+1 day", strtotime($eventos_data))),
                    'compare' => '<=',
                    'type' => 'DATETIME',
                );
            }
        }

        $fim = array(
            'key' => '_EventEndDate',
            'value' => $eventos_data,
            'compare' => '>=',
            'type' => 'DATETIME',
        );
            
        if(is_front_page()){
            $args = array(
                'post_type'      => 'tribe_events',
                'posts_per_page' => $size,
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                'orderby'   => 'meta_value',
                'order'     => 'ASC',
                'meta_key'  => '_EventEndDate',
                'meta_type' => 'DATE',
                
                'meta_query' => array(
                    'relation' => 'AND',
                    '_EventEndDate_clause' => $fim,
                    '_EventStartDate_clause' => $inicio,
                ),
    
                'tax_query' => array(
                    'relation' => 'AND',
                    $eventos_tipodeatividade,
                    $eventos_municipio,
                    $eventos_bompara,
                    //$eventos_data
                ),                   
            );
        }else{
            $args = array(
                'post_type'      => 'tribe_events',
                'posts_per_page' => $size,
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                'orderby'   => 'ID',
                'order'     => 'DESC',
                
                'meta_query' => array(
                    'relation' => 'AND',
                    '_EventEndDate_clause' => $fim,
                    '_EventStartDate_clause' => $inicio,
                    '_data_escolhida_clause' => $data_escolhida,
                ),
    
                'tax_query' => array(
                    'relation' => 'AND',
                    $eventos_tipodeatividade,
                    $eventos_municipio,
                    $eventos_bompara,
                    //$eventos_data
                ),                   
            );
        }
        
        $wp_query = new WP_Query($args);

        return $wp_query;
    }    
}

if ( ! function_exists( 'horizon_widget_events' ) ) {
    function horizon_widget_events(){
        //Registra SideBars
        function horizon_register_events() {
    
            register_sidebar( array(
                'name'          => 'Sidebar Eventos' ,
                'id'            => 'tribe_events_sidebar',
                'description'   => __( 'Aqui vem o conteudo que será mostrado na listagem de Eventos', 'textdomain' ),
                'before_widget' => '<li id="%1$s" class="widget %2$s metade-espaco-top">',
                'after_widget'  => "<div class='borda-bottom-clara'></div></li>\n",
                'before_title'  => '<h3 class="widgettitle metade-espaco">',
                'after_title'   => "</h3>\n",
            ) );
            
        }add_action( 'widgets_init', 'horizon_register_events' );
    }
}add_action( 'after_setup_theme', 'horizon_widget_events', 0 );

if ( ! function_exists('alteraSidebarEvents') ){
    function alteraSidebarEvents( $layout ){
        if ( is_singular( 'tribe_events' ) || is_post_type_archive( 'tribe_events' ) ){
            $layout = 'tribe_events_sidebar';
            return $layout;
        }
        return $layout;
    };
}add_filter( 'horizon_sidebar_params','alteraSidebarEvents' );

if (! function_exists('getcustomDateEvent')) {
    function getcustomDateEvent($startDate, $endDate=null)
    {
        if (is_null($startDate)) {
            return false;
        }

        $startDate =  mysql2date('d/m/Y', $startDate);
        if (!is_null($endDate) && !empty($endDate)) {
            $endDate =  mysql2date('d/m/Y', $endDate);
        }

        //datas diferentes
        if ($startDate != $endDate) {
            return $startDate .' a '. $endDate;
        }
        //datas iguais, retornar somente a data inicial
        return $startDate;
    }
}

// Redes sociais 
function imprimirTagsCompartilhamento(){

    $current_link = esc_url("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    $image['guid'] = isset($image) ? $image->guid : "http://arquivo.ambiente.sp.gov.br/home/2018/11/header-01-site.jpg";
    $tags_list="";
    if(is_single()){
        $tags_list = get_the_tag_list( '<h4 style="display:inline;">Tags: </h4>', ', ', '' );
    }

    echo "<div class='row'><div class='col-12 div-btn-right redes-sociais espaco d-flex justify-content-between'>";
    echo "<div class='mt-auto mb-auto'>".$tags_list."</div>";
    echo "<div class='mt-auto mb-auto'>";
    echo "<a href='https://www.linkedin.com/cws/share?url=".$current_link."' target='_blank'><i class='fa fa-linkedin'></i></a>";
    echo "<a target='_blank' href='http://pinterest.com/pin/create/button/?url=".$current_link."&amp;media=".$image['guid']."&amp;description=".rawurlencode(get_the_title())."'><i class='fa fa-pinterest-p'></i></a>";
    echo "<a href='http://twitter.com/intent/tweet?text=".get_the_title()."&url=".$current_link."&via=ambientesp' title='Twittar sobre".get_the_title()."' target='_blank'><i class='fa fa-twitter'></i></a>";
    echo "<a href='http://facebook.com/share.php?u=".$current_link."&amp;t=".urlencode(the_title('','', false))."' target='_blank' title='Compartilhar ". get_the_title() ." no Facebook'><i class='fa fa-facebook-f'></i></a>";
    echo "</div></div></div>";
    
}

function compartilharRedesListagem(){

    $image['guid'] = isset($image) ? $image->guid : "http://arquivo.ambiente.sp.gov.br/home/2018/11/header-01-site.jpg";

    echo "<a href='https://www.linkedin.com/cws/share?url=".get_the_permalink()."' target='_blank'><i class='fa fa-linkedin'></i></a>";
    echo "<a target='_blank' href='http://pinterest.com/pin/create/button/?url=".get_the_permalink()."&amp;media=".$image['guid']."&amp;description=".rawurlencode(get_the_title())."'><i class='fa fa-pinterest-p'></i></a>";
    echo "<a href='http://twitter.com/intent/tweet?text=".get_the_title()."&url=".get_the_permalink()."&via=ambientesp' title='Twittar sobre".get_the_title()."' target='_blank'><i class='fa fa-twitter'></i></a>";
    echo "<a href='http://facebook.com/share.php?u=".get_the_permalink()."&amp;t=".urlencode(the_title('','', false))."' target='_blank' title='Compartilhar ". get_the_title() ." no Facebook'><i class='fa fa-facebook-f'></i></a>";
}

// ============== Relacionados ==================

if ( ! function_exists( 'imprimirRelacionadosPorTag' )) {
    function imprimirRelacionadosPorTag($args){

        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 5,
            'ordeeby'         => 'id',
            'order'           => 'DESC',
            'tax_query' => array(
                'relation' => 'AND',
                'taxonomy' => 'post_tag',
                'field'    => 'slug',
                'terms'    => sanitize_title( $eventos_municipio ),
            ),
        );
        $wp_query = tribe_get_events($args,true);

    }
}

//Busca personalizada
if ( ! function_exists( 'add_search_mime_types' )) {

    //tipos de arquivos da busca
    function add_search_mime_types($where){
        $where .= ' AND post_mime_type IN("application/pdf","") ';
        return $where;
    }
}

add_action('pre_get_posts', 'sma_busca_personalizada');

if ( ! function_exists( 'sma_busca_personalizada' )) {
    
        function sma_busca_personalizada($query) {

        if (is_search() && !is_admin()) {
        add_filter('posts_where', 'add_search_mime_types');

    //lista de post para desconsiderar na busca
        $exclude_from_search = array(
            'revision',
            'nav_menu_item', 
            'custom_css',
            '_pods_pod',
            'greenture_block',
            'greenture_block',
            'greenture_clients',
            'greenture_portfolio',
            'greenture_service',
            'gt_teammember',
            'gt_testimonial',
            'nav_menu_item',
            'tribe_organizer',
            'tribe_venue',
            'wpcf7_contact_form'
            );
            
        // post types
        $post_types = get_post_types(array('public' => true, 'exclude_from_search' => false), 'objects');
        $searchable_types = array();
        
        if ($post_types) {

            foreach ($post_types as $type) {
                if (!in_array($type->name, $exclude_from_search)) {
                    $searchable_types[] = $type->name;
                }
            }
        }
        $query->set('post_type', $searchable_types);
        $query->set('post_status', array('publish','inherit'));  

    }
    
    return $query;
    }
}

function menu_fix_on_search_page( $query ) {
    if(is_search()){
        $query->set( 'post_type', array(
         'attachment', 'post', 'nav_menu_item', 'film', 'music', 'page'
           ));
          return $query;
    }
}
if( !is_admin() ) add_filter( 'pre_get_posts', 'menu_fix_on_search_page' );

function footer_class($cor,$borda,$cor_borda){
    $aux = '';
    $aux .= "background:$cor;";
    if($borda){
        $aux .="border-top:solid 5px $cor_borda;";
    }
    echo $aux;
}

function includeLogo(){
    if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
      echo "<div class='logo-img text-center text-md-right col-12 col-md-2 mb-auto mt-auto'>";
      echo get_custom_logo();
      echo "</div>";
  }
  
}

function insert_fb_in_head() {
   

    if (!is_archive() && !is_admin()) {
        global $post;
        global $wp;
        $post_type = get_post_type_object(get_post_type());
        
        $titulo = get_the_title();
        $url = get_permalink();
        $current_url = home_url($wp->request);
        $site_name = get_bloginfo();
        $default_image = SMA_HORIZON_THEME_URL."/img/governo-share.jpg"; //imagem do logo default
        $resumo_automatico = "";
        $nome_subsite="";
        if (isset($post->post_content) && $post->post_content) {
            $resumo_automatico = wp_trim_words($post->post_content,90);
        }
        //Título dos custom posts (subsites)
        if ($post_type && $post_type->name != "page" && $post_type->name != "post") {
          $nome_subsite=   $post_type->label.' | ';
        }

        echo '<meta property="og:title" content="' .$titulo . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="fb:app_id" content="1910860599205777" />';
        echo '<meta property="og:url" content="' . (!empty($url) ? $url : $current_url) . '"/>';
        echo '<meta property="og:site_name" content="' . $nome_subsite.$site_name . '"/>';
        if (isset($post->ID) && get_post_meta($post->ID, "description", true)) {
            echo '<meta property="og:description" content="' . strip_shortcodes( get_post_meta($post->ID, "description", true) ). '"/>';
        } elseif (!empty(get_the_excerpt())) {
            echo '<meta property="og:description" content="' . strip_shortcodes( get_the_excerpt($post->ID) ) . '"/>';
        } elseif (!empty($resumo_automatico)) {
            echo '<meta property="og:description" content="' . strip_shortcodes( esc_attr($resumo_automatico) ) . '"/>';
        }
        if (isset($post->ID) && has_post_thumbnail($post->ID)) {
            $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
            $default_image = esc_attr($thumbnail_src[0]);
        }
        echo '<meta property="og:image" content="' . $default_image . '"/>';
        echo '<meta property="og:image:width content="730"/>';
        echo '<meta property="og:image:height content="650"/>';
        echo '<meta name="google-site-verification" content="jUJF8X28gvG_-QpsyQEt2y9gIaha6u6sY7nSf_VWwOg" />';
    }
    echo "";
}

function inverter_ordem( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'orderby', 'ID' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'inverter_ordem' );
<div class="imgDestaque">
<?php
    global $horizon_theme_options; 
    if ( has_post_thumbnail() ){

        echo '<figure class="" style="background-size:contain;background-image:url(\''.get_the_post_thumbnail_url($post,'large').'\')">';
        echo '</figure>';
        echo '<div class="">';
        if($horizon_theme_options['mostrar_datas'] && !is_page()){
           echo '<p class="imgDestaqueDate espaco">'.get_the_date('d/m/Y').'</p>'; 
        }
        echo '</div>';
        
    }else{
        echo '<div class="sem-img-destaque">';
        if(isset($horizon_theme_options['mostrar_datas']) && !is_page()){
            echo '<p class="imgDestaqueDate">'.get_the_date('d/m/Y').'</p></div>'; 
        }
        echo '</div> ';
    }
?>

  
</div>
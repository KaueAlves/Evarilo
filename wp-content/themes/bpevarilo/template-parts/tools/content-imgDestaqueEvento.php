<div class="imgDestaque">
<?php
    if ( has_post_thumbnail() ):

        echo '<figure class="" style="background-image:url(\''.get_the_post_thumbnail_url($post,'full').'\')">';
        echo '</figure>';
        //echo '<div class="imgDestaqueInfo"><h2 class="imgDestaque-text">'. get_the_title(). '</h2></div>';
        
    else:
        echo '<figure class="" style="background-image:url(\''.get_bloginfo( 'stylesheet_directory' ) . '/img/header-gap-01.jpg'.'\')">';
        echo '</figure>';
        //echo '<div class="imgDestaqueInfo"><h2 class="imgDestaque-text">'. get_the_title(). '</h2></div>';
    endif;
?>
  
</div>
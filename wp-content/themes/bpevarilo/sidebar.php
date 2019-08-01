<aside id="sidebar" class="col-12 col-md-4 espaco ">
    <div class="sticky col-12">
<?php 
    if(isset($post)){
        $sidebar = get_post_meta($post->ID, 'horizon_sidebar',true) ?? 'primary';

        if($post->post_type == 'tribe_events'){
            $sidebar = 'tribe_events_sidebar';
        }

        if(!empty(get_post_meta($post->ID, 'greenture_primary_sidebar', true)) && empty(get_post_meta($post->ID, 'horizon_sidebar',true)) ){
            $sidebar = get_post_meta($post->ID, 'greenture_primary_sidebar',true);
         }
    
        $sidebar = apply_filters( 'horizon_sidebar_params', $sidebar );
        if($sidebar){
            dynamic_sidebar( $sidebar );
        }else{
            dynamic_sidebar( "primary" );
        }
    }

?>
    </div>
</aside>


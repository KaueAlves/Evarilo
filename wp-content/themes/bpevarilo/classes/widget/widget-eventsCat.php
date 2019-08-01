<?php 
class horizon_eventsCat extends WP_Widget {
  /**
  * To create the example widget all four methods will be 
  * nested inside this single instance of the WP_Widget class.
  **/

  public function __construct() {
    $widget_options = array( 
      'classname' => 'horizon_eventsCat',
      'description' => 'Lista as Categorias dos Eventos',
    );
    parent::__construct( 'horizon_eventsCat', 'Categorias dos Eventos', $widget_options );
  }

public function widget( $args, $instance ) {

    $title = apply_filters( 'horizon_eventsCat', $instance[ 'title' ] );
    $cat = get_query_var( 'taxonomy' );
    $post_type = get_post_type();
    
    if($post_type == 'tribe_events' || $cat == 'tribe_events_cat' && $post_type != 'post'){

        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];
        
        $args_query = array(
            'title_li' => '<li>',
            'taxonomy' => 'tribe_events_cat',
            'orderby'  => 'DESC',
            'hide_empty' => false,
        );
        wp_list_categories( $args_query );
        
        echo $args['after_widget'];
    }
}

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
        <p>
          <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
          <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
        </p><?php 
      }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        return $instance;
    }

}
?>
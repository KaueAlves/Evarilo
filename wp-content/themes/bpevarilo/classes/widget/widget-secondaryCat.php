<?php 
class horizon_secondaryCat extends WP_Widget {
  /**
  * To create the example widget all four methods will be 
  * nested inside this single instance of the WP_Widget class.
  **/

  public function __construct() {
    $widget_options = array( 
      'classname' => 'horizon_secondaryCat',
      'description' => 'Lista as Categorias secundarias na sidebar',
    );
    parent::__construct( 'horizon_secondaryCat', 'Categorias Secundárias', $widget_options );
  }

  public function widget( $args, $instance ) {
    
    $title = apply_filters( 'horizon_secondaryCat', $instance[ 'title' ] );
    $secao = isset($_GET['secao']) ? $_GET['secao'] : get_queried_object()->slug;
    $cat = get_query_var( 'taxonomy' );
    $cat_id = get_term_by('slug',sanitize_text_field($secao),'categoriapa')->term_id;
    $post_type = get_post_type();
    $tax_terms = get_terms('categoriapa', array('hide_empty' => false,'parent' => $cat_id));

    if(is_single()){
      global $post;
      $tax = get_the_terms($post->id,'secoespa');
      $tax = isset($tax) ? $tax[0]->slug : null;
      $cat_id = get_term_by('slug',sanitize_text_field($tax),'categoriapa')->term_id;
      $tax_terms = get_terms('categoriapa', array('hide_empty' => false,'parent' => $cat_id));
    }
    

    if($post_type == 'prateleira-ambiental' || $cat == 'secoespa' || $cat == 'categoriapa' && $post_type != 'post'){

      echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];

      echo "<ul>";
      foreach($tax_terms as $term_single) {  
        if($secao){
          echo "<li><a href='".get_site_url()."/prateleira-ambiental/?categoria=$term_single->slug&secao=".$secao."'>$term_single->name</a></li>"; 
        }else{
          echo "<li><a href='".get_site_url()."/prateleira-ambiental/?categoria=$term_single->slug&secao=".single_cat_title('', false)."'>$term_single->name</a></li>";
        }
      } 
      echo "</ul>";
      echo $args['after_widget'];
    }
    
  }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; 
        ?>
          <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
          </p>
        <?php 
      }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        return $instance;
    }

}
?>
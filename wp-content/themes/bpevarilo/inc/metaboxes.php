<?php
/** 
 * Custom Meta Boxes and Fields for Post, Pages and other custom post types
 *
 * @package horizon
 */ 
 
class HorizonMetaboxes {
	
	public function __construct() {
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save_meta_boxes'));
	}
	
	// Add Meta Boxes for different Post types
	public function add_meta_boxes()
	{
		
		//não exibir o metabox nesses tipos de posts:
		$excecoes=array();
		$this->add_meta_box('page_options', 'Opções de layout', 'page_metabox',null,$excecoes);
		$this->add_meta_box('tribe_events_options', 'Datas de Exceção', 'tribe_events_metabox','tribe_events');
		$this->add_meta_box('videos_options', 'Descrição do Video', 'videos_metabox','pea-videos',null);

	}
	
	// Add Meta Box for each types
	public function add_meta_box($id, $title, $callback, $post_type,$excecoes=array())
	{
		add_meta_box( 'horizon_' . $id, $title, array($this, 'horizon_' . $callback), $post_type, 'normal', 'high' );	
			
		if(count($excecoes)>0){
			remove_meta_box('horizon_'.$id,$excecoes,'normal');	    
		}      
	 
	}
	
	// Save meta box fields
	public function save_meta_boxes($post_id)
	{
		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}
				
		// check permissions
		if( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
			if( !current_user_can('edit_page', $post_id) )
			return $post_id;
		} elseif( !current_user_can('edit_post', $post_id) ) {
			return $post_id;
		}
				
		foreach($_POST as $key => $value) {
			if(strstr($key, 'horizon_')) {
				update_post_meta($post_id, $key, $value );
			}
		}
	}
	public function horizon_post_metabox()
	{
		$postfields = new HorizonMetaboxFields();
		$postfields->render_fields( $postfields->render_post_fields() );
	}

	public function horizon_page_metabox()
	{
		$pagefields = new HorizonMetaboxFields();
		$pagefields->render_fields( $pagefields->render_page_fields() );
	}	

	public function horizon_tribe_events_metabox()
	{
		$pagefields = new HorizonMetaboxFields();
		$pagefields->render_fields( $pagefields->render_tribe_events_fields() );
	}

	public function horizon_videos_metabox()
	{
		$pagefields = new HorizonMetaboxFields();
		$pagefields->render_fields( $pagefields->render_videos_fields() );
	}
	
}
$metaboxes = new HorizonMetaboxes;
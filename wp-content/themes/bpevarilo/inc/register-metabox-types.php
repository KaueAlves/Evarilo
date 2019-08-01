<?php
/**
 * Register field types for metaboxes
 * 
 * @package horizon
 */
 
class HorizonMetaboxFields { 
	
	public function render_fields( $fields ) 
	{
	
		global $post;
		
		foreach ( $fields as $field ) {
			switch ( $field['type'] ) {				
			
				case 'title':
					echo '<hr><h1 class="tpath-field-title">';
					echo esc_attr( $field['name'] );
					echo '</h1>';
					if( isset( $field['desc'] ) && $field['desc'] != '' ) {
						echo '<p class="description">' . $field['desc'] . '</p>';
					}
					echo '<hr>';
					 
				break;
				
				case 'sub_title':
					echo '<h3 class="tpath-field-sub-title">';
					echo esc_attr( $field['name'] );
					echo '</h3>';										 
				break;
				
				case 'button':
					echo '<a href="#" class="'.$field['id'].' button-primary">';
					echo esc_attr( $field['name'] );
					echo '</a>';
				break;
			
				case 'text':
					$value = get_post_meta($post->ID, $field['id'], true);
					
					echo '<div class="tpath_metabox_field">';
					
						echo '<label for="' . $field['id'] . '">';
						echo esc_attr( $field['name'] );
						echo '</label>';
						
						echo '<div class="field-text fields">';
						echo '<input type="text" id="' . $field['id'] . '" name="' . $field['id'] . '" value="' . esc_attr( $value ) . '" />';
						if( isset( $field['desc'] ) && $field['desc'] != '' ) {
							echo '<p class="description">' . $field['desc'] . '</p>';
						}
						echo '</div>';
						
					echo '</div>';					
				
				break;
				
				case 'textarea':
					$value = get_post_meta($post->ID, $field['id'], true);
					
					echo '<div class="tpath_metabox_field">';
					
						echo '<label for="' . $field['id'] . '">';
						echo esc_attr( $field['name'] );
						echo '</label>';
						
						echo '<div class="field-textarea fields">';
						echo '<textarea cols="70" rows="6" id="' . $field['id'] . '" name="' . $field['id'] . '">' . esc_attr( $value ) . '</textarea>';
						if( isset( $field['desc'] ) && $field['desc'] != '' ) {
							echo '<p class="description">' . $field['desc'] . '</p>';
						}
						echo '</div>';
					echo '</div>';
					
				break;
				
				case 'images':
				
					$i = 0;
					$selected_value = '';					
					$format = '';
					
					$selected_value = get_post_meta($post->ID, $field['id'], true);
	
					foreach( $field['options'] as $key => $option ) {
						
						 $i++;
	
						 $checked = '';
						 $selected = '';
						 
						 if( $selected_value != '' ) {
							if( '' != checked($selected_value, $key, false)) {
								$checked = checked($selected_value, $key, false);
								$selected = 'tpath-radio-img-selected'; 
							}
						}
						
						$format .= '<span>'; 
						$format .= '<input type="radio" id="tpath-radio-img-' . $field['id'] . $i . '" class="checkbox tpath-radio-img-radio" value="' . esc_attr( $key ) . '" name="' . $field['id'] . '" ' . $checked . ' />';
						$format .= '<div class="tpath-radio-img-label">'. esc_attr( $key ) .'</div>';
						$format .= '<img src="' . esc_url( $option ) . '" alt="" class="tpath-radio-img-img '. $selected .'" onClick="document.getElementById(\'tpath-radio-img-'. $field['id'] . $i.'\').checked = true;" />';
						$format .= '</span>';
					
					}
					
					echo '<div class="tpath_metabox_field">';
						
						echo '<label class="radio" for="' . $field['id'] . '">';
						echo esc_attr( $field['name'] );
						echo '</label>';
						
						echo '<div class="field-images fields">'. $format .'';						
							if( isset( $field['desc'] ) && $field['desc'] != '' ) {
								echo '<p class="description">' . $field['desc'] . '</p>';
							}
						echo '</div>';
							
					echo '</div>';					
					
				break;
					
				case 'select':
				
					$selected_value = '';	

					//mantem a compatibilidade com o sidebar do tema anterior - Greenture
					if(!empty(get_post_meta($post->ID, 'greenture_primary_sidebar', true)) && empty(get_post_meta($post->ID, $field['id'], true)) ){
						$selected_value = get_post_meta($post->ID, 'greenture_primary_sidebar', true);
					}else{
						$selected_value = get_post_meta($post->ID, $field['id'], true);
					}
					
					echo '<div class="select_wrapper tpath_metabox_field">';
					
						echo '<label class="select" for="' . $field['id'] . '">';
						echo esc_attr( $field['name'] );
						echo '</label>';
						
						echo '<div class="field-select fields">';							
						echo '<select class="select-box" name="'.$field['id'].'" id="'. $field['id'] .'">';
						
						if( isset( $field['options'] ) ) {
							foreach( $field['options'] as $select_id => $option ) { 

									$value = $select_id;

								echo '<option id="' . $select_id . '" value="'.$value.'" ' . selected($selected_value, $value, false) . ' />'.$option.'</option>';
							}
						
						}
						echo '</select>';
						
						if( isset( $field['desc'] ) && $field['desc'] != '' ) {
							echo '<p class="description">' . $field['desc'] . '</p>';
						}
					
					echo '</div></div>';					
					
				break;
				
				case 'multiselect':
				
					$selected_value = '';				
					
					echo '<div class="multiselect_wrapper tpath_metabox_field">';
					
						echo '<label class="multi-select" for="' . $field['id'] . '">';
						echo esc_attr( $field['name'] );
						echo '</label>';
						
						echo '<div class="field-multiselect fields">';							
						echo '<select multiple="multiple" class="multiselect-box" name="'.$field['id'].'[]" id="'. $field['id'] .'[]">';
						
						if( isset( $field['options'] ) ) { 
							foreach( $field['options'] as $select_id => $option ) { 
															
								if( is_array(get_post_meta($post->ID, $field['id'], true)) && in_array($select_id, get_post_meta($post->ID, $field['id'], true)) ) {
									$selected_value = $select_id;
								}
									
								echo '<option id="' . $select_id . '" value="'.$select_id.'" ' . selected($selected_value, $select_id, false) . ' />'.$option.'</option>';
							}
						
						}
						echo '</select>';
						
						if( isset( $field['desc'] ) && $field['desc'] != '' ) {
							echo '<p class="description">' . $field['desc'] . '</p>';
						}
					
					echo '</div></div>';
					
				break;
				
				case 'chosen':
				
					$selected_value = '';
					
					echo '<div class="chosen_select_wrapper tpath_metabox_field">';
					
						echo '<label class="chosen-select" for="' . $field['id'] . '">';
						echo esc_attr( $field['name'] );
						echo '</label>';
						
						echo '<div class="field-chosen fields">';							
						echo '<select class="chosen-select" multiple="multiple" style="width:350px;" name="'.$field['id'].'[]" id="'. $field['id'] .'[]">';
						
						echo '<option></option>';
						
						if( isset( $field['options'] ) ) {
							foreach( $field['options'] as $select_id => $option ) { 
							
								if( is_array(get_post_meta($post->ID, $field['id'], true)) && in_array($select_id, get_post_meta($post->ID, $field['id'], true)) ) {
									$selected_value = $select_id;
								}							
									
								echo '<option id="' . $select_id . '" value="'.$select_id.'" ' . selected($selected_value, $select_id, false) . ' >'.$option.'</option>';
							}
						
						}
						echo '</select>';
						
						echo '<input type="hidden" name="'.$field['id'].'[]" id="'.$field['id'].'[]" value="-1" />';
						
						echo '<input type="hidden" class="chosen-order" name="' . $field['hidden_id'] . '" id="' . $field['hidden_id'] . '" value="'.get_post_meta($post->ID, $field['hidden_id'], true).'" />';
						
						if( isset( $field['desc'] ) && $field['desc'] != '' ) {
							echo '<p class="description">' . $field['desc'] . '</p>';
						}
					
					echo '</div></div>';
										
				break;
				
				case 'media':
					$value = get_post_meta($post->ID, $field['id'], true);
					
					echo '<div class="tpath_metabox_field">';
					
						echo '<label for="' . $field['id'] . '">';
						echo esc_attr( $field['name'] );
						echo '</label>';
						
						echo '<div class="field-upload fields">';						
						echo '<input type="text" class="tpath-meta-upload media_field" id="' . $field['id'] . '" name="' . $field['id'] . '" value="' . esc_url( $value ) . '" />';
						echo '<button type="button" class="tpath_meta_upload_button btn">'. esc_html__( 'Upload') .'</button>';
						echo '<button type="button" class="tpath_meta_remove_button btn">'. esc_html__( 'Remove') .'</button>';
						if( isset( $field['desc'] ) && $field['desc'] != '' ) {
							echo '<p class="description">' . $field['desc'] . '</p>';
						}
						echo '</div>';
						
					echo '</div>';
					 
				break;
				
				case 'color':
					$value = get_post_meta($post->ID, $field['id'], true);
					
					echo '<div class="tpath_metabox_field">';
					
						echo '<label for="' . $field['id'] . '">';
						echo esc_attr( $field['name'] );
						echo '</label>';
						
						echo '<div class="field-color fields">';
						echo '<input type="text" class="tpath-meta-color" id="' . $field['id'] . '" name="' . $field['id'] . '" value="' . esc_attr( $value ) . '" />';
						
						if( isset( $field['desc'] ) && $field['desc'] != '' ) {
							echo '<p class="description">' . $field['desc'] . '</p>';
						}
						echo '</div>';
						
					echo '</div>';
		 	
				break;
								
				case 'checkbox':
					
					$value = get_post_meta($post->ID, $field['id'], true);
					if( !$value ) {
						$value = 0;
					}
									
					echo '<div class="tpath_metabox_field">';
					
						echo '<label for="' . $field['id'] . '">';
						echo esc_attr( $field['name'] );
						echo '</label>';
						
						echo '<div class="field-checkbox fields">';				
						
						echo '<input type="hidden" class="checkbox" name="' . $field['id'] . '" id="' . $field['id'] . '" value="0" />';
						echo '<input type="checkbox" class="checkbox" name="' . $field['id'] . '" id="' . $field['id'] . '" value="1" '. checked($value, 1, false) .' />';
						
						if( isset( $field['desc'] ) && $field['desc'] != '' ) {
							echo '<p class="description">' . $field['desc'] . '</p>';
						}
						echo '</div>';
						
					echo '</div>';
										
				break;
				
				case 'editor':
					$value = get_post_meta($post->ID, $field['id'], true);
					if( ! $value ) {
						$value = '';
					}
					
					echo '<div class="tpath_metabox_field">';
						echo '<label for="' . $field['id'] . '">';
						echo esc_attr( $field['name'] );
						echo '</label>';					
						echo '<div class="field-editor fields">';
						wp_editor( $value, $field['id'], array( 'textarea_rows' => 8 ) );
						
						if( isset( $field['desc'] ) && $field['desc'] != '' ) {
							echo '<p class="description">' . $field['desc'] . '</p>';
						}
						
						echo '</div>';
					echo '</div>';						
				break;
				
				case 'iconpicker':
					
					$value = get_post_meta($post->ID, $field['id'], true);
					
					echo '<div class="tpath_metabox_field">';
						
						echo '<label for="' . $field['id'] . '">';
						echo esc_attr( $field['name'] );
						echo '</label>';
						
						echo '<div class="field-iconpicker fields">';	
							echo '<div class="tpath-iconpicker">';
							foreach( $field['options'] as $select_id => $option ) {
								$class = '';
								if( $value == $select_id ) {
									$class = "selected";
								}
								echo '<i class="fa ' . $select_id . ' icon-tooltip ' . $class . '" data-toggle="tooltip" data-placement="top" title="' . $select_id . '"></i>';
							}
							echo '</div>';	
							echo '<input type="hidden" class="tpath-form-text tpath-input" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $value . '" />' . "\n";
						if( isset( $field['desc'] ) && $field['desc'] != '' ) {
							echo '<p class="description">' . $field['desc'] . '</p>';
						}
						echo '</div>';
					echo '</div>';
				break;
				
				case 'lineiconpicker':
					
					$value = get_post_meta($post->ID, $field['id'], true);
										
					echo '<div class="tpath_metabox_field">';
						
						echo '<label for="' . $field['id'] . '">';
						echo esc_attr( $field['name'] );
						echo '</label>';
						
						echo '<div class="field-iconpicker fields">';	
							echo '<div class="tpath-iconpicker line-icons">';
							foreach( $field['options'] as $select_id => $option ) {
								$class = '';
								if( $value == $select_id ) {
									$class = "selected";
								}
								echo '<i class="simple-icon ' . $select_id . ' icon-tooltip ' . $class . '" data-toggle="tooltip" data-placement="top" title="' . $select_id . '"></i>';
							}
							echo '</div>';	
							echo '<input type="hidden" class="tpath-form-text tpath-input" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $value . '" />' . "\n";
						if( isset( $field['desc'] ) && $field['desc'] != '' ) {
							echo '<p class="description">' . $field['desc'] . '</p>';
						}
						echo '</div>';
					echo '</div>';
					
				break;
								
				case 'slider':
				
					$value = $min = $max = $step = $edit = $slider_data = '';
					
					$value = get_post_meta($post->ID, $field['id'], true);
					
					if(!isset($field['min'])) { $min  = '0'; } else { $min = $field['min']; }
					if(!isset($field['max'])) { $max  = $min + 1; } else { $max = $field['max']; }
					if(!isset($field['step'])) { $step  = '1'; } else { $step = $field['step']; }
										
					$edit = ' readonly="readonly"'; 
					
					if($value == '') {
						$value = $min;
					}
					
					//values
					$slider_data = 'data-id="'.$field['id'].'" data-val="'.$value.'" data-min="'.$min.'" data-max="'.$max.'" data-step="'.$step.'"';						
					
					echo '<div class="tpath_metabox_field">';
					
						echo '<label for="' . $field['id'] . '">';
						echo esc_attr( $field['name'] );
						echo '</label>';
						
						echo '<div class="field-sliderui fields">';				
						
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'. $value .'" class="tpath-slider-text" '. $edit .' />';
						echo '<div id="'.$field['id'].'-slider" class="tpath-rangeslider" '. $slider_data .'></div>';
						
						if( isset( $field['desc'] ) && $field['desc'] != '' ) {
							echo '<p class="description">' . $field['desc'] . '</p>';
						}
						echo '</div>';
						
					echo '</div>';
										
				break;

				case 'dayofweek':
					
					$value0 = get_post_meta($post->ID, $field['id']."_0", true);
					$value1 = get_post_meta($post->ID, $field['id']."_1", true);
					$value2 = get_post_meta($post->ID, $field['id']."_2", true);
					$value3 = get_post_meta($post->ID, $field['id']."_3", true);
					$value4 = get_post_meta($post->ID, $field['id']."_4", true);
					$value5 = get_post_meta($post->ID, $field['id']."_5", true);
					$value6 = get_post_meta($post->ID, $field['id']."_6", true);
									
					echo '<div class="tpath_metabox_field">';
						
						echo '<div class="field-checkbox fields">';				
						echo '<input type="hidden" class="hidden" name="' . $field['id'] . '_0" id="' . $field['id'] . '_0" value="0" '. checked($value0, 1, false) .' />';
						echo '<input type="checkbox" class="checkbox" name="' . $field['id'] . '_0" id="' . $field['id'] . '_0" value="1" '. checked($value0, 1, false) .' /><p style="display:inline; padding:0 10px 0 0px;" >- Domingo</p>';

						echo '<input type="hidden" class="hidden" name="' . $field['id'] . '_1" id="' . $field['id'] . '_1" value="0" '. checked($value1, 1, false) .' />';
						echo '<input type="checkbox" class="checkbox" name="' . $field['id'] . '_1" id="' . $field['id'] . '_1" value="1" '. checked($value1, 1, false) .' /><p style="display:inline;padding:0 10px 0 0px;" >- Segunda</p>';

						echo '<input type="hidden" class="hidden" name="' . $field['id'] . '_2" id="' . $field['id'] . '_2" value="0" '. checked($value2, 1, false) .' />';
						echo '<input type="checkbox" class="checkbox" name="' . $field['id'] . '_2" id="' . $field['id'] . '_2" value="1" '. checked($value2, 1, false) .' /><p style="display:inline;padding:0 10px 0 0px;" >- Terça</p>';

						echo '<input type="hidden" class="hidden" name="' . $field['id'] . '_3" id="' . $field['id'] . '_3" value="0" '. checked($value3, 1, false) .' />';
						echo '<input type="checkbox" class="checkbox" name="' . $field['id'] . '_3" id="' . $field['id'] . '_3" value="1" '. checked($value3, 1, false) .' /><p style="display:inline;padding:0 10px 0 0px;" >- Quarta</p>';

						echo '<input type="hidden" class="hidden" name="' . $field['id'] . '_4" id="' . $field['id'] . '_4" value="0" '. checked($value4, 1, false) .' />';
						echo '<input type="checkbox" class="checkbox" name="' . $field['id'] . '_4" id="' . $field['id'] . '_4" value="1" '. checked($value4, 1, false) .' /><p style="display:inline;padding:0 10px 0 0px;" >- Quinta</p>';

						echo '<input type="hidden" class="hidden" name="' . $field['id'] . '_5" id="' . $field['id'] . '_5" value="0" '. checked($value5, 1, false) .' />';
						echo '<input type="checkbox" class="checkbox" name="' . $field['id'] . '_5" id="' . $field['id'] . '_5" value="1" '. checked($value5, 1, false) .' /><p style="display:inline;padding:0 10px 0 0px;" >- Sexta</p>';

						echo '<input type="hidden" class="hidden" name="' . $field['id'] . '_6" id="' . $field['id'] . '_6" value="0" '. checked($value6, 1, false) .' />';
						echo '<input type="checkbox" class="checkbox" name="' . $field['id'] . '_6" id="' . $field['id'] . '_6" value="1" '. checked($value6, 1, false) .' /><p style="display:inline;padding:0 10px 0 0px;" >- Sabado</p>';
						echo '</div>';
						
					echo '</div>';
										
				break;
					
			} // End Switch Statement
			
		} // End foreach
	
	}
	
	public function horizon_get_sidebar() 
	{
		global $wp_registered_sidebars;

		$sidebar_options['primary'] = "Modelo padrão (sidebar)";
		$sidebars = $wp_registered_sidebars;
	 
		if(is_array($sidebars) && !empty($sidebars)){
			foreach($sidebars as $sidebar){
				$sidebar_options[$sidebar['id']] = $sidebar['name'];
			}
		}
       
		return $sidebar_options;
	}
	
	
	public function horizon_get_taxonomy_term_list($taxonomy, $post_type, $msg) 
	{
		$list_groups = get_categories('taxonomy='.$taxonomy.'&post_type='.$post_type.'');
		$groups_list[0] = $msg;
		if( !empty($list_groups) ) {
			foreach ($list_groups as $groups) {
				$group_name = $groups->name;
				$termid = $groups->term_id;		
				$groups_list[$termid] = $group_name;
			}
		}
	
		if( isset($groups_list) ) {
			return $groups_list;
		}
		
	}
	
	public function horizon_get_posts_list($post_type, $show_first = false) 
	{
		$list_posts = get_posts(array('post_type' => $post_type, 'numberposts' => -1));
		$posts_list = array();
		if( $show_first == true ) {
			$posts_list[0] = "Select";		
		}
		if( !empty($list_posts) ) {
			foreach ($list_posts as $item) {					
				$posts_list[$item->ID] = $item->post_title;
			}
		}
	
		if( isset($posts_list) ) {
			return $posts_list;
		}
		
	}
	
	// Add Post Options fields
	public function render_post_fields() 
	{
		$prefix = 'horizon_';
		
		$fields = array(
		
			array(
				'name'		=> esc_html__( 'Opções gerais' ),
				'type'		=> 'title'
			),
			
			array(
				'name'		=> esc_html__( 'Opções de Layout' ),
				'type'		=> 'sub_title'
			),
			
			array(
				'name'		=> esc_html__( 'Layout' ),				
				'id'		=> $prefix . 'theme_layout',
				'desc'		=> '',
				'options' 	=> array(
								'default' 	=> 'Modelo padrão (sidebar)',			
								'fullwidth' => 'Full Width',
								//'boxed' 	=> 'Boxed'
							),
				'type'		=> 'select'
			),
			
			array(
				'name'		=> esc_html__( 'Opções de Sidebar'),
				'type'		=> 'sub_title'
			),
			
			array(
				'name'		=> esc_html__( 'Selecione o Sidebar' ),				
				'id'		=> $prefix . 'sidebar',
				'desc'		=> '',
				'options' 	=> $this->horizon_get_sidebar(),
				'type'		=> 'select'
			),			
			

						
        );
		
		return $fields;
	
	}
	
	// Add Page Options fields
	public function render_page_fields() 
	{
		$prefix = 'horizon_';
		
		$fields = array(		
		
			array(
				'name'		=> esc_html__( 'Opções gerais' ),
				'type'		=> 'title'
			),
			
			array(
				'name'		=> esc_html__( 'Opções de Layout' ),
				'type'		=> 'sub_title'
			),
			
			array(
				'name'		=> esc_html__( 'Layout' ),				
				'id'		=> $prefix . 'theme_layout',
				'desc'		=> '',
				'options' 	=> array(
								'default' 	=> 'Modelo padrão (sidebar)',			
								'fullwidth' => 'Full Width',
								//'boxed' 	=> 'Boxed'
							),
				'type'		=> 'select'
			),
							
			array(
				'name'		=> esc_html__( 'Opções de Sidebar' ),
				'type'		=> 'sub_title'
			),
			
			array(
				'name'		=> esc_html__( 'Selecione o Sidebar' ),				
				'id'		=> $prefix . 'sidebar',
				'desc'		=> '',
				'options' 	=> $this->horizon_get_sidebar(),
				'type'		=> 'select'
			),
					
			
        );
		
		return $fields;
	
	}

	// Add Page Options fields
	public function render_tribe_events_fields() 
	{
		$prefix = 'horizon_';
		
		$fields = array(		
		
			array(
				'name'		=> esc_html__( 'Tribe Events Extensão' ),
				'type'		=> 'title'
			),
			
			array(
				'name'		=> esc_html__( 'Quais dias da semana não deve aparecer ?' ),
				'type'		=> 'sub_title'
			),
			
			array(
				'name'		=> esc_html__( 'Dias da Semana' ),				
				'id'		=> $prefix . 'dayofweek',
				'desc'		=> '',
				'type'		=> 'dayofweek'
			),		
			
        );
		
		return $fields;
	
	}

	// Add Page Options fields
	public function render_videos_fields() 
	{
		$prefix = 'horizon_';
		
		$fields = array(		
		
			array(
				'name'		=> esc_html__( 'Descrição Video' ),
				'type'		=> 'title'
			),
			
			array(
				'name'		=> esc_html__( 'Descrição que aparecera na página principal' ),
				'type'		=> 'sub_title'
			),
			
			array(
				'name'		=> esc_html__( 'Descrição' ),				
				'id'		=> $prefix . 'video-description',
				'desc'		=> '',
				'type'		=> 'editor'
			),		
			
        );
		
		return $fields;
	
	}
	
	

}
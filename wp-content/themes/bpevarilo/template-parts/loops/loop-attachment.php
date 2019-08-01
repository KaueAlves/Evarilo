
<?php
//  echo wp_get_attachment_image( get_the_ID(), 'large' ); 
?>

<div class="entry">	
	<div class="entry-inner">
		<?php the_content(); ?>
	
		<?php if($post->post_mime_type != 'application/pdf') {?>
			<p class='resolutions'> Downloads: 
			<?php
				$images = array();
				$image_sizes = get_intermediate_image_sizes();
				array_unshift( $image_sizes, 'full' );
				foreach( $image_sizes as $image_size ) {
					$image = wp_get_attachment_image_src( get_the_ID(), $image_size );
					$name = $image_size . ' (' . $image[1] . 'x' . $image[2] . ')';
					$images[] = '<a href="' . $image[0] . '" taget="_blank">' . $name . '</a>';
				}
				echo implode( ' | ', $images );
			?>
			</p>
			<?php 
				}else{
					echo "<p>Clique no link para fazer download do arquivo.</p>";
                }
			?>
	</div>
	<div class="clear"></div>				
</div><!--/.entry-->

<?php $post_participe = montaQueryVideos()->posts; 
if(count($post_participe) > 0){
	$post_participe = $post_participe[0];
}
$resumo_video = get_post_meta($post_participe->ID, 'horizon_video-description',true) ?? '';
?>
<div class="container espaco" >
	<div class="row d-flex flex-row-reverse bloco-text-img ">
		<div class="col-12 col-md-6">
			<img class="w-100" src="<?php echo get_the_post_thumbnail_url($post_participe,'large') ?>" alt="">
		</div>
		<div class="col-12 col-md-6 bloco-text">
			<h2 class="metade-espaco text-md-left text-uppercase text-center">Participe!</h2>
			<div class="participe-text-dinamic">
				<?php echo $resumo_video; ?>
			</div>
			<div class="text-center text-md-right metade-espaco btn-participe">
				<a href="<?php echo get_permalink( $post_participe )?>" class="btn text-right">Veja mais</a>
			</div>
		</div>
	</div>
</div>
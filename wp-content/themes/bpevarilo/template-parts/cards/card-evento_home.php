<div class="col-lg-6 col-md-6 col-12 espaco">
    <div class="card padding-0" >
        <a href="<?php echo get_permalink( $post->id );?>">
            <figure style="position:relative;"> 
                <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url( $post->id, 'large') ;?>" alt="Imagem Ta na Midia 1">
                <span style="position:absolute;" class="card-overlay"><?php echo date("d/m/Y",strtotime($post->EventStartDate));?></span>
            </figure>
            <div class="card-body">
                <p class="card-text" style="min-height:0;">
                    <?php echo get_the_title( $post->id ) ?>
                </p>
            </div>
        </a>
    </div>                  
</div>
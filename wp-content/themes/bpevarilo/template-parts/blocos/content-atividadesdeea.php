<?php
    $events_query = montaQueryEvents(4);
?>

<div class="container espaco" >
    <div class="row d-flex flex-row">
    <h2 class="col-12 metade-espaco">AGENDA DE EDUCAÇÃO AMBIENTAL</h2>
        <div class="col-12 col-md-6">
            <div class="row tanamidia">
                <?php 
                if($events_query->have_posts( )):
                    while ( $events_query->have_posts() ) : $events_query->the_post();
                        include( locate_template( 'template-parts/cards/card-evento_home.php')); 
                    endwhile; wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <?php get_template_part( 'template-parts/tools/search/search', 'tribal_events' ); ?>
            <div class="containaer"> 
                <p class="">Você sabia que o Sistema Ambiental Paulista oferece diversas atividades de Educação Ambiental no Estado de São Paulo? São parques, museus e outros espaços que promovem desde eventos pontuais, até debates, cursos e muito mais!</p>
            </div>
            <div class="div-btn-right">
                <a href="<?php echo get_site_url();?>/eventos/" class="btn-2">Veja mais</a>
            </div>
        </div>
    </div>
</div>
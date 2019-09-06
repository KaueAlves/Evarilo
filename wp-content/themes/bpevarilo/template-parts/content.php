<section class="content-area container metade-espaco-top">
    <main class="row"> 
        <section class="col-12">
            <article class="col-12 <?php if($template_layout === 'default' || $template_layout === ''){echo "col-md-8";}; ?>">
                <div id="content" class="site-content" role="main">
                    <?php    
                    $post_type = get_post_type();
                    if($post_type){
                        get_template_part( 'template-parts/loops/loop', $post_type );
                    }
                    ?>
                </div>
            </article>            
        </section>
    </main>
</section>
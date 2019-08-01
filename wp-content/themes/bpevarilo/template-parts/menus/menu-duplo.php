<section class="main-menu">
    <nav class="navbar navbar-expand-md navbar-dark" role="navigation">
        <div class="container main-menu-container">
            <div class="mobile-menu row w-100">
                <div class="col-12 d-flex justify-content-between">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'sma-horizon_main_menu',
                        'depth'             => 3,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav mr-auto',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ) );
                    ?>
                        
                    <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'sma-horizon_secondary_menu',
                        'depth'             => 3,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar mb-auto ml-auto item-secundario',
                        'container_id'      => 'bs-example-navbar-collapse-2',
                        'menu_class'        => 'nav navbar-nav ml-auto',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ) );
                    ?>
                    <div>
                        <div class="bg-search search-div">
                            <form action="<?php echo get_site_url(); ?>" method="get" class="mr-15 ml-15 item-secundario">
                                <input type="text" name="s" style="margin-top:5px;" class="search-secondary-menu w-100" placeholder="Pesquisar">
                                <input type="submit" class="btn submit-secondary-menu w-100" value="Buscar">
                            </form>
                        </div>
                        <a class="navbar-brand nav-link search-button item-secundario ml-auto" href="#"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</section>
<div class="<?php echo $classeAdicional;?> item-post-pa espaco grid-item">
    <div class="">
        <a href="<?php echo $link; ?>">
            <div class="card" >
                <img src="<?php echo $img; ?>" alt="" srcset="" class="card-img-top p-2">
                <div class="card-body text-center">
                    <h2><?php echo $title; ?></h2>
                    <?php if($subtitle): ?>
                        <h3 class="card-text"><?php echo $subtitle; ?></h3>
                    <?php endif; ?>
                </div>
            </div>
        </a>
    </div>
</div>
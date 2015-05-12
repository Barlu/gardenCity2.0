<div class="padding-large">
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>

    <div id="links" class="flex-row">
        <?php foreach ($gallery->getImages() as $image) : ?>
            <a href="<?php echo $image->getLocation('medium') ?>" title="<?php echo $image->getTitle() ?>" data-gallery>
                <img src="<?php echo $image->getLocation('thumb') ?>" alt="<?php echo $image->getTitle() ?>">
            </a>
        <?php endforeach; ?>
    </div>
</div>



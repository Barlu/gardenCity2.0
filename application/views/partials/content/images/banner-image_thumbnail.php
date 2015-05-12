<li class="gallery-thumbnail">
    <a id="banner-image-<?php echo $banner->getId() ?>" href="#banner-target-<?php echo $banner->getId() ?>" role="tab" data-toggle="pill" onclick="generateContentPanel(<?php echo $banner->getId() ?>, 'banner-image', '.inner')">
        <img src="<?php echo $image->getLocation('thumb')?>" class="img-thumbnail">
    </a>
</li>


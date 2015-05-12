<li class="gallery-thumbnail">
    <a id="image-<?php echo $image->getId() ?>" href="#image-target-<?php echo $image->getId() ?>" role="tab" data-toggle="pill" onclick='generateContentPanel(<?php echo $image->getId() ?>, "image", ".inner")'>
        <img src="<?php echo $image->getLocation('thumb')?>" class="img-thumbnail">
    </a>
</li>


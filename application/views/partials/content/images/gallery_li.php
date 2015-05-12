<li>
     &nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-pencil-square-o primary edit' data-toggle="modal" data-target='#gallery-modal-<?php echo $gallery->getId()?>'></i>
    <a id="gallery-<?php echo $gallery->getId() ?>" href="#gallery-target-<?php echo $gallery->getId() ?>" role="tab" data-toggle="pill" onclick="generateContentPanel(<?php echo$gallery->getId() ?>, 'gallery', '.outer');"><?php echo $gallery->getName() ?></a>
   
</li>


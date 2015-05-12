<div class = "tab-pane fade in active" id = "gallery-target-<?php echo $gallery->getId() ?>">
    
    <ul class='gallery-container' id="images-<?php echo $gallery->getId() ?>">
        <?php
        if ($gallery !== null) {
            foreach ($gallery->getImages() as $image) {
                $data['image'] = $image;
                $this->load->view('partials/content/images/image_thumbnail', $data);
            }
        } else {
            echo '<p>Currently no images in this gallery. Drag and drop to the box below to add!</p>';
        }
        ?>
    </ul>
        <form action = "<?php echo base_url(); ?>index.php/dropzone/upload/<?php echo $gallery->getId() ?>" class = "dropzone" id='dropzone-gallery-<?php echo $gallery->getId() ?>'></form>
</div>


    <?php
    if ($banners !== null) {
        foreach ($banners as $banner) {
            $data['image'] = $banner->getImage();
            $data['banner'] = $banner;
            $this->load->view('partials/content/images/banner-image_thumbnail', $data);
        }
    } else {
        echo '<p>Currently no images in this gallery. Drag and drop to the box below to add!</p>';
    }
    ?>



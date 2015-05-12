<div class='cms-heading-wrap'>
    <h1>Images</h1>
</div>

<section id='images-list' class='list-admin'>
    <ul class="nav nav-stacked">
        <li class='active'><a href='#banner-gallery' data-toggle='pill' id='banners-li'>Banners</a></li>
        <li ><a href='#new' data-toggle='pill' >&nbsp;<i class='fa fa-plus'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add </a></li>
        
        <?php
        foreach ($galleries as $gallery) {
            $data['gallery'] = $gallery;
            $this->load->view('partials/content/images/gallery_li', $data);
        }
        ?>
    </ul>
    <div class='clearfix'></div>
</section>

<section id='images-content' class='content-admin'>
    <div class="tab-content outer">
        <div class="tab-content inner"></div>

        <div class="tab-pane fade" id="new">
            <form  action="<?php echo base_url(); ?>index.php/admin/images" method="post" >
                <div class='form-group col-xs-12'>
                    <label for='name' class='control-label sr-only'></label>
                    <input name='name' type="text" class="form-control input-lg" placeholder='Gallery Name'>
                </div>
                <div class='form-group col-xs-12'>
                    <label for='description' class='control-label sr-only'></label>
                    <textarea name='description' type="text" rows='5' class="form-control input-lg" placeholder='Description'></textarea>
                </div>
                <button type="submit" class="primary-button" name='submitGallery' value='add'><h4>Save</h4></button>
            </form>
        </div>


        <div class="tab-pane fade in active" id="banner-gallery">
            <ul class='gallery-container' id="banner-images">
                <?php
                $this->load->view('partials/content/images/banner-gallery_pane', $banners);
                ?>
            </ul>
            <form  action="<?php echo base_url(); ?>index.php/dropzone/upload/banner/banner"  class="dropzone" id="banner-dropzone"></form>
        </div>
    </div>
    <div class='clearfix'></div>
</section>

<?php
foreach ($galleries as $gallery) {
    $data['gallery'] = $gallery;
    $this->load->view('partials/content/images/gallery_modal', $data);
}



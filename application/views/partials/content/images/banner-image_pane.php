
<div class="tab-pane fade in active" id="banner-target-<?php echo $banner->getId() ?>">
    <form method="post" id='banner-form-<?php echo $banner->getId() ?>' onsubmit=;
    return false;'>
          <div class='form-group col-xs-12'>
            <label for='title' class='control-label sr-only'></label>
            <input name='title' type="text" class="form-control input-lg" value="<?php echo $image->getTitle() ?>" placeholder='Image Title'>
        </div>
        <div class='form-group col-xs-12'>
            <label for='heading' class='control-label sr-only'></label>
            <input name='heading' type="text" class="form-control input-lg" value="<?php echo $banner->getHeading() ?>" placeholder='Caption Heading'>
        </div>
        <div class='form-group col-xs-12'>
            <label for='link' class='control-label sr-only'></label>
            <input name='link' type="text" class="form-control input-lg" value="<?php echo $banner->getLink() ?>" placeholder='Link'>
        </div>
        <div class='form-group col-xs-12'>
            <label for='caption' class='control-label sr-only'></label>
            <textarea name='caption' type="text" rows='2' class="form-control input-lg" placeholder='Caption'><?php echo $banner->getCaption(); ?></textarea>
        </div>
        <input type="hidden" name="type" id="type"/>
        <input type="hidden" name="id" value="<?php echo $banner->getId() ?>"/>
        <button type="button" class="primary-button" onclick='editDelete(this.closest("form"), "deleteBanner", <?php echo $banner->getId() ?>)'><h4>Delete</h4></button>
        <button type="button" class="primary-button" onclick='editDelete(this.closest("form"), "editBanner", <?php echo $banner->getId() ?>)'><h4>Save</h4></button>
    </form>
    <div class='clearfix'></div>
</div>



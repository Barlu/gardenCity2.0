
<div class = "tab-pane fade in active" id = "image-target-<?php echo $image->getId() ?>">
    <form>
        <div class = 'form-group col-xs-12'>
            <label for = 'title' class = 'control-label sr-only'></label>
            <input name = 'title' type = "text" class = "form-control input-lg" value="<?php echo $image->getTitle() ?>" placeholder = 'Image Title'>
        </div>
        <input type="hidden" name="type" id="type"/>
        <input type="hidden" name="id" value="<?php echo $image->getId() ?>"/>
        <button type="button" class="primary-button" onclick='editDelete(this.closest("form"), "deleteImage", <?php echo $image->getId() ?>)'><h4>Delete</h4></button>
        <button type="button" class="primary-button" onclick='editDelete(this.closest("form"), "editImage", <?php echo $image->getId() ?>)'><h4>Save</h4></button>
    </form>
</div>
<div class='clearfix'></div>



<div class="tab-pane active" id="newsletter-target-<?php echo $content->getId(); ?>">
    <form method="post" enctype="multipart/form-data">
        <?php if ($image->getLocation()): ?>
            <div class='form-group col-xs-4'>
                <img src="<?php echo $image->getLocation('thumb') ?>" class="img-thumbnail">
            </div>
        <?php else: ?>
            <div class='form-group col-xs-4' >
                <div class='placeholder-wrap' >
                    <i class='fa fa-camera placeholder' ></i>
                </div>
            </div>
        <?php endif; ?>
        <div class='form-group col-xs-8'>
            <div class="row ">
                <div class='form-group col-xs-12'>
                    <label for='name' class='control-label sr-only'></label>
                    <input name='name' type="text" class="form-control input-lg" value="<?php echo $content->getName(); ?>" placeholder='Name'>
                </div>
                <div class='form-group col-xs-12'>
                    <label for='link' class='control-label sr-only'></label>
                    <input name='link' type="text" class="form-control input-lg" value="<?php echo $content->getLink(); ?>" placeholder='Link'>
                </div>
            </div>
        </div>
        <div class='form-group col-xs-4'>
            <label for='image'>Image:</label>
            <input name='image' type="file">
        </div>
        <div class='form-group col-xs-8'>
            <label for='title' class='control-label sr-only'></label>
            <input name='title' type="text" class="form-control input-lg" value="<?php echo $image->getTitle(); ?>" placeholder='Image Title'>
        </div>
        
        <div class='form-group col-xs-12'>
            <label for='description' class='control-label sr-only'></label>
            <textarea name='description' type="text" rows='5' class="form-control input-lg" placeholder="Description"><?php echo $content->getDescription(); ?></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo $content->getId() ?>"/>
        <div class="col-xs-12">
        <button type="submit" class="primary-button" name='submit' value='edit'>Save</button>
        <button type="submit" class="primary-button" name='submit' value='delete'>Delete</button>
        </div>
    </form>
</div>



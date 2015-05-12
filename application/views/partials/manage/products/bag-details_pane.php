<div class="tab-pane active" id="bag-details-target-<?php echo $product->getId(); ?>">
    <form method="post" enctype="multipart/form-data" id="bag-form-<?php echo $product->getId(); ?>">
        <?php if ($product->getImage()->getLocation()): ?>
            <div class='form-group col-xs-4'>
                <img src="<?php echo $product->getImage()->getLocation('thumb') ?>" class="img-thumbnail">
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
                    <input name='name' type="text" class="form-control input-lg" value="<?php echo $product->getName(); ?>" placeholder='Name'>
                </div>
                <div class='form-group col-xs-12'>
                    <label for='title' class='control-label sr-only'></label>
                    <input name='title' type="text" class="form-control input-lg" value="<?php echo $product->getImage()->getTitle(); ?>" placeholder='Image Title'>
                </div>
            </div>
        </div>
        <div class='form-group col-xs-12 ' >
            <div class="dropzone" id="dropzone-bag-details-<?php echo $product->getId(); ?>">

            </div>
        </div>

        <div class='form-group col-xs-12'>
            <label for='description' class='control-label sr-only'></label>
            <textarea name='description' type="text" rows='5' class="form-control input-lg"><?php echo $product->getDescription(); ?></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo $product->getId() ?>"/>
        <input type="hidden" name="type" id="type" />
        <div class="col-xs-12">
            <button type="button" class="primary-button" onclick='editDelete(this.closest("form"), "deleteBag")'>Delete</button>
            <button type="button" class="primary-button" onclick='editDelete(this.closest("form"), "editBag")'>Save</button>
        </div>
    </form>
</div>



<div class="tab-pane active" id="produce-details-target-<?php echo $product->getId(); ?>">
    <form method="post" enctype="multipart/form-data" id="produce-form-<?php echo $product->getId(); ?>">
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
                    <label for='name' class='control-label sr-only'>Name</label>
                    <input name='name' type="text" class="form-control input-lg" value="<?php echo $product->getName(); ?>" placeholder='Name'>
                </div>
                <div class='form-group col-xs-12'>
                    <label for='variety' class='control-label sr-only'>Variety</label>
                    <input name='variety' type="text" class="form-control input-lg" value="<?php echo $product->getVariety(); ?>" placeholder='Variety'>
                </div>
            </div>
        </div>
        <div class='form-group col-xs-12'>
            <label for='title' class='control-label sr-only'>Image Title</label>
            <input name='title' type="text" class="form-control input-lg" value="<?php echo $product->getImage()->getTitle(); ?>" placeholder='Image Title'>
        </div>
        <div class='form-group col-xs-12'id="dropzone-bag-details<?php $product->getId() ?>">
            <div class="dropzone" id="dropzone-produce-details-<?php echo $product->getId(); ?>">

            </div>
        </div>
        <div class='form-group col-xs-12'>
            <label for='description' class='control-label sr-only'>Description</label>
            <textarea name='description' type="text" rows='5' class="form-control input-lg"><?php echo $product->getDescription(); ?></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo $product->getId() ?>"/>
        <input type="hidden" name="type" id="type" />
        <div class="col-xs-12">
            <button type="button" class="primary-button" onclick='editDelete(this.closest("form"), "deleteProduce")'>Delete</button>
            <button type="button" class="primary-button" onclick='editDelete(this.closest("form"), "editProduce")'>Save</button>
        </div>
    </form>
</div>



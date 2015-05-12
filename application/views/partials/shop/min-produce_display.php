
<article class="white-background box-shadow min-produce image-fade">
    <form>
        <div class="form-group col-xs-12">
            <div class="black-background">
                
                <div class="image-border flex-column">
                    <h1><?php echo $produce->getVariety() ?></h1>
                    <p><?php echo $produce->getName() ?></p>
                </div>
                <img src="<?php echo $produce->getImage()->getLocation('small') ?>">
            </div>
        </div>

        <div class="form-group col-xs-8">
            <label for="quantity-type" class="control-label">Qty Type</label>
            <div class="select-wrap">
                <?php
            echo form_dropdown('quantity-type', $quantities, '', 'class="form-control input-sm"');
            ?>
            </div>
        </div>
        <div class="form-group col-xs-4">
            <label for="quantity" class="control-label">Qty</label>
            <input type="text" name="quantity" class="form-control input-sm"/>
        </div>
        <button type="button" class="primary-button produce-button col-xs-12" onclick="addToCart(this.closest('form'))">Add To Cart</button>

        <input type="hidden" name="id" value="<?php echo $produce->getId() ?>">
        <input type="hidden" name="name" value="<?php echo $produce->getVariety() . ' - ' . $produce->getName() ?>">
        <input type="hidden" name="type" value="Produce">
    </form>
    <div class="clear"></div>
</article>


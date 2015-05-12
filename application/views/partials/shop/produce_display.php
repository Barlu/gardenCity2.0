<div class="product paper-texture col-xs-3">
    <article class="white-background box-shadow">
        <form>
            <input type="hidden" name="id" value="<?php echo $produce->getId() ?>">
            <input type="hidden" name="name" value="<?php echo $produce->getVariety() . ' - ' . $produce->getName() ?>">
            <input type="hidden" name="type" value="Produce">
            <img src="<?php echo $produce->getImage()->getLocation('mobile') ?>" class="col-xs-12">
            <div class="col-xs-6">
            <h1 class="h2"><?php echo $produce->getVariety() ?></h1>
            <p><?php echo $produce->getName() ?></p>
            </div>
            <div class="form-group col-xs-6">
                 <div class="row">
                    <div class="form-group col-xs-12">
                        <label for="quantity-type">Quantity Type</label>
                        <?php
                        echo form_dropdown('quantity-type', $quantities, '', 'class="form-control input-sm"');
                        ?>
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="quantity">Qty</label>
                        <input type="text" name="quantity" class="form-control input-sm"/>
                    </div>

                    <button type="button" class="primary-button" onclick="addToCart(this.closest('form'))">Add To Cart</button>
                </div>
            </div>
        </form>
        <div class="clear"></div>
    </article>
</div>
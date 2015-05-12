



<article class="padding-medium">
    <form>
        <div class="col-xs-12 col-md-5 img-wrap">
            <img src="<?php echo $bag->getImage()->getLocation('small') ?>"  class="box-shadow">
        </div>
        
            <h2 class="h2 col-xs-12 col-md-7"><?php echo $bag->getName() ?><span class="pull-right">$<?php echo $quantities[0]['price'] ?></span></h2>
            <p class="product-description"><?php echo $bag->getDescription() ?></p>
            <a href="<?php echo base_url() ?>our_food/order"  onclick="addToCart($(this).closest('form'))" class="primary-button">
                    Place Order &nbsp; <i class="fa fa-caret-right"></i>
            </a>
        

        <!--            Hidden input to relay product data-->
        <input type="hidden" name="quantity" value="1">
        <input type="hidden" name="quantity-type" value="<?php echo $quantities[0]['quantityId'] ?>">
        <input type="hidden" name="id" value="<?php echo $bag->getId() ?>">
        <input type="hidden" name="price" value="<?php echo $quantities[0]['price'] ?>">
        <input type="hidden" name="name" value="<?php echo $bag->getName() ?>">
        <input type="hidden" name="type" value="Bag">
    </form>
    <div class="clear"></div>
</article>



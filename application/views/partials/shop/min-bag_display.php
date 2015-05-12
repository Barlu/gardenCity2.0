<article class="white-background bag-selection box-shadow clickable <?php if($bag->getId() === (int) $selectedBag){ echo 'selected'; } ?> min-bag" onclick="addToCart($(this).children('form'), this)">
    <form>
        <img src="<?php echo $bag->getImage()->getLocation('small') ?>" class="col-xs-12 col-sm-6 col-md-12">

        
            <h1 class="h1 col-sm-4 col-xs-8 col-md-8"><?php echo $bag->getName() ?></h1>
            <h2 class="h1 col-sm-2 col-xs-4 col-md-4">$<?php echo $quantities[0]['price'] ?></h2>
            <p class="product-description padding"><?php echo $bag->getDescription() ?></p>
        

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



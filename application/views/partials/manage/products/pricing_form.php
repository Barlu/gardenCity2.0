<form>
    <div class = 'form-group col-xs-3'>
        <label for = 'quantity' class = 'control-label sr-only'></label>
        <?php
        echo form_dropdown('quantity', $quantitiesArray, $quantity->getId(), 'class="form-control input-md"');
        ?>
    </div>
    <div class = 'form-group col-xs-3'>
        <label for = 'amount' class = 'control-label sr-only'></label>
        <input name = 'amount' type = "text" class = "form-control input-md" value = "<?php echo $price->getAmount(); ?>" placeholder = 'Price'>
    </div>
    <div class = 'form-group col-xs-3'>
        <label for = 'price-type' class = 'control-label sr-only'>Price Type:</label>
        <?php
        echo form_dropdown('price-type', [
            'public' => 'Public',
            'wholesale' => 'Wholesale',
            'staff' => 'Staff'
                ], $price->getType(), 'class="form-control input-md"');
        ?>
    </div>
    <input type='hidden' name='id' value="<?php echo $price->getId() ?>">
    <input type='hidden' name='type' id="type">
    <div class = 'form-group col-xs-1'>
        <i class="fa fa-floppy-o primary" onclick='editDelete(this.closest("form"), "editPrice")'></i> 
    </div>
    <div class = 'form-group col-xs-1'>
        <i class="fa fa-times primary" onclick='editDelete(this.closest("form"), "deletePrice")'></i> 
    </div>
    
</form>
<div class="clearfix"></div>

<form id="quantity-form-<?php echo $quantity->getId(); ?>">
    <div class = 'form-group col-xs-4'>
        <label for='name' class='control-label sr-only'></label>
        <input name='name' type="text" class="form-control input-md" value="<?php echo $quantity->getName(); ?>" placeholder = 'Name'>
    </div>
    <div class = 'form-group col-xs-4'>
        <label for='value' class='control-label sr-only'></label>
        <input name='value' type="text" class="form-control input-md" value="<?php echo $quantity->getValue(); ?>" placeholder = 'Value'>
    </div>
    <div class = 'col-xs-2 form-group'>
        <label for='watch' class="control-label">
            Watch
            
        </label>
        <input name='watch' type="checkbox" <?php if($quantity->getWatch()){echo 'checked';} ?> >
        
    </div>
    <div class = 'form-group col-xs-1'>
        <i class="fa fa-floppy-o primary link" class = "form-control input-md" onclick='editDelete(this.closest("form"), "editQuantity", <?php echo $product->getId() ?>)'></i>
    </div>
    <div class = 'form-group col-xs-1'>
        <i class="fa fa-times primary link"  class = "form-control input-md" onclick='editDelete(this.closest("form"), "deleteQuantity", <?php echo $product->getId() ?>)'></i>
    </div>
    <div class = 'form-group col-xs-12'>
        <label for = 'description' class = 'control-label sr-only'></label>
        <textarea name = 'description' type = "text" rows="2" class = "form-control" placeholder = 'Description'><?php echo $quantity->getDescription(); ?></textarea>
    </div>
    <input type='hidden' name='id' value="<?php echo $quantity->getId() ?>">
    <input type='hidden' name='type' id="type">
</form>
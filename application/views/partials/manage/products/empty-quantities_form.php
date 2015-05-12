<form>
    <div class = 'form-group col-xs-4'>
        <label for = 'name' class = 'control-label sr-only'>Name</label>
        <input name = 'name' type = "text" class = "form-control input-md" placeholder = 'Name'>
    </div>
    <div class = 'form-group col-xs-4'>
        <label for = 'value' class = 'control-label sr-only'>Value</label>
        <input name = 'value' type = "text" class = "form-control input-md" placeholder = 'Value'>
    </div>
    <div class = 'form-group col-xs-2'>
        <label for='watch' class='control-label'>Watch</label>
        <input name='watch' type="checkbox"  >

    </div>
    <div class = 'form-group col-xs-2'>
        <i class="fa fa-floppy-o primary link" class = "form-control input-md" onclick='add(this.closest("form"))'></i>
    </div>
    <div class = 'form-group col-xs-12'>
        <label for = 'description' class = 'control-label sr-only'>Description</label>
        <textarea name = 'description' type = "text" rows="2" class = "form-control" placeholder = 'Description'></textarea>
    </div>
    <input type='hidden' name='quantities' value='<?php echo $product->getId() ?>'>
</form>

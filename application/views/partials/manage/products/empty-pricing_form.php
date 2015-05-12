
<form>
    <?php if (isset($quantitiesArray)): ?>
        <div class = 'form-group col-xs-3 col-xs-offset-1'>
            <label for = 'quantity' class = 'control-label sr-only'></label>
            <?php
            echo form_dropdown('quantity', $quantitiesArray, '', 'class="form-control input-md"');
            ?>
        </div>
        <div class = 'form-group col-xs-3'>
            <label for = 'amount' class = 'control-label sr-only'></label>
            <input name = 'amount' type = "text" class = "form-control input-md" placeholder = 'Price'>
        </div>
        <div class = 'form-group col-xs-3'>
            <label for = 'price-type' class = 'control-label sr-only'>Price Type</label>
            <?php
            echo form_dropdown('price-type', [
                'public' => 'Public',
                'wholesale' => 'Wholesale',
                'staff' => 'Staff'
                    ], '', 'class="form-control input-md"');
            ?>
        </div>

        <div class = 'form-group col-xs-2'>
            <i class="fa fa-floppy-o primary link" class = "form-control input-md" onclick='add(this.closest("form"))'></i>
        </div>

        <input type='hidden' name='pricing' value='true'>
        <?php
    else:
        echo '<p> No quantities to add price for, please add quantity first</p>';
    endif;
    ?>
</form>
<div class="clearfix"></div>
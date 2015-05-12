<div class="tab-pane active" id="delivery-target-<?php echo $delivery->getId(); ?>" onload="refreshTimepickers()">
    <form method="post" enctype="multipart/form-data">
        <div class='form-group col-xs-12'>
            <label for='host' class='control-label sr-only'>Host: </label>
            <?php
            echo form_dropdown(
                    'host', $userArray, $delivery->getHost()->getId() , 'class="form-control input-lg"'
            )
            ?>
        </div>
        <div class='form-group col-xs-12'>
            <label for='address' class='control-label sr-only'>Address: </label>
            <input name='address' type="text" class="form-control input-lg" value="<?php echo $delivery->getAddress() ?>" placeholder='Address'>
        </div>
        <div class = 'form-group col-xs-4'>
            <label for = 'day' class = 'control-label sr-only'>Day: </label>
            <?php
            echo form_dropdown('day', Constants::$DELIVERY_DAYS, $delivery->getDay(), 'class="form-control input-lg"');
            ?>
        </div>

        <div class='form-group col-xs-4'>
            <label for='time-from' class='control-label sr-only'>Time From:</label>
            <div class="input-group">
                <input name='time-from' type="text" class="form-control input-lg time" value="<?php echo $delivery->getTimeFrom() ?>" >
                <i class="fa fa-clock-o input-group-addon "></i>
            </div>
        </div>
        <div class='form-group col-xs-4'>
            <label for='time-to' class='control-label sr-only'>Time To:</label>
            <div class="input-group">
                <input name='time-to' type="text" class="form-control input-lg time" value="<?php echo $delivery->getTimeTo() ?>" >
                <i class="fa fa-clock-o input-group-addon"></i>
            </div>
        </div>
        <div class='form-group col-xs-12'>
            <label for='description' class='control-label sr-only'></label>
            <textarea name='description' type="text" rows='5' class="form-control input-lg" placeholder="description"><?php echo $delivery->getDescription() ?></textarea>
        </div>

        <input type="hidden" name="id" value="<?php echo $delivery->getId(); ?>"/>
        <button type="submit" class="primary-button" name='submit' value='edit'><h4>Save</h4></button>
        <button type="submit" class="primary-button" name='submit' value='delete'><h4>Delete</h4></button>
    </form>
</div>


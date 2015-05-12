<form id="delivery-options" action="<?php echo base_url() ?>order">
    <div class="form-group col-sm-6 col-xs-12">
        <div class="row">
            <h1 class="h2">Delivery Options</h1>
            <div class='form-group col-xs-6'>
                <label for='deliveryPoint' class='control-label'>Delivery Point:</label>
                <?php
                echo form_dropdown('deliveryPoint', $deliveryPoints, '', 'class="form-control input-md" onchange="getDeliveryDescription($(this).val())"');
                ?>
            </div>

            <div class='form-group col-xs-6'>
                <label for='frequency' class='control-label'>Frequency:</label>
                <?php
                echo form_dropdown('frequency', Constants::$FREQUENCIES, '', 'class="form-control input-md"');
                ?>
            </div>
            <div id="delivery-description-wrap" class='form-group col-xs-12'></div>
        </div>
    </div>


    <div class="form-group col-sm-6 col-xs-12">
        <div class="row">
            <h1 class="h2">Preferences</h1>
            <div class='form-group col-xs-12'>
                        <label for="include[]" class="control-label">Prefer</label>
                        <?php
                        echo form_dropdown(
                                'include[]', $includes, '', 'autocomplete="off" class="tagsinput form-control input-md preferences" multiple '
                        )
                        ?>
                    </div>
                    <div class='form-group col-xs-12'>
                        <label for="exclude[]" class="control-label">Exclude</label>
                        <?php
                        echo form_dropdown(
                                'exclude[]', $excludes, '', 'autocomplete="off" class="tagsinput form-control input-md preferences" multiple'
                        )
                        ?>
                    </div>
        </div>
    </div>
    <input type="hidden" name="save" value="1"/>
</form>
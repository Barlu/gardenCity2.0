<div class='cms-heading-wrap'>
    <h1>Deliveries</h1>
</div>
<section id='deliveries-list' class='list-admin'>
    <ul class="nav nav-stacked">
        <li class='active'><a href='#new' data-toggle='pill' >Add new</a></li>
        <?php
        foreach ($deliveries as $delivery) {
            echo '<li><a id="delivery-' . $delivery->getId() . '" href="#delivery-target-' . $delivery->getId() . '" role="tab" data-toggle="pill" onclick="generateContentPanel(' . $delivery->getId() . ', \'delivery\', \'.outer\');">' . $delivery->getAddress() . "</a></li>";
        }
        ?>
    </ul>
    <div class='clearfix'></div>
</section>
<section id='deliveries-content' class='content-admin'>
    <div class="tab-content outer">
        <div class="tab-pane active" id="new">
            <form method="post" enctype="multipart/form-data">

                <div class='form-group col-xs-12'>
                    <label for='host' class='control-label sr-only'>Host: </label>
                    <?php
                        echo form_dropdown(
                                'host', $userArray, '', 'class="form-control input-lg"'
                        )
                        ?>
                </div>
                <div class='form-group col-xs-12'>
                    <label for='address' class='control-label sr-only'>Address: </label>
                    <input name='address' type="text" class="form-control input-lg"  placeholder='Address'>
                </div>
                <div class = 'form-group col-xs-4'>
                    <label for = 'day' class = 'control-label sr-only'>Day: </label>
                    <?php
                    echo form_dropdown('day', Constants::$DELIVERY_DAYS, '', 'class="form-control input-lg"');
                    ?>
                </div>

                <div class='form-group col-xs-4'>
                    <label for='time-from' class='control-label sr-only'>Time From:</label>
                    <div class="input-group">
                        <input name='time-from' type="text" class="form-control input-lg time"  >
                        <i class="fa fa-clock-o input-group-addon "></i>
                    </div>
                </div>
                <div class='form-group col-xs-4'>
                    <label for='time-to' class='control-label sr-only'>Time To:</label>
                    <div class="input-group">
                        <input name='time-to' type="text" class="form-control input-lg time"  >
                        <i class="fa fa-clock-o input-group-addon"></i>
                    </div>
                </div>
                <div class='form-group col-xs-12'>
                    <label for='description' class='control-label sr-only'></label>
                    <textarea name='description' type="text" rows='5' class="form-control input-lg" placeholder="Description"></textarea>
                </div>
                <div class='form-group col-xs-12'>
                    <button type="submit" class="primary-button" name='submit' value='add'><h4>Save</h4></button>
                </div>
            </form>
        </div>
    </div>
    <div class='clearfix'></div>
</section>
<script>
    

</script>

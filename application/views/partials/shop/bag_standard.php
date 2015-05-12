<h1><?php echo $bag->getName() ?></h1>
<p>
    <?php echo $bag->getDescription() ?>
</p>
<form>

<!--Onchange needs to generate delivery point details-->
<div class='form-group col-xs-12'>
<label for='deliveryPoint' class='control-label'>Delivery Point:</label>
    <?php
echo form_dropdown('deliveryPoint', $deliveryPoints, '', 'class="form-control input-md"');
?>
</div>

<div class='form-group col-xs-12'>
<label for='deliveryPoint' class='control-label'>Delivery Point:</label>
<?php
echo form_dropdown('frequency', Constants::$FREQUENCIES, '', 'class="form-control input-md"');
?>
</div>

<!--Preferences-->
<!--Uses tags-input and bootstrap typeahead-->
<div class='form-group col-xs-6'>
<label for="prefer">Prefer</label>
<select name="prefer" multiple ></select>
</div>

<div class='form-group col-xs-6'>
<label for="exclude">Exclude</label>
<select name="exclude" multiple ></select>
</div>

<!--Extras?-->
<button>Add new +</button>
<!--Either opens modal or goes to produce page using ajax add to cart then repopulates this page.-->
</form>
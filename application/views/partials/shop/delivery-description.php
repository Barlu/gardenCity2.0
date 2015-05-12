<label for="firstDay" class="control-label">Day of first delivery</label>
<?php echo form_dropdown('firstDay', $days, '', 'class="form-control"'); ?>
<h1 class="h2">Host: <?php echo $delivery->getHost()->getFirstName(); ?></h1>
<h2 class="h4">Pickup Times: <?php echo $delivery->getTimeFrom(); ?> - <?php echo $delivery->getTimeTo(); ?></h2>
<p>
    <?php echo $delivery->getDescription(); ?>
</p>


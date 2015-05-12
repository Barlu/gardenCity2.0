<div class='cms-heading-wrap'>
    <h1><?php echo $month ?></h1>
</div>
<div id="week-wrap">
    <a href="<?php echo base_url() ?>admin/production/previous"><i class="fa fa-caret-left primary"></i></a>
    <a href="<?php echo base_url() ?>admin/production"><h2 class="link">Week <?php echo $week ?></h2></a>
    <a href="<?php echo base_url() ?>admin/production/next"><i class="fa fa-caret-right primary"></i></a>
</div>


<ul id="day-list">
    <?php foreach ($days as $day): ?>
        <a href="<?php echo base_url() ?>admin/production/day/<?php echo $day['start'] . '-' . $day['end'] ?>">
            <li class="production-days <?php
            if ($day['start'] . '-' . $day['end'] === $selected) {
                echo 'selected';
            }
            ?>">

                <?php echo $day['date'] . '<br/>' . $day['day'] . '<br/>-' . $day['orders']; ?>-
            </li>
        </a>
    <?php endforeach; ?>
</ul>
<div class="flex-row-center col-xs-12">
    <ul class="summary-list flex-column col-xs-2">
        
        <?php foreach ($bags as $bag): ?>
            <li >
                <?php echo $bag['name'] . '<br/>-' . $bag['orders'] . '-'; ?> 
            </li>
        <?php endforeach; ?>
    </ul>
    <ul class="summary-list flex-row col-xs-8">
        
        <?php foreach ($quantityWatch as $quantity): ?>
            <li >
                <?php echo $quantity['name'] . '<br/>' . $quantity['quantity'] . '<br/>-' . $quantity['count'] . '-'; ?> 
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="flex-row-center col-xs-12">
    
        <ul class="summary-list flex-row col-xs-8">
            <?php foreach ($produce as $item) : ?>
                <li >
                    <?php echo $item['name'] . '<br/>-' . $item['orders'] . '-'; ?> 
                </li>
            <?php endforeach; ?>
        </ul>
   
    <section id='deliveries-list' class="list-admin">
        <ul class="nav nav-stacked">
            <?php foreach ($deliveries as $delivery): ?>
                <li class="padding flex-row">
                    <?php echo $delivery['name'] . '  -' . $delivery['orders'] . '-' ?> 
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</div>


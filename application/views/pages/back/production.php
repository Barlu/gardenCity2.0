<div class='cms-heading-wrap'>
    <h1><?php echo $month ?></h1>
</div>
<div id="week-wrap">
    <a href="<?php echo base_url() ?>index.php/admin/production/previous"><i class="fa fa-caret-left primary"></i></a>
    <h2>Week <?php echo $week ?></h2>
    <a href="<?php echo base_url() ?>index.php/admin/production/next"><i class="fa fa-caret-right primary"></i></a>
</div>


<ul id="day-list">
    <?php foreach ($days as $day): ?>
        <a href="#">
            <li class="production-days">
                <?php echo $day['date'] . '<br/>' . $day['day'] . '<br/>-' . $day['orders']; ?>-
            </li>
        </a>
    <?php endforeach; ?>
</ul>

<section id="production-summary">
    <ul class="summary-list flex-row">
        <?php foreach ($bags as $bag): ?>
            <li >
                <?php echo $bag['name'] . '<br/>-' . $bag['orders'] . '-'; ?> 
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<section id="watch-list-summary">
    <ul class="summary-list flex-row">
        <?php foreach ($quantityWatch as $quantity): ?>
            <li >
                <?php echo $quantity['name'] . '<br/>' . $quantity['quantity'] . '<br/>-' . $quantity['count'] . '-'; ?> 
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<div class="flex-row-center">
    <section id='deliveries-list' class="list-admin">
        <ul class="nav nav-stacked ">
            <?php foreach ($deliveries as $delivery): ?>
                <li class="padding flex-row">
                    <?php echo $delivery['name'] . '  -' .  $delivery['orders'] . '-'?> 
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section id="produce-output">
        <ul class="summary-list flex-row">
        <?php foreach ($produce as $item) : ?>
            <li >
                <?php echo $item['name'] . '<br/>-' . $item['orders'] . '-'; ?> 
            </li>
        <?php endforeach; ?>
        </ul>
    </section>
</div>
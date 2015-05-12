<div id="newsletter-accordian-target-<?php echo $newsletter->getId() ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
    <div class="panel-body">
        <img src="<?php echo $newsletter->getImage()->getLocation('small') ?>" alt="<?php echo $newsletter->getImage()->getTitle()?>" title="<?php echo $newsletter->getImage()->getTitle()?>"/>
        <h1 class="h3"><?php echo $newsletter->getName() ?></h1>
        <p>
            <?php echo $newsletter->getDescription() ?>
        </p>
    </div>
</div>


<div class="tab-pane active" id="newsletter-target-<?php echo $newsletter->getId() ?>">
    <img class="box-shadow" src="<?php echo $newsletter->getImage()->getLocation('medium') ?>" alt="<?php echo $newsletter->getImage()->getTitle() ?>">
    <h1 class="h1"><?php echo $newsletter->getName() ?></h1>
    <p><?php echo $newsletter->getDescription() ?></p>
    <a href="<?php echo $newsletter->getLink() ?>" class="primary-button">To Newsletter &nbsp;<i class="fa fa-caret-right"></i></a>
</div>



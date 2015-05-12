<div class="panel-group paper-texture" id="newsletter-accordian" role="tablist" aria-multiselectable="true">
    <?php $count = 0; ?>
    <?php foreach ($newsletters as $newsletter) : ?>
        <?php if ($count < 1): ?>
            <div class="panel panel-default white-background">
                <div class="panel-heading" role="tab">
                    <h1 class="panel-title h1">
                        <a data-toggle="collapse" data-parent="#newsletter-accordian" href="#newsletter-panel-<?php echo $newsletter->getId() ?>" aria-expanded="true" aria-controls="collapseOne">
                            <?php echo $newsletter->getName() ?>
                        </a>
                    </h1>
                </div>
                <div id="newsletter-panel-<?php echo $newsletter->getId() ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <img src="<?php echo $newsletter->getImage()->getLocation('small') ?>" alt="<?php echo $newsletter->getImage()->getTitle() ?>" title="<?php echo $newsletter->getImage()->getTitle() ?>"/>
                        <h1 class="h3"><?php echo $newsletter->getName() ?></h1>
                        <p>
                            <?php echo $newsletter->getDescription() ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="panel panel-default white-background " id="newsletter-panel-wrap-<?php echo $newsletter->getId() ?>">
                <div class="panel-heading" role="tab">
                    <h1 class="panel-title h1">
                        <a data-toggle="collapse" data-parent="#newsletter-accordian" href="#newsletter-accordian-target-<?php echo $newsletter->getId(); ?>" aria-expanded="true" aria-controls="newsletter-panel-<?php echo $newsletter->getId(); ?> " onclick="generateContentPanel(<?php echo $newsletter->getId(); ?>, 'newsletter-accordian')" id="newsletter-accordian-<?php echo $newsletter->getId(); ?>">
                            <?php echo $newsletter->getName() ?>
                        </a>
                    </h1>
                </div>
            </div>
        <?php endif; ?>
        <?php $count += 1; ?>
    <?php endforeach; ?>
</div>



    <ul class="nav nav-pills nav-stacked">
        <?php $count = 0; ?>
        <?php foreach ($newsletters as $newsletter) : ?>
            <?php if ($count < 1): ?>
                <li class="active">
                    <a href="#newsletter-target-<?php echo $newsletter->getId(); ?>" data-toggle="pill"><?php echo $newsletter->getName(); ?></a>
                </li>
            <?php else: ?>
                <li>
                    <a href="#newsletter-target-<?php echo $newsletter->getId(); ?>" data-toggle="pill" onclick="generateContentPanel(<?php echo $newsletter->getId(); ?>, 'newsletter-tab', '')" id="newsletter-tab-<?php echo $newsletter->getId(); ?>"><?php echo $newsletter->getName(); ?></a>
                </li>
            <?php endif; ?>
            <?php $count += 1; ?>
        <?php endforeach; ?>
    </ul>

    <div class="tab-content">
        <?php if(count($newsletters) > 0): ?>
                <div class="tab-pane active" id="newsletter-target-<?php echo $newsletters[0]->getId() ?>">
                    <img class="box-shadow" src="<?php echo $newsletters[0]->getImage()->getLocation('medium') ?>" alt="<?php echo $newsletters[0]->getImage()->getTitle() ?>">
                    <h1 class="h1"><?php echo $newsletters[0]->getName() ?></h1>
                    <p><?php echo $newsletters[0]->getDescription() ?></p>
                    <a href="<?php echo $newsletters[0]->getLink() ?>" class="primary-button">To Newsletter &nbsp;<i class="fa fa-caret-right"></i></a>
                </div>
        <?php endif; ?>
    </div>
    <div class='clear'></div>



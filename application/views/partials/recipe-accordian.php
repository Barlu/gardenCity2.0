<div class="panel-group paper-texture" id="recipe-accordian" role="tablist" aria-multiselectable="true">
    <?php $count = 0; ?>
    <?php foreach ($recipes as $recipe) : ?>
        <?php if (!empty($selectedRecipe) && (int) $selectedRecipe === $recipe->getId()): ?>
            <div class="panel panel-default white-background">
                <div class="panel-heading" role="tab">
                    <h1 class="panel-title h1">
                        <a data-toggle="collapse" data-parent="#recipe-accordian" href="#recipe-panel-<?php echo $recipe->getId() ?>" aria-expanded="true" >
                            <?php echo $recipe->getName() ?>
                        </a>
                    </h1>
                </div>
                <div id="recipe-panel-<?php echo $recipe->getId() ?>" class="panel-collapse collapse in" role="tabpanel" >
                    <div class="panel-body">
                        <img src="<?php echo $recipe->getImage()->getLocation('small') ?>" alt="<?php echo $recipe->getImage()->getTitle() ?>" title="<?php echo $recipe->getImage()->getTitle() ?>"/>
                        <h1 class="h3"><?php echo $recipe->getName() ?> <a href="<?php echo $recipe->getFile();?>"  download class='pull-right primary'><i class="fa fa-download"></i></a></h1>
                        <p>
                            <?php echo $recipe->getDescription() ?>
                        </p>
                    </div>
                </div>
            </div>

        <?php elseif (empty($selectedRecipe) && $count < 1): ?>
            <div class="panel panel-default white-background">
                <div class="panel-heading" role="tab">
                    <h1 class="panel-title h1">
                        <a data-toggle="collapse" data-parent="#recipe-accordian" href="#recipe-panel-<?php echo $recipe->getId() ?>" aria-expanded="true" >
                            <?php echo $recipe->getName() ?>
                        </a>
                    </h1>
                </div>
                <div id="recipe-panel-<?php echo $recipe->getId() ?>" class="panel-collapse collapse in" role="tabpanel" >
                    <div class="panel-body">
                        <img src="<?php echo $recipe->getImage()->getLocation('small') ?>" alt="<?php echo $recipe->getImage()->getTitle() ?>" title="<?php echo $recipe->getImage()->getTitle() ?>"/>
                        <h1 class="h3"><?php echo $recipe->getName() ?> <a href="<?php echo $recipe->getFile();?>"  download class='pull-right primary'><i class="fa fa-download"></i></a></h1>
                        <p>
                            <?php echo $recipe->getDescription() ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="panel panel-default white-background " id="recipe-panel-wrap-<?php echo $recipe->getId() ?>">
                <div class="panel-heading" role="tab">
                    <h1 class="panel-title h1">
                        <a data-toggle="collapse" data-parent="#recipe-accordian" href="#recipe-accordian-target-<?php echo $recipe->getId(); ?>" aria-expanded="true" aria-controls="recipe-panel-<?php echo $recipe->getId(); ?> " onclick="generateContentPanel(<?php echo $recipe->getId(); ?>, 'recipe-accordian')" id="recipe-accordian-<?php echo $recipe->getId(); ?>">
                            <?php echo $recipe->getName() ?>
                        </a>
                    </h1>
                </div>
            </div>
        <?php endif; ?>
        <?php $count += 1; ?>
    <?php endforeach; ?>
</div>


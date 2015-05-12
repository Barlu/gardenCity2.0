
<ul class="nav nav-pills nav-stacked">
    <?php $count = 0; ?>
    <?php $index = 0; ?>
    <?php foreach ($recipes as $recipe) : ?>
        <?php if (!empty($selectedRecipe) && (int) $selectedRecipe === $recipe->getId()): ?>
            <li class="active">
                <a href="#recipe-target-<?php echo $recipe->getId(); ?>" data-toggle="pill"><?php echo $recipe->getName(); ?></a>
            </li>
            <?php $index = $count; ?>
        <?php elseif (empty($selectedRecipe) && $count < 1): ?>
            <li class="active">
                <a href="#recipe-target-<?php echo $recipe->getId(); ?>" data-toggle="pill"><?php echo $recipe->getName(); ?></a>
            </li>
        <?php else: ?>
            <li>
                <a href="#recipe-target-<?php echo $recipe->getId(); ?>" data-toggle="pill" onclick="generateContentPanel(<?php echo $recipe->getId(); ?>, 'recipe-tab', '')" id="recipe-tab-<?php echo $recipe->getId(); ?>"><?php echo $recipe->getName(); ?></a>
            </li>
        <?php endif; ?>
        <?php $count += 1; ?>
    <?php endforeach; ?>
</ul>

<div class="tab-content">
    <?php if (count($recipes) > 0): ?>
        <div class="tab-pane active padding" id="recipe-target-<?php echo $recipes[$index]->getId() ?>">
            <img class="box-shadow" src="<?php echo $recipes[$index]->getImage()->getLocation('small') ?>" alt="<?php echo $recipes[$index]->getImage()->getTitle() ?>">
            <h1 class="h1"><?php echo $recipes[$index]->getName() ?><a href="<?php echo $recipes[$index]->getFile();?>"  download class='pull-right primary'><i class="fa fa-download"></i></a></h1>
            <p><?php echo $recipes[$index]->getDescription() ?></p>
        </div>
    <?php endif; ?>
</div>
<div class='clear'></div>



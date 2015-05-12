<div class="tab-pane padding active" id="recipe-target-<?php echo $recipe->getId() ?>">
    <img class="box-shadow" src="<?php echo $recipe->getImage()->getLocation('small') ?>" alt="<?php echo $recipe->getImage()->getTitle() ?>">
    <h1 class="h1"><?php echo $recipe->getName() ?><a href="<?php echo $recipe->getFile();?>"  download class='pull-right primary'><i class="fa fa-download"></i></a></h1>
    <p><?php echo $recipe->getDescription() ?></p>
</div>



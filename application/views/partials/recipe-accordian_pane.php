<div id="recipe-accordian-target-<?php echo $recipe->getId() ?>" class="panel-collapse collapse in" role="tabpanel" >
    <div class="panel-body">
        <img src="<?php echo $recipe->getImage()->getLocation('small') ?>" alt="<?php echo $recipe->getImage()->getTitle()?>" title="<?php echo $recipe->getImage()->getTitle()?>"/>
        <h1 class="h3"><?php echo $recipe->getName() ?><a href="<?php echo $recipe->getFile();?>"  download class='pull-right primary'><i class="fa fa-download"></i></a></h1>
        <p>
            <?php echo $recipe->getDescription() ?>
        </p>
    </div>
</div>


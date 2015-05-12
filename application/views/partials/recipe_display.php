<article class="padding image-fade small-article col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-md-4 col-md-offset-0">
    <a href="<?php echo base_url(); ?>index.php/our_food/recipes/<?php echo $recipe->getId(); ?>" class="link-article">
        <div class="black-background box-shadow">
            <div class="image-border flex-column">
                <h1><?php echo $recipe->getName() ?></h1>
            </div>
            <img src="<?php echo $recipe->getImage()->getLocation('small'); ?>"/>
        </div>
        <p>
            <?php echo character_limiter($recipe->getDescription(), 220); ?>
        </p>
        <p class="pull-right primary" >read more <i class="fa fa-long-arrow-right"></i></p>

        <div class="clear"></div>
    </a>
</article>


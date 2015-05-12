<div id='banner' >
    <ul class='slideme'>
        <?php foreach ($banners as $banner): ?>
            <li>
                <?php if ($banner->getLink()): ?>
                    <a href="<?php echo $banner->getLink() ?>">
                    <?php endif; ?>
                    <img src="<?php echo $banner->getImage()->getLocation('large') ?>"/>
                    <?php if ($banner->getHeading()): ?>
                        <div class="banner-caption">
                            <div class="flex-row-center styled-heading-wrap">
                                <span class="left"></span><h1 class='center styled-heading '><?php echo $banner->getHeading() ?></h1><span class="right"></span>
                            </div>
                            <p><?php echo $banner->getCaption() ?></p>

                            <i class="fa fa-long-arrow-right"></i>

                        </div>
                    <?php endif; ?>

                    <?php if ($banner->getLink()): ?>
                    </a>

                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>  
</div>




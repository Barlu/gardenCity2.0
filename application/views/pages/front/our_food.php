<div class='content-wrap flex-column container-fluid' id='shop'>
    <div class="heading-wrap">
        <div class='paper-texture'>
            <div class='heading-image'>
                <img src='<?php echo base_url(); ?>assets/images/our-food.jpg' class="box-shadow"/>
                <h1 class='heading'>Our Food</h1>
            </div>
        </div>
    </div>


    <div class='paper-texture'>
        <div class="white-background box-shadow our-food padding-large">


            <div id="product-wrap">
                <div class="padding-large">
                    <div class="flex-row-center styled-heading-wrap">
                        <span class="left"></span><h1 class='center styled-heading '>Food Bags</h1><span class="right"></span>
                    </div>
                    <p class="padding">
                        Fusce sit amet turpis tempus, tempor massa eget, facilisis urna.  Donec tempus bibendum quam non facilisis. Fusce semper eros id orci tempus mattis. Morbi mollis condimentum semper. Fusce molestie non est accumsan consectetur. Praesent pretium nulla ac tempus ullamcorper. Fusce sit amet turpis tempus, tempor massa eget, facilisis urna. Aenean pulvinar ex in tortor pellentesque, ut tincidunt tellus porta. Aenean pulvinar ex in tortor pellentesque, ut tincidunt tellus porta.
                    </p>

                    <div class="divider"></div>

                </div>
                <div >
                    <?php
                    foreach ($bags as $bag) {
                        $data = [];
                        $data['bag'] = $bag;
                        foreach ($bag->getQuantities() as $quantity) {
                            $price = $quantity->getPriceByType($this->session->userdata('usertype'));
                            $data['quantities'][] = ['quantityId' => $quantity->getId(), 'priceId' => $price->getId(), 'price' => $price->getAmount()];
                        }
                        $this->load->view('partials/shop/bag_display', $data);
                    }
                    ?>
                </div>
            </div>

            <div id='recipe-wrap' >
                <div class="padding-large">
                    <div class="flex-row-center styled-heading-wrap">
                        <span class="left"></span><h1 class='center styled-heading '>Recipes</h1><span class="right"></span>
                    </div>
                    <p class="padding">
                        Fusce sit amet turpis tempus, tempor massa eget, facilisis urna.  Donec tempus bibendum quam non facilisis. Fusce semper eros id orci tempus mattis. Morbi mollis condimentum semper. Fusce molestie non est accumsan consectetur. Praesent pretium nulla ac tempus ullamcorper. Fusce sit amet turpis tempus, tempor massa eget, facilisis urna. Aenean pulvinar ex in tortor pellentesque, ut tincidunt tellus porta. Aenean pulvinar ex in tortor pellentesque, ut tincidunt tellus porta.usce lacus nunc, egestas in fermentum a, finibus eget metus. Suspendisse potenti.
                    </p>

                    <div class="divider"></div>
                </div>
                <?php $count = 0; ?>
                <?php foreach ($recipes as $recipe): ?>
                    <?php if ($count === 0): ?>
                        <article id='main-recipe' class="padding image-fade col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-md-12">
                            <a href="<?php echo base_url(); ?>our_food/recipes/<?php echo $recipe->getId(); ?>" class="link-article">
                                <div class="col-md-6 row">
                                    <div class="black-background box-shadow ">
                                        <div class="image-border flex-column">
                                            <h1><?php echo $recipe->getName() ?></h1>
                                        </div>
                                        <img src="<?php echo $recipe->getImage()->getLocation('small'); ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 row">
                                    <p >
                                        <?php echo character_limiter($recipe->getDescription(), 500); ?>
                                    </p>
                                    <p class="pull-right primary" >read more <i class="fa fa-long-arrow-right"></i></p>
                                </div>
                                <div class="clear"></div>
                            </a>
                        </article>

                    <?php else: ?>
                        <?php if ($count === 2): ?>
                            <div class="clearfix visible-sm-block"></div>
                        <?php endif; ?>
                        <?php $data['recipe'] = $recipe; ?>
                        <?php $this->load->view('partials/recipe_display', $data); ?>
                    <?php endif; ?>
                    <?php $count++ ?>
                <?php endforeach; ?>

                <div class='clear'></div>
            </div>

        </div>
    </div>
</div>

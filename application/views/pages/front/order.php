<div class="content-wrap flex-column container-fluid">
    <div class="heading-wrap">
        <div class='paper-texture'>
            <div class='heading-image'>
                <img src='<?php echo base_url(); ?>assets/images/our-food.jpg'/>
                <h1 class='heading'>Our Food</h1>
            </div>
        </div>
    </div>
    
    <div class="order-wizard paper-texture">
        <div id="order-wizard" >

            <?php if ($this->session->userdata('usertype') === 'public' || $this->session->userdata('usertype') === 'staff') : ?>
                <h1 class='wizard-title' id="1">Select Bag</h1>
                <div class="flex-row">
                    <?php
                    foreach ($bags as $bag) {
                        $data = [];
                        $data['bag'] = $bag;
                        foreach ($bag->getQuantities() as $quantity) {
                            $price = $quantity->getPriceByType($this->session->userdata('usertype'));
                            $data['quantities'][] = ['quantityId' => $quantity->getId(), 'priceId' => $price->getId(), 'price' => $price->getAmount()];
                        }

                        $this->load->view('partials/shop/min-bag_display', $data);
                    }
                    ?>
                </div>

                <h1 class="wizard-title">Extras</h1>
                <div class="flex-row">
                    <?php
                    foreach ($produce as $item) {
                        $data = [];
                        $data['produce'] = $item;
                        $data['quantities'] = [];
                        foreach ($item->getQuantities() as $quantity) {
                            $price = $quantity->getPriceByType($this->session->userdata('usertype'));

                            $data['quantities'][$quantity->getId()] = $quantity->getName() . ' - $' . $this->cart->format_number($price->getAmount());
                        }
                        $this->load->view('partials/shop/min-produce_display', $data);
                    }
                    ?>
                </div>
                <h1 class="wizard-title">Review Order</h1>
                <div class='view-order'>
                    <?php $this->load->view('partials/shop/view-order'); ?>
                </div>
            <?php else: ?>
                <h1 class="wizard-title" id="0">Review Order</h1>
                <div>
                    <?php $this->load->view('partials/shop/view-order'); ?>
                </div>
            <?php endif; ?>
            <?php if (!$this->session->userdata('userid')): ?>
                <h1 class="wizard-title ">Log In / Register</h1>
                <div class="center">
                    <div class="col-xs-8 col-sm-6">
                        <h1 class="col-xs-7 h1">Log In</h1>
                        <?php $this->load->view('partials/login') ?>
                    </div>
                </div>
            <?php endif; ?>

            <h1 class="wizard-title">Delivery Details</h1>
            <div>
                <?php $this->load->view('partials/shop/order-options'); ?>
            </div>

        </div>
    </div>
</div>
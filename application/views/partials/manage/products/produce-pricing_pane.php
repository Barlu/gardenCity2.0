
<div class="tab-pane active" id="produce-pricing-target-<?php echo $product->getId(); ?>">
    <div id='produce-pricing-wrap-<?php echo $product->getId(); ?>'>
        <?php
        foreach ($quantities as $quantity) {
            foreach ($quantity->getPrices() as $price) {
                $data['quantity'] = $quantity;
                $data['price'] = $price;
                $this->load->view('partials/manage/products/pricing_form', $data);
            }
        }
        $this->load->view('partials/manage/products/empty-pricing_form');
        ?>
    </div>
    <div class="col-xs-12">
        <button type="button" class="primary-button" onclick='getForm("produce-pricing-wrap-<?php echo $product->getId(); ?>", "empty-pricing", <?php echo $product->getId() ?>)'>Add</button>
    </div>
</div>


<div class="tab-pane active" id="produce-quantities-target-<?php echo $product->getId(); ?>">
    <div id="produce-quantities-wrap-<?php echo $product->getId(); ?>">
        <?php
        $data['product'] = $product;
        foreach ($quantities as $quantity) {
            $data['quantity'] = $quantity;
            $this->load->view('partials/manage/products/quantities_form', $data);
        }
        $this->load->view('partials/manage/products/empty-quantities_form');
        ?>
    </div>
    <div class="col-xs-12">
        <button type="button" class="primary-button" onclick='getForm("produce-quantities-wrap-<?php echo $product->getId(); ?>", "empty-quantities", <?php echo $product->getId(); ?>)'>Add</button>
    </div>
</div>


<div id='cart' class="flex-column">
    <a href='<?php echo base_url() ?>our_food/order' class="flex-row">
        <i class="fa fa-shopping-cart"></i>
        <span class='primary'>(<?php echo $this->cart->total_items() ?>)</span>
    </a>
</div>


<table class="table table-striped">
    <tr>
        <th>Quantity</th>
        <th>Item Description</th>
        <th>Item Price</th>
        <th>Sub-Total</th>
    </tr>

    <?php $i = 1; ?>

    <?php
    foreach ($this->cart->contents() as $items):
        if ($items['options']['type'] === 'Bag'):
            ?> 
            <tr>
                <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                <td>1</td>
                <td>
                    <?php echo $items['name'] . ' ' . $items['options']['type']; ?>
                </td>
                <td class="unit-price">
                    <?php echo $this->cart->format_number($items['price']); ?>
                </td>
                <td class="sub-total">
                    $<?php echo $this->cart->format_number($items['subtotal']); ?>
                </td>
            </tr>
        <?php else: ?>

        <tr>
            <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
            <td>
                <?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '4')); ?>
            </td>
            <td>
                <?php echo $items['name']; ?>
            </td>
            <td class="unit-price">
                <?php echo $this->cart->format_number($items['price']); ?>
            </td>
            <td class="sub-total">
                $<?php echo $this->cart->format_number($items['subtotal']); ?>
            </td>
        </tr>
        <?php endif; ?>
        <?php $i++; ?>

    <?php endforeach; ?>

    <tr>
        <td> </td>
        <td> </td>
        <td><strong>Total</strong></td>
        <td class="total">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
    </tr>

</table>


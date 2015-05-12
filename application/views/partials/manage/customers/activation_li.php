<li>
    <a id="customer-<?php echo $customer->getId() ?>" href="#customer-target-<?php echo $customer->getId() ?>" role="tab" data-toggle="pill" onclick="generateContentPanel(<?php echo $customer->getId() ?>, 'customer', '');"><?php echo $customer->getBusinessName() ?></a> 
</li>


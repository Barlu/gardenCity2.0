<li>
    <h3> <?php echo $product->getName() . ' - ' .  $product->getVariety()?></h3>
    <ul>
        <li><a id="produce-details-<?php echo $product->getId() ?>" role="tab" data-toggle="pill" href="#produce-details-target-<?php echo $product->getId() ?>" onclick="generateContentPanel(<?php echo $product->getId() ?>, 'produce-details', '.outer')">Details</a></li>
        <li><a id="produce-quantities-<?php echo $product->getId() ?>" role="tab" data-toggle="pill" href="#produce-quantities-target-<?php echo $product->getId() ?>" onclick="generateContentPanel(<?php echo $product->getId() ?>, 'produce-quantities', '.outer')">Quantities</a></li>
        <li><a id="produce-pricing-<?php echo $product->getId() ?>" role="tab" data-toggle="pill" href="#produce-pricing-target-<?php echo $product->getId() ?>" onclick="generateContentPanel(<?php echo $product->getId() ?>, 'produce-pricing', '.outer')">Pricing</a></li>
    </ul>
</li>
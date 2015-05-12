<li>
    <h3> <?php echo $product->getName() ?></h3>
    <ul>
        <li><a id="bag-details-<?php echo $product->getId() ?>" role="tab" data-toggle="pill" href="#bag-details-target-<?php echo $product->getId() ?>" onclick="generateContentPanel(<?php echo $product->getId() ?>, 'bag-details', '.outer')">Details</a></li>
        <li><a id="bag-quantities-<?php echo $product->getId() ?>" role="tab" data-toggle="pill" href="#bag-quantities-target-<?php echo $product->getId() ?>" onclick="generateContentPanel(<?php echo $product->getId() ?>, 'bag-quantities', '.outer')">Quantities</a></li>
        <li><a id="bag-pricing-<?php echo $product->getId() ?>" role="tab" data-toggle="pill" href="#bag-pricing-target-<?php echo $product->getId() ?>" onclick="generateContentPanel(<?php echo $product->getId() ?>, 'bag-pricing', '.outer')">Pricing</a></li>
    </ul>
</li>
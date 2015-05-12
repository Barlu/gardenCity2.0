<tr role="tab" class="clickable" data-toggle="pill" id="customer-<?php echo $customer->getId() ?>" data-target="#customer-target-<?php echo $customer->getId() ?>" onclick="generateContentPanel(<?php echo $customer->getId() ?>, 'customer', '');">
    <td><?php echo $customer->getFirstName() . ' ' . $customer->getLastName() ?></td>
    <td><?php echo $customer->getPhone() ?></td>
    <td><?php echo ucfirst($customer->getType()) ?></td>
    <td><?php if ($customer->getDeliveryPoint()): ?><i class='fa fa-check primary'></i><?php endif; ?></td>
    <td><?php echo $customer->getBalance() ?></td>
</tr>



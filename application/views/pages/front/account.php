<div class="content-wrap flex-column container-fluid">
    <div class="paper-texture">
        <div class="white-background box-shadow">
            <div class="col-xs-12">
                <div class="row">
                    <section class="col-sm-8 col-md-6">
                        <form>
                            <h1 class="h1">Personal Details</h1>
                            <div class='form-group col-xs-6'>
                                <label for="firstName" class="control-label sr-only">First Name:</label>
                                <input type="text" name="firstName" class="form-control input-lg" value="<?php echo $user->getFirstName(); ?>" placeholder="First Name"/>
                            </div>
                            <div class='form-group col-xs-6'>
                                <label for="lastName" class="control-label sr-only">Last Name:</label>
                                <input type="text" name="lastName" class="form-control input-lg" value="<?php echo $user->getLastName(); ?>" placeholder="Last Name"/>
                            </div>
                            <div class="form-group col-xs-6 has-feedback">
                                <label for="username" class="control-label sr-only">Username:</label>
                                <input type="text" name="username" id="username" class="form-control input-lg" onblur="Validator.element(this)"  placeholder="Username" value="<?php echo $user->getUsername(); ?>" data-toggle="tooltip"/>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group col-xs-6 has-feedback">
                                <label for="phone" class="control-label sr-only">Username:</label>
                                <input type="text" name="phone" id="phone" class="form-control input-lg" onblur="Validator.element(this)"  placeholder="Phone" value="<?php echo $user->getPhone(); ?>" data-toggle="tooltip"/>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group col-xs-12 has-feedback">
                                <label for="email" class="control-label sr-only">Email:</label>
                                <input type="email" name="email" id="email" class="form-control input-lg" onblur="Validator.element(this)"  placeholder="Email" value="<?php echo $user->getEmail(); ?>" data-toggle="tooltip"/>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $user->getId(); ?>"/>
                            <div class="form-group col-xs-12">
                                <button type="button" class="primary-button" onclick="editRegistration($(this).closest('form'))">Save</button>
                            </div>
                        </form>

                    </section>


                    <section class="col-sm-12 col-md-6">
                        <h1 class="h1">Delivery Details</h1>
                        <?php if ($user->getOrder()): ?>
                            <a href="<?php echo base_url() ?>our_food/order/edit" class="pull-right">Edit Order</a>
                            <table class="table">
                                <tr>
                                    <th>
                                        Next delivery: 
                                    </th>
                                    <td>
                                        <p>
                                            <?php echo $nextDelivery ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Address: 
                                    </th>
                                    <td>
                                        <?php echo $deliveryPoint->getAddress() ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Host: 
                                    </th>
                                    <td>
                                        <?php echo $deliveryPoint->getName() ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Pick up time: 
                                    </th>
                                    <td>
                                        <?php echo $deliveryPoint->getTimeFrom() . ' - ' . $deliveryPoint->getTimeTo() ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Further Details: 
                                    </th>
                                    <td>
                                        <p>
                                            <?php echo $deliveryPoint->getDescription() ?>
                                        </p>
                                    </td>
                                </tr>

                            </table>
                        <?php else: ?>
                            <p> Currently no orders, to place an order please go <a href="<?php echo base_url() ?>our_food">here</a></p>
                        <?php endif; ?>
                    </section>
                </div>
            </div>

            <section class="col-sm-12 col-md-6">
                <h1 class="h1">Preferences</h1>
                <form>
                    <div class='form-group col-xs-12'>
                        <label for="include" class="control-label">Prefer</label>
                        <?php
                        echo form_dropdown(
                                'include[]', $includes, '', 'autocomplete="off" class="tagsinput form-control input-md preferences" multiple '
                        )
                        ?>
                    </div>
                    <div class='form-group col-xs-12'>
                        <label for="exclude" class="control-label">Exclude</label>
                        <?php
                        echo form_dropdown(
                                'exclude[]', $excludes, '', 'autocomplete="off" class="tagsinput form-control input-md preferences" multiple'
                        )
                        ?>
                    </div>
                    <div class='form-group col-xs-12'>
                        <button type="button" class='primary-button' onclick='addEditPreferences(this.closest("form"))'>Save</button>
                    </div>
                </form>
            </section>
            <section class="col-sm-12 col-md-6">
                <?php if ($user->getOrder()): ?>
                    <h1 class="h1">Order Details</h1>
                    <?php
                    if ($user->getOrder()) {
                        echo $this->table->generate($order);
                    }
                    ?>
                <?php else: ?>
                    <p> Currently no orders, to place an order please go <a href="<?php echo base_url() ?>our_food">here</a></p>
                <?php endif; ?>
            </section>





            <div class='clearfix'></div>
        </div>
    </div>
</div>
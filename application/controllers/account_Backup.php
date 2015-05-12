
<div class="paper-texture">
    <div class="white-background box-shadow">
        <section class="col-xs-6">
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
                <button type="button" class="primary-button" onclick="editRegistration($(this).closest('form'))">Save</button>
            </form>

        </section>

        <section class="col-xs-6">
            <h1 class="h1">Order Details</h1>
            <?php
            if ($user->getOrder()) {
                echo $this->table->generate($order);
            }
            ?>
        </section>

        <div class='clearfix'></div>
    </div>
</div>
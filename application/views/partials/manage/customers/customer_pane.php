<div class="tab-pane fade in active" id="customer-target-<?php echo $customer->getId() ?>">
    <form id="customer-form-<?php echo $customer->getId() ?>" class="admin-customer-form">
        <?php if ($customer->getType() === 'wholesaler'): ?>
            <div class='form-group col-xs-12 has-feedback'>
                <label for="businessName" class="control-label sr-only">First Name:</label>
                <input type="text" name="businessName" class="form-control input-md" value="<?php echo $customer->getBusinessName(); ?>" onblur="CustomerValidator.element(this)" placeholder="Business Name"/>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
        <?php endif; ?>
        <div class='form-group col-xs-6 has-feedback'>
            <label for="firstName" class="control-label sr-only">First Name:</label>
            <input type="text" name="firstName" class="form-control input-md" value="<?php echo $customer->getFirstName(); ?>" onblur="CustomerValidator.element(this)" placeholder="First Name"/>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class='form-group col-xs-6'>
            <label for="lastName" class="control-label sr-only">Last Name:</label>
            <input type="text" name="lastName" class="form-control input-md" value="<?php echo $customer->getLastName(); ?>" placeholder="Last Name"/>
        </div>
        <div class="form-group col-xs-6 has-feedback">
            <label for="username" class="control-label sr-only">Username:</label>
            <input type="text" name="username" id="username" class="form-control input-md" onblur="CustomerValidator.element(this)"  placeholder="Username" value="<?php echo ucfirst($customer->getUsername()); ?>" data-toggle="tooltip"/>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="form-group col-xs-6 has-feedback">
            <label for="phone" class="control-label sr-only">Username:</label>
            <input type="text" name="phone" id="phone" class="form-control input-md" onblur="CustomerValidator.element(this)"  placeholder="Phone" value="<?php echo $customer->getPhone(); ?>" data-toggle="tooltip"/>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="form-group col-xs-12 has-feedback">
            <label for="email" class="control-label sr-only">Email:</label>
            <input type="email" name="email" id="email" class="form-control input-md" onblur="CustomerValidator.element(this)"  placeholder="Email" value="<?php echo $customer->getEmail(); ?>" data-toggle="tooltip"/>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        </div>
        <div class="form-group col-xs-6 ">
            <label for="accountType" class="control-label sr-only">Account Type: &nbsp;</label>
            <?php
            echo form_dropdown('accountType', [
                'public' => 'Public',
                'wholesaler' => 'Wholesaler',
                'staff' => 'Staff'
                    ], $customer->getType(), 'class="form-control input-md"');
            ?>
        </div>
        <?php if ($customer->getStatus() === 'pending'): ?>
            <div class="form-group col-xs-offset-4 ">
                <label for="activate" class="control-label">Activate &nbsp;</label>
                <input type="checkbox" name="activate" id="activate"/>
            </div>
        <?php endif; ?>
        <input type="hidden" name="id" value="<?php echo $customer->getId(); ?>"/>
        <input type="hidden" class="originalUsername" value="<?php echo $customer->getUsername(); ?>"/>
        <input type="hidden" class="originalEmail" value="<?php echo $customer->getEmail(); ?>"/>
        <div class="form-group col-xs-12">
            <button type="button" class="primary-button" onclick="editRegistration($(this).closest('form'))">Save</button>
            <button type="button" class="primary-button" onclick="deleteRegistration($(this).closest('form'))">Delete</button>
        </div>
        <div class='clearfix'></div>
    </form>
</div>

<script>
    var base_url = window.location.origin + '/gardenCity2/';
    var CustomerValidator = (function () {
        return $('#customer-form-<?php echo $customer->getId() ?>').validate({
            debug: true,
            rules: {
                firstName: {
                    required: true
                },
                username: {
                    required: true,
                    remote: {
                        param: {
                            url: base_url + 'ajax/checkUnique',
                            type: "GET",
                            data: {
                                username: function () {
                                    return $('#customer-form-<?php echo $customer->getId() ?> #username').val();
                                }
                            }
                        },
                        depends: function () {
                            if ($('#customer-form-<?php echo $customer->getId() ?> .originalUsername').val() === $('#customer-form-<?php echo $customer->getId() ?> #username').val().toLowerCase()) {
                                return false;
                            } else {
                                return true;
                            }
                        }
                    }
                },
                email: {
                    required: true,
                    email: false,
                    emailCustom: true,
                    remote: {
                        param: {
                            url: base_url + 'ajax/checkUnique',
                            type: "GET",
                            data: {
                                email: function () {
                                    return $('#customer-form-<?php echo $customer->getId() ?> #email').val();
                                }
                            }
                        },
                        depends: function () {
                            if ($('#customer-form-<?php echo $customer->getId() ?> .originalEmail').val() === $('#customer-form-<?php echo $customer->getId() ?> #email').val()) {
                                return false;
                            } else {
                                return true;
                            }
                        }
                    }
                },
                phone: {
                    required: true,
                    digits: true
                },
                password: {
                    required: true,
                    checkPassword: true
                },
                passwordRepeat: {
                    required: true,
                    equalTo: '#password'
                }
            },
            messages: {
                username: {
                    required: "Please specify your username",
                    remote: "This username has already been taken"
                },
                email: {
                    required: "Please specify your email address",
                    emailCustom: "Your email address must be in the format of name@domain.com",
                    remote: "This email address is already registered with us"
                },
                password: {
                    required: "Please enter a password",
                    checkPassword: "Please ensure your password has atleast 1 letter, 1 number and is 8 - 16 characters long"
                },
                passwordRepeat: {
                    required: "Please confirm your password",
                    equalTo: "Please make sure your passwords match"
                }
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                if ($(element).data('bs.tooltip')) {
                    $(element).data('bs.tooltip').options.title = error.text();
                    $(element).tooltip('show');
                } else {
                    $(element).tooltip({
                        placement: 'top',
                        title: error.text(),
                        container: '#customer-form-<?php echo $customer->getId() ?>',
                        trigger: 'manual hover'
                    }).tooltip('show');
                }
            },
            success: function (label, element) {
                $(element).tooltip('destroy');
                this.unhighlight(element);
            },
            highlight: function (element) {
                $('#customer-form-<?php echo $customer->getId() ?> #' + element.id + ' + .glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-remove');
                $('#customer-form-<?php echo $customer->getId() ?> #' + element.id).parent().removeClass('has-success').addClass('has-error');
            },
            unhighlight: function (element) {
                $('#customer-form-<?php echo $customer->getId() ?> #' + element.id + ' + .glyphicon').removeClass('glyphicon-remove').addClass('glyphicon-ok');
                $('#customer-form-<?php echo $customer->getId() ?> #' + element.id).parent().removeClass('has-error').addClass('has-success');
            },
            onkeyup: false
        });
    })();
</script>


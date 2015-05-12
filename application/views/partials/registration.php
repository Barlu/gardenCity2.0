
<div class="modal fade" id="registration" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="registration-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h1 class="modal-title primary">Registration</h1>
                </div>
                <div class="modal-body row">
                    <div class='form-group col-xs-6 has-feedback'>
                        <label for="firstName" class="control-label sr-only">First Name:</label>
                        <input type="text" name="firstName" id="firstName" class="form-control input-lg" onblur="Validator.element(this)" placeholder="First Name" data-toggle="tooltip"/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class='form-group col-xs-6 '>
                        <label for="lastName" class="control-label sr-only">Last Name:</label>
                        <input type="text" name="lastName" id="lastName" class="form-control input-lg" placeholder="Last Name"/>
                    </div>
                    <div class="form-group col-xs-6 has-feedback">
                        <label for="username" class="control-label sr-only">Username:</label>
                        <input type="text" name="username" id="username" class="form-control input-lg" onblur="Validator.element(this)"  placeholder="Username" data-toggle="tooltip"/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group col-xs-6 has-feedback">
                        <label for="phone" class="control-label sr-only">Username:</label>
                        <input type="text" name="phone" id="phone" class="form-control input-lg" onblur="Validator.element(this)"  placeholder="Phone" data-toggle="tooltip"/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group col-xs-12 has-feedback">
                        <label for="email" class="control-label sr-only">Email:</label>
                        <input type="email" name="email" id="email" class="form-control input-lg" onblur="Validator.element(this)"  placeholder="Email" data-toggle="tooltip"/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group col-xs-6 has-feedback">
                        <label for="password" class="control-label sr-only">Password: </label>
                        <input type="password" name="password" id="password" class="form-control input-lg" onblur="Validator.element(this)" placeholder="Password" data-toggle="tooltip"/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group col-xs-6 has-feedback">
                        <label for="passwordRepeat" class="control-label sr-only">Confirm Password: </label>
                        <input type="password" name="passwordRepeat" id="passwordRepeat" class="form-control input-lg" onblur="Validator.element(this)" placeholder="Confirm Password" data-toggle="tooltip"/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class='form-group col-xs-9 has-feedback'>
                        <label for="businessName" class="control-label sr-only">Business Name:</label>
                        <input type="text" name="businessName" id="businessName" onblur="Validator.element(this)" placeholder="Business Name" class="form-control input-lg"/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class='form-group col-xs-3 '>
                        <label for="wholesaler" class="control-label">Is this account for a business?&nbsp;<input type="checkbox" name="wholesaler" id="wholesaler"/></label>

                    </div>
                    <div class='clearfix'></div>
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="primary-button" onclick="addRegistration($(this).closest('form'))">Send</button>
                    <button type="button" class="primary-button" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#businessName').hide();
    $(function() {
        $('#wholesaler').on('click', function() {
            $('#businessName').toggle(500);
            $('#businessName').tooltip('destroy');
            $('#businessName + .glyphicon').removeClass('glyphicon-remove');
            $('#businessName + .glyphicon').parent().removeClass('has-error');
        });
    });

</script>

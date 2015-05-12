<div class='cms-heading-wrap'>
    <h1>Customers</h1>
</div>
<div class='flex-row-center'>
    <section class='list-admin col-xs-2' id="account-activations">
        <h1 class='h1'>Account Activations</h1>
        <ul class="nav nav-stacked">      
            <li>
                <a data-toggle="modal" data-target='#registration'>Create Account</a>
            </li>
            <?php
            foreach ($activations as $customer) {
                $data['customer'] = $customer;
                $this->load->view('partials/manage/customers/activation_li', $data);
            }
            ?>
        </ul>
        <div class='clearfix'></div>
    </section>
    <section id="customer-form-view" class="content-admin">
        <div class='tab-content'>
            <div class="tab-pane active">
                <p class="primary">Please select a customer to see their details.</p>
            </div>
        </div>
        <div class='clearfix'></div>
    </section>
</div>
<section class="col-xs-12 padding-large">
    <table class='table table-hover ' id="customer-list">
        <tr>
            <th>Name</th><th>Phone</th><th>Account Type</th><th>Host</th><th>Balance</th>
        </tr>
        <?php
        foreach ($customers as $customer) {
            $data['customer'] = $customer;
            $this->load->view('partials/manage/customers/customer_tr', $data);
        }
        ?>
    </table> 
    <div class='clearfix'></div>
</section>

<div class="modal fade" id="registration" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="registration-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h1 class="modal-title primary">Registration</h1>
                </div>
                <div class="modal-body row">
                    <div class='form-group col-xs-6'>
                        <label for="firstName" class="control-label sr-only">First Name:</label>
                        <input type="text" name="firstName" class="form-control input-md" placeholder="First Name"/>
                    </div>
                    <div class='form-group col-xs-6'>
                        <label for="lastName" class="control-label sr-only">Last Name:</label>
                        <input type="text" name="lastName" class="form-control input-md" placeholder="Last Name"/>
                    </div>
                    <div class="form-group col-xs-6 has-feedback">
                        <label for="username" class="control-label sr-only">Username:</label>
                        <input type="text" name="username" id="username" class="form-control input-md" onblur="Validator.element(this)"  placeholder="Username" data-toggle="tooltip"/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group col-xs-6 has-feedback">
                        <label for="phone" class="control-label sr-only">Username:</label>
                        <input type="text" name="phone" id="phone" class="form-control input-md" onblur="Validator.element(this)"  placeholder="Phone" data-toggle="tooltip"/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group col-xs-12 has-feedback">
                        <label for="email" class="control-label sr-only">Email:</label>
                        <input type="email" name="email" id="email" class="form-control input-md" onblur="Validator.element(this)"  placeholder="Email" data-toggle="tooltip"/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group col-xs-6 has-feedback">
                        <label for="password" class="control-label sr-only">Password: </label>
                        <input type="password" name="password" id="password" class="form-control input-md" onblur="Validator.element(this)" placeholder="Password" data-toggle="tooltip"/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group col-xs-6 has-feedback">
                        <label for="passwordRepeat" class="control-label sr-only">Confirm Password: </label>
                        <input type="password" name="passwordRepeat" id="passwordRepeat" class="form-control input-md" onblur="Validator.element(this)" placeholder="Confirm Password" data-toggle="tooltip"/>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
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
   $('tr:not(:first)').on('click', function(){
        $('tr:not(:first)').removeClass('selected');
        $(this).addClass('selected');
        $('#account-activations li').removeClass('active');
        $('#account-activations').find('#'+$(this).attr('id')).parent().addClass('active');
   });
   
   $('#account-activations li a').on('click', function(){
        $('#customer-list tr').removeClass('selected');
        $('#customer-list #'+$(this).attr('id')).addClass('selected');
   });
</script>

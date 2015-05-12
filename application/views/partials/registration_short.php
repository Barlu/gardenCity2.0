<form>
    <div class="form-group col-xs-6 has-feedback">
        <label for="first-name" class="control-label sr-only">Username:</label>
        <input type="text" name="first-name" id="first-name" class="form-control input-lg" onblur="Validator.element(this)" placeholder="First Name" data-toggle="tooltip"/>
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
    <div class="form-group col-xs-6 has-feedback">
        <label for="last-name" class="control-label sr-only">Username:</label>
        <input type="text" name="last-name" id="last-name" class="form-control input-lg" onblur="Validator.element(this)" placeholder="Last Name" data-toggle="tooltip"/>
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
    <div class="form-group col-xs-6 has-feedback">
        <label for="username" class="control-label sr-only">Username:</label>
        <input type="text" name="username" id="username" class="form-control input-lg" onblur="Validator.element(this)" placeholder="Username" data-toggle="tooltip"/>
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
    <div class="form-group col-xs-6 has-feedback">
        <label for="phone" class="control-label sr-only">Email:</label>
        <input type="email" name="phone" id="phone" class="form-control input-lg" onblur="Validator.element(this)" placeholder="Phone" data-toggle="tooltip"/>
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
    <div class="form-group col-xs-12 has-feedback">
        <label for="email" class="control-label sr-only">Email:</label>
        <input type="email" name="email" id="email" class="form-control input-lg" onblur="Validator.element(this)" placeholder="Email" data-toggle="tooltip"/>
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
    <div class="form-group col-xs-12 has-feedback">
        <button class="primary-button" type="button" onclick="addRegistration(this.closest('form'))">Create Account</button>
    </div>
</form>
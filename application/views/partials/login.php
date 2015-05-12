<form>
    <div class="form-group col-xs-12 has-feedback">
        <label for="username" class="control-label sr-only">Email:</label>
        <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" data-toggle="tooltip"/>
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

    </div>
    <div class="form-group col-xs-12 has-feedback">
        <label for="password" class="control-label sr-only">Password: </label>
        <input type="password" name="password" id="password" class="form-control input-lg"  placeholder="Password" data-toggle="tooltip"/>
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
    <div class="col-xs-12">
        <p data-toggle='modal'  data-target='#registration' data-dismiss="modal" class='sublink pull-right'>Don't have an Account?</p>
    </div>
    <div class="form-group col-xs-12">
        <button type="button" class="primary-button" onclick="logIn(this.closest('form'))">Log In</button>
    </div>
</form>

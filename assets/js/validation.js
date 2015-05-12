/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var base_url = window.location.origin + '/gardenCity2/index.php/';

var EMPTY = 'EMPTY';
var FORMAT = 'INCORRECT_FORMAT';
var EXISTS = 'ALREADY_EXISTS';
var SUCCESS = 'OK';

var Validator = (function() {
    return $('#registration-form').validate({
        debug: true,
        rules: {
            firstName: {
                required: true
            },
            username: {
                required: true,
                remote: {
                    url: base_url + 'ajax/checkUnique',
                    type: "GET",
                    data: {
                        username: function() {
                            return $('#registration-form #username').val();
                        },
                    }
                }
            },
            email: {
                required: true,
                email: false,
                emailCustom: true,
                remote: {
                    url: base_url + 'ajax/checkUnique',
                    type: "GET",
                    data: {
                        email: function() {
                            return $('#registration-form #email').val();
                        },
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
            },
            businessName: {
                required: {
                    depends: function() {
                        return $('#wholesaler').is(':checked');
                    }
                }

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
            },
            businessName: {
                required: "Please enter a business name, if this is not a business account just uncheck the selection"
            }
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            if ($(element).data('bs.tooltip')) {
                $(element).data('bs.tooltip').options.title = error.text();
                $(element).tooltip('show');
            } else {
                $(element).tooltip({
                    placement: 'top',
                    title: error.text(),
                    container: '#registration-form .modal-body',
                    trigger: 'manual hover'
                }).tooltip('show');
            }
        },
        success: function(label, element) {
            $(element).tooltip('destroy');
            this.unhighlight(element);
        },
        highlight: function(element) {
            $('#registration-form #' + element.id + ' + .glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-remove');
            $('#registration-form #' + element.id).parent().removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $('#registration-form #' + element.id + ' + .glyphicon').removeClass('glyphicon-remove').addClass('glyphicon-ok');
            $('#registration-form #' + element.id).parent().removeClass('has-error').addClass('has-success');
        },
        onkeyup: false
    });
})();

$.validator.addMethod('emailCustom', function(email) {
    var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
});

$.validator.addMethod('checkPassword', function(password) {
    var regex = /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$/;
    console.log(regex);
    return regex.test(password);
});

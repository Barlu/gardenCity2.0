var base_url = window.location.origin + '/gardenCity2/index.php/';

$(function () {
//    Manually create banner dropzone to allow success function
    var bannerDropzone = $("#banner-dropzone");
    Dropzone.options.bannerDropzone = {
        paramName: 'image',
        init: function () {
            this.on("success", function (file, response) {
                $('#banner-images').append(response);
                setTimeout(function () {
                    $('div.dz-success').fadeOut(1000, function () {
                        $('div.dz-message').fadeIn(500);
                    });
                }, 1500);
            });
        }
    };

//    Hide image edit pane when maving to another gallery
    $('#images-list a').on('click', function () {
        $('.tab-content.inner .tab-pane').removeClass('active');
        $('.tab-content.outer .tab-pane li').removeClass('active');
    });
});

//Assess height of fancy images
$(function () {
    $(window).on('resize', function () {
        $('.image-border').each(function () {
            var parentHeight = $(this).parent().height();
            var margin = parseInt($(this).css("margin-top").replace("px", "")) + parseInt($(this).css("margin-bottom").replace("px", ""));
            $(this).height(parentHeight - margin);

        });
    })
    $('.image-border').each(function () {
        var parentHeight = $(this).parent().height();
        var margin = parseInt($(this).css("margin-top").replace("px", "")) + parseInt($(this).css("margin-bottom").replace("px", ""));
        $(this).height(parentHeight - margin);

    });
});

//Instantiate title banner
$("#banner").slideme({
    autoslide: true,
    interval: 8000,
    loop: true,
    transition: 'fade',
    speed: 3000,
    css3: true,
    resizable: {
        width: 1920,
        height: 800
    }
});


//Intantiates tag inputs for preferences
$(function () {
    $('.tagsinput.preferences').tagsinput({
        itemValue: function (item) {
            return item.id;
        },
        itemText: function (item) {
            return item.name;
        },
        typeahead: {
            source: function (query) {
                return $.ajax({
                    url: base_url + 'ajax/getProduceArray',
                    type: "GET",
                    dataType: 'json'
                })

            }
        }
    });

    $('[name="include[]"] option').each(function () {
        $('.tagsinput:first').tagsinput(
                'add', {
                    id: $(this).val(),
                    name: $(this).text()
                }
        )
    });
    $('[name="exclude[]"] option').each(function () {
        $('.tagsinput:last').tagsinput(
                'add', {
                    id: $(this).val(),
                    name: $(this).text()
                }
        )
    });

    $('.tagsinput').on('beforeItemAdd', function (event) {
        $('.bootstrap-tagsinput input').val('');
    });

    $('.bootstrap-tagsinput').addClass('form-control');
});

$(function () {
    $.ajax({
        url: base_url + 'ajax/getCustomerArray',
        type: "GET",
        dataType: 'json'
    })
            .done(function (data) {
                $('.typeahead').typeahead({
                    source: data,
                    minLength: 0
                });
            })

});


$(document).ready(function () {
    $('#order-wizard input').keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});



//ACCORDIAN - CMS NAV
$(document).ready(function () {
    $(".accordian.cms-nav h3").on('click', function () {
        //slide up all the link lists
        $(".accordian.cms-nav ul ul").slideUp();
        //slide down the link list below the h3 clicked - only if its closed
        if (!$(this).next().is(":visible"))
        {
            $(this).next().slideDown();
        }
        $(".accordian.cms-nav li").removeClass('active');
        $(this).parent().addClass('active');
    });
    $(".accordian.product-nav h3").on('click', function (e) {
        //slide up all the link lists
        $(".accordian.product-nav ul ul").slideUp();
        //slide down the link list below the h3 clicked - only if its closed
        if (!$(this).next().is(":visible"))
        {
            $(this).next().slideDown();
        }
        $(".accordian.product-nav li").removeClass('active');
        $(this).parent().addClass('active');
        $(this).next().find('li a:first').trigger('click');
    });

    var urlArray = window.location.pathname;
    if (urlArray.indexOf('newsletters') >= 0 || urlArray.indexOf('recipes') >= 0 || urlArray.indexOf('images') >= 0) {
        $(".accordian.cms-nav li").removeClass('active');
        $(".accordian.cms-nav #content-nav").addClass('active');
    } else if (urlArray.indexOf('customers') >= 0 || urlArray.indexOf('products') >= 0 || urlArray.indexOf('accounts') >= 0 || urlArray.indexOf('deliveries') >= 0) {
        $(".accordian.cms-nav li").removeClass('active');
        $(".accordian.cms-nav #manage-nav").addClass('active');
    }
});

function getForm(wrapId, formType, id) {
    $.ajax({
        url: base_url + 'ajax/getForm',
        type: "GET",
        data: {
            'type': formType,
            'id': id

        },
        dataType: 'html'

    })
            .done(function (data) {
                if (data !== null) {

                    $('#' + wrapId).append(data);

                }
            });
}

function generateContentPanel(id, type, scope) {
    $.ajax({
        url: base_url + 'ajax/getContent',
        type: "GET",
        data: {
            'id': id,
            'type': type
        },
        dataType: 'html'

    })
            .done(function (data) {
                if (data !== null) {
                    if (type.indexOf('accordian') >= 0) {
                        $('a#' + type + '-' + id).removeAttr('onclick').collapse();
                    } else {
                        $('a#' + type + '-' + id).removeAttr('onclick').tab('show');
                        $('tr#' + type + '-' + id).removeAttr('onclick').tab('show');
                    }
//                    if type is bag or produce, need to identify correct wrapping div to make sure it is nested properly
                    if (type.indexOf('newsletter-accordian') >= 0) {
                        $('#newsletter-panel-wrap-' + id).append(data);
                    } else if (type.indexOf('recipe-accordian') >= 0) {
                        $('#recipe-panel-wrap-' + id).append(data);
                    } else if (type.indexOf('bag') >= 0) {
                        $('div#bags div.tab-content' + scope + ' div.tab-pane.active').removeClass('active');
                        $('div#bags div.tab-content' + scope).append(data);
                    } else if (type.indexOf('produce') >= 0) {
                        $('div#produce div.tab-content' + scope + ' div.tab-pane.active').removeClass('active');
                        $('div#produce div.tab-content' + scope).append(data);
                    } else {
                        $('div.tab-content' + scope + ' div.tab-pane.active').removeClass('active');
                        $('div.tab-content' + scope).append(data);
                        refreshTimepickers();
                    }

                    if (type === 'gallery' || type === 'bag-details' || type === 'produce-details') {
                        var myDropzone = new Dropzone("#dropzone-" + type + '-' + id, {
                            paramName: 'image',
                            url: base_url + 'dropzone/upload/' + id + '/' + type,
                            init: function () {
                                this.on("success", function (file, response) {
                                    $('#images-' + id).append(response);
                                    setTimeout(function () {
                                        $('div.dz-success').fadeOut(1000, function () {
                                            $('div.dz-message').fadeIn(500);
                                        });
                                    }, 1500);
                                });
                            }
                        });
                    }

                }
            });
}


function editDelete(form, type, id) {
    $(form).find('input#type').attr('value', type);

    $.ajax({
        url: base_url + 'ajax/editDelete',
        type: "POST",
        data: $(form).serialize(),
        dataType: 'html'

    })
            .done(function () {
                if (type.indexOf('delete') >= 0) {
                    if (type.indexOf('Quantity') === -1 && type.indexOf('Price') === -1 && type.indexOf('Banner') === -1 && type.indexOf('Image') === -1) {
//                        Check if its bags or produce. This is required to due to both being displayed on the same page
                        if (type.indexOf('Bag') >= 0) {
                            $('#bags-list li.active').prev().addClass('active').next().remove();
                            showFeedback('Bag deleted successfully', 'success');
                        } else if (type.indexOf('Produce') >= 0) {
                            $('#produce-list li.active').prev().addClass('active').next().remove();
                            showFeedback('Produce deleted successfully', 'success');
                        } else if (type.indexOf('Gallery') >= 0) {
                            $(form).closest('.modal').remove();
                            //If the deleted gallery was active, click the previous li
                            if ($('.list-admin #gallery-' + id).parent().attr('class') && $('.list-admin #gallery-' + id).parent().attr('class').indexOf('active') >= 0) {
                                $('.list-admin #gallery-' + id).parent().prev().find('a:first').trigger('click');
                            }
                            //Remove the deleted li
                            $('.list-admin #gallery-' + id).parent().remove();
                            showFeedback('Gallery deleted successfully', 'success');
                        } else {
                            $('.list-admin li.active').prev().addClass('active').next().remove();
                            showFeedback('Deletion successful', 'success');
                        }
                        $(form).closest('div.tab-pane').prev().addClass('active');
                        $(form).closest('div.tab-pane').remove();
                    } else {
//                        Handels removal of visible images on delete
                        if (type.indexOf('Banner') >= 0) {
                            $('#banner-image-' + id).parent().remove();
                            showFeedback('Banner deleted successfully', 'success');
                        } else if (type.indexOf('Image') >= 0) {
                            $('#image-' + id).parent().remove()
                            showFeedback('Image deleted successfully', 'success');
                        }

                        if (type.indexOf('Quantity') >= 0) {
                            if ($(form).parent().attr('id').indexOf('bag') >= 0) {
                                if ($('#bag-pricing-' + id).attr('onclick') === undefined) {
                                    $('#bag-pricing-' + id).attr('onclick', "generateContentPanel(" + id + ", 'bag-pricing', '.outer')");
                                    $('#bag-pricing-target-' + id).remove();
                                }
                            } else if ($(form).parent().attr('id').indexOf('produce') >= 0) {
                                if ($('#produce-pricing-' + id).attr('onclick') === undefined) {
                                    $('#produce-pricing-' + id).attr('onclick', "generateContentPanel(" + id + ", 'produce-pricing', '.outer')");
                                    $('#produce-pricing-target-' + id).remove();
                                }
                            }
                            showFeedback('Quantity deleted successfully', 'success');
                        }
                        $(form).remove();
                    }

                } else if (type.indexOf('Gallery') >= 0) {
                    //Update li to reflect any name changes
                    $('.list-admin #gallery-' + id).empty().text($(form).find('input[name="name"]').val());
                    //Close modal
                    $(form).find('button[data-dismiss]').trigger('click');
                }
                showFeedback('Save successful', 'success');
            });
}

function add(form) {
//    $('#' + formId + ' input#type').attr('value', type);

    $.ajax({
        url: base_url + 'ajax/add',
        type: "POST",
        data: $(form).serialize(),
        dataType: 'json'

    })
            .done(function (data) {
                if (data.type === 'price') {
                    getForm($(form).parent().attr('id'), 'pricing', data.price);
                    $(form).remove();
                } else if (data.type === 'quantity') {
                    getForm($(form).parent().attr('id'), 'quantities', data.quantity);
//                    This is to identify whether pricing panel has been generated already. 
//                    If it has it needs to be regenerated next time its clicked as quantity options have updated.
                    if ($(form).parent().attr('id').indexOf('bag') >= 0) {
                        if ($('#bag-pricing-' + data.product).attr('onclick') === undefined) {
                            $('#bag-pricing-' + data.product).attr('onclick', "generateContentPanel(" + data.product + ", 'bag-pricing', '.outer')");
                            $('#bag-pricing-target-' + data.product).remove();
                        }
                    } else if ($(form).parent().attr('id').indexOf('produce') >= 0) {
                        if ($('#produce-pricing-' + data.product).attr('onclick') === undefined) {
                            $('#produce-pricing-' + data.product).attr('onclick', "generateContentPanel(" + data.product + ", 'produce-pricing', '.outer')");
                            $('#produce-pricing-target-' + data.product).remove();
                        }
                    }
                    $(form).remove();
                }
            });
}

//----------DELIVERIES
(function () {
    $.each($('input.time'), function (i, val) {
        $(val).timepicker({
            showMeridian: false
        });
    });
})();

function refreshTimepickers() {
    $.each($('input.time'), function (i, val) {
        $(val).timepicker({
            showMeridian: false
        });
    });
}

//-------------------------PRODUCTION
function refineSearch() {
    var weekday = $('.week-selection .active').attr('id')

    $.ajax({
        url: base_url + 'ajax/productionQuery',
        type: "POST",
        data: $(form).serialize(),
        dataType: 'html'

    })
}

//------SHOPPING CART
function addToCart(form, selection) {
    $.ajax({
        url: base_url + 'ajax/addToCart',
        type: "POST",
        data: $(form).serialize(),
        dataType: 'json',
        async: false
    })
            .done(function (data) {
                $('#cart span').text('(' + data.total + ')');
                showFeedback('Item/s added to cart successfully', 'success');
                if (selection) {
                    makeSelection(selection);
                }
            });
}

function makeSelection(ele) {
    $('.bag-selection').removeClass('selected');
    $(ele).addClass('selected');
}

//Directly updates totals to reflect changes in quantities
function updateCart(id, quantity, type) {
    $.ajax({
        url: base_url + 'ajax/updateCart',
        type: "POST",
        data: {
            "id": id,
            "quantity": quantity,
            "type": type
        },
        dataType: 'json'
    })
            .done(function (data) {
                if (type === 'account') {
                    if (data.delete) {
                        $('input[value="' + id + '"]').closest('tr').remove();
                    } else {
                        $('input[value="' + id + '"]').parent().siblings('td:last').empty().text('$' + data.subtotal);
                        $('table:first tr:last td:last').empty().text('$' + data.total);
                    }
                } else {
                    if (data.delete) {
                        $('input[value="' + id + '"]').closest('tr').remove();
                        showFeedback('Item removed from cart successfully', 'success');
                    } else {
                        $('input[value="' + id + '"]').siblings('td.sub-total').empty().text('$' + data.subtotal);
                        $('td.total').empty().text('$' + data.total);
                        showFeedback('Cart updated successfully', 'success');
                    }
                }
            });
}


//Deals with creation of order flow wizard
(function () {
    $('#order-wizard').steps({
        startIndex: parseInt($('.wizard-title:first').attr('id')),
        transitionEffect: 1,
        transitionSpeed: 500,
        onStepChanging: function (event, currentIndex, nextIndex) {
            //Make sure it is a public customer by confirming Extras exists as a tab before refreshing order view
            if (nextIndex === 2 && $('div.steps li:first a').text().indexOf('Bag') >= 0) {
                $.ajax({
                    url: base_url + 'ajax/refreshOrderView',
                    type: "POST",
                    dataType: 'html'
                })
                        .done(function (data) {
                            $('#order-wizard div.view-order').empty().html(data);
                            //Adds auto update functionailty to cart
                            $('input[name*="[qty]"').on('blur', function () {
                                var rowid = $(this).parent().siblings('input[name*="[rowid]"]').val();
                                var quantity = $(this).val();
                                updateCart(rowid, quantity, 'cart');
                            });
                        });
            }
            if (nextIndex === 4 && $('div.steps li:eq(3) a').text().indexOf('Log In') >= 0 && $('#login a:first').text().indexOf('Log In') >= 0) {
                showFeedback('Please log in or select "Don\'t have an account?" to register before proceeding.', 'error');
                return false;
            }
            return true;
        },
        onFinishing: function () {
            $.ajax({
                url: base_url + 'ajax/addOrder',
                type: "POST",
                data: $('form#delivery-options').serialize(),
                dataType: 'json'
            })
                    .done(function (data) {

                    });

        },
        onInit: function () {
            //Deals with styling of the wizard steps and buttons
            $('#order-wizard .steps ul').addClass('nav nav-pills nav-wizard');
            $('#order-wizard .actions ul').addClass('pull-right');
            $('#order-wizard .actions ul li:first').addClass('pull-left');
            $('#order-wizard .actions ul a').addClass('primary-button');
            $('#order-wizard .steps ul').find('li').not(':first').not(':last').each(function () {
                $(this).prepend('<div class="nav-wedge"></div>').append('<div class="nav-arrow"></div>');
            });
            $('#order-wizard .steps ul').find('li:first').append('<div class="nav-arrow"></div>');
            $('#order-wizard .steps ul').find('li:last').prepend('<div class="nav-wedge"></div>');
        }
    });
})()

function getDeliveryDescription(id) {
    $.ajax({
        url: base_url + 'ajax/getDeliveryDescription',
        type: "GET",
        data: {
            "id": id
        },
        dataType: 'html'
    })
            .done(function (data) {
                $('#delivery-description-wrap').empty().html(data);
            });
}

function addRegistration(form) {

    if ($(form).valid()) {
        $.ajax({
            url: base_url + 'ajax/addEditRegistration/add',
            type: "POST",
            data: $(form).serialize(),
            dataType: 'html'
        })
                .done(function (data) {
                    if (data !== 'error') {
                        if ($('#wholesaler').is(':checked')) {
                            showFeedback('Registration successful and has been submitted for activation! Please allow 48 hours for this process. If you are still unable to access your account after this time please contact us.', 'success');
                        } else {
                            $('#login').empty().html(data);
                            showFeedback('Registration successful. Welcome!', 'success');
                        }
                        $('#registration button[data-dismiss]').trigger('click');
                        Validator.resetForm();
                    }
                });
    } else {
        showFeedback('Please make sure all required fields are filled out correctly', 'error');
    }
}

function logIn(form) {
    $.ajax({
        url: base_url + 'ajax/logIn',
        type: "POST",
        data: $(form).serialize(),
        dataType: 'html'
    })
            .done(function (data) {
                if (data !== 'error') {
                    $('#login-modal button[data-dismiss]').trigger('click');
                    $('#login').empty().html(data);
                    showFeedback('Log in successful', 'success');
                } else {
                    showFeedback('Username/Password incorrect. Please try again', 'error');
                }
            })
}

function editRegistration(form) {
    $.ajax({
        url: base_url + 'ajax/addEditRegistration/edit',
        type: "POST",
        data: $(form).serialize(),
        dataType: 'json'
    })
            .done(function (data) {
                if ($(form).attr('id').indexOf('customer') >= 0) {
                    $(form).closest('.tab-pane').remove();
                    generateContentPanel(data.id, 'customer', '')
                }
                showFeedback('Personal details saved successfully', 'success');
            })
}

function deleteRegistration(form) {
    $.ajax({
        url: base_url + 'ajax/addEditRegistration/delete',
        type: "POST",
        data: $(form).serialize(),
        dataType: 'html'
    })
            .done(function (data) {
                showFeedback('Account deleted successfully', 'success');
            })
}

function addEditPreferences(form) {
    $.ajax({
        url: base_url + 'ajax/addEditPreferences',
        type: "POST",
        data: $(form).serialize(),
        dataType: 'json'
    })
            .done(function (data) {
                showFeedback('Preferences saved successfully', 'success');
            })
}

function showFeedback(msg, type) {
    if (type === 'error') {
        msg = '<p class="error feedback-msg">' + msg + '</p>';
    } else if (type === 'warning') {
        msg = '<p class="warning feedback-msg">' + msg + '</p>';
    } else if (type === 'success') {
        msg = '<p class="success feedback-msg">' + msg + '</p>';
    }
    $('body').append(msg)
    $('.feedback-msg').animate({
        height: '35px'
    });
    setTimeout(function () {
        $('.feedback-msg').fadeOut(1000).promise()
                .done(function () {
                    $('.feedback-msg').remove();
                });
    }, 3000);
}

function logOut() {
    $.ajax({
        url: base_url + 'ajax/logOut',
        type: "POST",
        dataType: 'html'
    })
            .done(function (data) {
                if (data !== 'error') {
                    $('#login').empty().html(data);
                    showFeedback('Log out successful', 'success');
                }
            })
}
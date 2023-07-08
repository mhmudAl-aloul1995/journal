var FormWizard = function () {
    var wizard = $("#form_wizard_1");

    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }

            function format(state) {
                if (!state.id) return state.text; // optgroup
                return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
            }

            $("#country_list").select2({
                placeholder: "Select",
                allowClear: true,
                formatResult: format,
                width: 'auto',
                formatSelection: format,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            var form = $('#submit_form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    //account
                    username: {
                        minlength: 5,
                        required: true
                    },
                    password: {
                        minlength: 5,
                        required: true
                    },
                    rpassword: {
                        minlength: 5,
                        required: true,
                        equalTo: "#submit_form_password"
                    },
                    //profile
                    research_title: {
                        required: true,
                        minlength: 10,

                    },
                    research_file: {
                        required: true,
                    },
                    research_money_file: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    address: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    country: {
                        required: true
                    },
                    //payment
                    card_name: {
                        required: true
                    },
                    card_number: {
                        minlength: 16,
                        maxlength: 16,
                        required: true
                    },
                    card_cvc: {
                        digits: true,
                        required: true,
                        minlength: 3,
                        maxlength: 4
                    },
                    card_expiry_date: {
                        required: true
                    },
                    'payment[]': {
                        required: true,
                        minlength: 1
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'payment[]': {
                        required: "Please select at least one option",
                        minlength: jQuery.validator.format("Please select at least one option")
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                            .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success.show();
                    error.hide();
                    form[0].submit();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });

            var displayConfirm = function () {
                $('#tab4 .form-control-static', form).each(function () {
                    var input = $('[name="' + $(this).attr("data-display") + '"]', form);
                    if (input.is(":radio")) {
                        input = $('[name="' + $(this).attr("data-display") + '"]:checked', form);
                    }
                    if (input.is(":text") || input.is("textarea")) {
                        $(this).html(input.val());
                    } else if (input.is("select")) {
                        $(this).html(input.find('option:selected').text());
                    } else if (input.is(":radio") && input.is(":checked")) {
                        $(this).html(input.attr("data-title"));
                    } else if ($(this).attr("data-display") == 'payment[]') {
                        var payment = [];
                        $('[name="payment[]"]:checked', form).each(function () {
                            payment.push($(this).attr('data-title'));
                        });
                        $(this).html(payment.join("<br>"));
                    }
                });
            }

            var handleTitle = function (tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('خطوة ' + (index + 1) + ' من ' + total);
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_1').find('.button-previous').hide();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();
                    displayConfirm();
                } else {
                    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
                App.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    clickedIndex = clickedIndex + 1

                    if ($("#app_status").val() == 0 && clickedIndex == 1) {

                        return true
                    }
                    if ($("#app_status").val() == 1 && clickedIndex == 1) {

                        return true
                    } else if ($("#app_status").val() == 2 && clickedIndex == 2) {

                        return true
                    } else if ($("#app_status").val() == 3 && clickedIndex == 3) {

                        return true
                    } else if ($("#app_status").val() == 4 && clickedIndex == 4) {

                        return true
                    }
                    return false;

                    success.hide();
                    error.hide();
                    if (form.valid() == false) {
                        return false;
                    }
                    handleTitle(tab, navigation, clickedIndex);
                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();
                    $('.button-next').hide()

                    var status = $("#app_status").val();
                    var is_show_research_file = $("#research_file").is(":hidden");
                    var is_show_research_title = $("#research_title").is(":hidden");
                    var is_show_research_money_file = $("#research_money_file").is(":hidden");
                    var is_show_research_file_updated = $("#research_file_updated").is(":hidden");
                    var is_show_proofreader_file = $("#proofreader_file").is(":hidden");

                    var is_valid_research_file = form.validate().element($("#research_file"))
                    var is_valid_research_title = form.validate().element($("#research_title"))
                    var is_valid_research_money_file = form.validate().element($("#research_money_file"))
                    var is_valid_research_file_updated = form.validate().element($("#research_file_updated"))

                    if (status == 0 && index == 1) {
                        $('.button-next').text('موافق').show()

                        var fd = new FormData();
                        var id = $("#app_id").val();
                        var is_commitment = $("#is_commitment").val();
                        var research_title = $("#research_title").val();
                        var research_file = $("#research_file")[0].files[0];
                        var research_money_file = $("#research_money_file")[0].files[0];

                        if (!research_title || !research_file || !research_money_file) {
                            return false;
                        }
                        fd.append('research_title', research_title)
                        fd.append('id', 0)
                        fd.append('research_file', research_file)
                        fd.append('research_money_file', research_money_file)
                        fd.append('_token', token)
                        $.ajax({
                            url: $("#url").val() + '/researchApplication',
                            type: 'post',
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                if (response.success == true) {
                                    showAlertMessage('alert-success', null, "تم إدخال المرفقات و سنرد عليكم في أقرب وقت");
                                    $("#sideMenu").append(' <li onclick="openMyApllication(' + response.research.id + ')" class="active re_' + response.research.id + '">' +
                                        '                                            <a href="#tab_6_' + response.research.id + '" data-toggle="tab" aria-expanded="false">' +
                                        '                                              ' + response.research.research_title + ' </a>' +
                                        '                                        </li>')

                                    $('.re_' + response.research.id).trigger("click");
                                } else {
                                    showAlertMessage('alert-danger', null, "يوجد خطا فني");

                                }
                            },
                            error: function (response) {

                                showAlertMessage('alert-danger', null, response.message);

                            }

                        });
                        $("#sideMenu:last-child").click()
                        $(".re_38").click()

                        return false;

                    }
                    if (status == 1 && index == 1) {
                        $('.button-next').show()
                        if (is_show_research_money_file) {
                            var is_valid_research_money_file = form.validate().element($("#research_money_file"))

                        }

                        var fd = new FormData();
                        var id = $("#app_id").val();
                        var research_money_file = $("#research_money_file")[0].files[0];
                        if (is_commitment == 1) {
                            if (!is_valid_research_money_file) {
                                return false;
                            }
                            fd.append('research_money_file', research_money_file)

                        } else {
                            if (!research_money_file) {
                                return false;
                            }
                            fd.append('research_money_file', research_money_file)

                        }
                        fd.append('_token', token)
                        fd.append('id', id)


                        $.ajax({
                            url: $('#url').val() + '/researchApplication',
                            type: 'post',
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                if (response.success == true) {
                                    showAlertMessage('alert-success', null, "تم إدخال المرفقات و سنرد عليكم في أقرب وقت");
                                    $("#sideMenu").append(' <li onclick="openMyApllication(' + response.research.id + ')" class="">' +
                                        '                                            <a href="#tab_6_' + response.research.id + '" data-toggle="tab" aria-expanded="false">' +
                                        '                                              ' + response.research.research_title + ' </a>' +
                                        '                                        </li>')

                                    return false;

                                } else {
                                    showAlertMessage('alert-danger', null, "يوجد خطا فني");
                                    return false;

                                }
                            },
                            error: function (response) {

                                showAlertMessage('alert-danger', null, response.message);

                            }

                        });


                    }
                    if (index == 2) {

                        $('.button-next').show()
                        if (!is_show_research_file_updated) {
                            var is_valid_research_file_updated = form.validate().element($("#research_file_updated"))

                        }
                        $('.button-next').text('موافق').show()

                        var fd = new FormData();
                        var id = $("#app_id").val();
                        var research_file_updated = $("#research_file_updated")[0].files[0];
                        var research_application_id = $("#research_application_id").val()

                        console.log(research_file_updated)

                        if (!is_valid_research_file_updated || research_application_id < 1) {
                            return false;
                        }
                        fd.append('research_file_updated', research_file_updated)
                        fd.append('research_application_id', research_application_id)
                        fd.append('_method', 'PUT')
                        fd.append('app_status', index)

                        fd.append('_token', token)
                        $.ajax({
                            url: $('#url').val() + '/researchApplication/' + research_application_id,
                            type: 'POST',
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                if (response.success == true) {
                                    showAlertMessage('alert-success', null, "تم إدخال التعديلات و سنرد عليكم في أقرب وقت");
                                    $('#research_file_updated_help').html("<a target='_blank' href='" + response.res_file_updated + "'>الرابط<a>").show()


                                } else {
                                    showAlertMessage('alert-danger', null, "يوجد خطا فني");

                                }
                            },
                            error: function (response) {

                                showAlertMessage('alert-danger', null, response.message);

                            }

                        });
                        $("#sideMenu:last-child").click()
                        $(".re_38").click()

                        return false;

                    }


                    if (index == 3) {

                        $('.button-next').show()
                        if (!is_show_proofreader_file) {
                            var is_valid_proofreader_file = form.validate().element($("#proofreader_file"))

                        }
                        $('.button-next').text('موافق').show()

                        var fd = new FormData();
                        var id = $("#app_id").val();
                        var proofreader_file = $("#proofreader_file")[0].files[0];
                        var research_application_id = $("#research_application_id").val()

                        console.log(research_file_updated)

                        if (!is_valid_proofreader_file || research_application_id < 1) {
                            return false;
                        }
                        fd.append('proofreader_file', proofreader_file)
                        fd.append('app_status', index)
                        fd.append('research_application_id', research_application_id)
                        fd.append('_method', 'PUT')

                        fd.append('_token', token)
                        $.ajax({
                            url: $("#url").val() + '/researchApplication/' + research_application_id,
                            type: 'POST',
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                if (response.success == true) {
                                    showAlertMessage('alert-success', null, "تم إدخال التعديلات و سنرد عليكم في أقرب وقت");
                                    $('#proofreader_file_help').html("<a target='_blank' href='" + response.proofreader_file + "'>الرابط<a>").show()


                                } else {
                                    showAlertMessage('alert-danger', null, "يوجد خطا فني");

                                }
                            },
                            error: function (response) {

                                showAlertMessage('alert-danger', null, response.message);

                            }

                        });
                        $("#sideMenu:last-child").click()
                        $(".re_38").click()

                        return false;

                    }


                    if (status != 3 && index == 3) {
                        return false
                    }
                    if (status != 4 && index == 4) {

                        return false
                    }

                    handleTitle(tab, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.progress-bar').css({
                        width: $percent + '%'
                    });

                }
            });

            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').click(function () {
                alert('Finished! Hope you like it :)');
            }).hide();

            //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('#country_list', form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
        }

    };

}();

jQuery(document).ready(function () {
    FormWizard.init();
});
